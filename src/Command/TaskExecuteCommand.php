<?php

namespace Vados\TaskExecutorBundle\Command;

use Psr\Container\ContainerInterface;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Vados\TaskExecutorBundle\Repository\TaskRepositoryInterface;
use Vados\TaskExecutorBundle\Task\TaskInterface;

class TaskExecuteCommand extends Command implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    protected static $defaultName = 'task:execute';

    private TaskRepositoryInterface $repository;
    private ContainerInterface $container;

    public function __construct(TaskRepositoryInterface $repository, ContainerInterface $container, string $name = null)
    {
        $this->repository = $repository;
        $this->container = $container;

        parent::__construct($name);
    }

    protected function configure(): void
    {
        $this->setDescription('This command try to find and execute task (if exists)');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $io->title('I\'m waiting for the task...');

        while (null !== $taskDocument = $this->repository->findTask()) {
            $io->writeln(sprintf('Find task: [%s] %s', $taskDocument->getClassname(), $taskDocument->getId()));

            /** @var TaskInterface $task */
            $task = $this->container->get($taskDocument->getClassname());

            try {
                $task->execute($taskDocument->getMetadata());
            } catch (\Exception $e) {
                $this->logger->error(sprintf('[Task Executor Error] %s', $e->getMessage()), [
                    'exception' => get_class($e),
                    'task_id' => $taskDocument->getId(),
                    'task_class' => $taskDocument->getClassname(),
                    'task_metadata' => $taskDocument->getMetadata(),
                ]);

                $io->error(sprintf('[%s]: %s', get_class($taskDocument), $e->getMessage()));

                continue;
            }

            $io->writeln('Complete');

            $this->repository->deleteTask($taskDocument);

            $io->newLine();
        }

        $io->writeln('No more task. I\'m done.');

        return self::SUCCESS;
    }
}
