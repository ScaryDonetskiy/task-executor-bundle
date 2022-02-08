Quick Start 
=

Step 1 - Task storage implementation
-

The bundle doesn't contain storage for your tasks, but it provides all required interfaces for it. So you can use any 
storage you need or which is already connected to your service (ex. MongoDB).

[\Vados\TaskExecutorBundle\Document\TaskDocumentInterface](../src/Document/TaskDocumentInterface.php) - this interface 
describes Entity of your task. [More information here](02-Task Document.md)

[\Vados\TaskExecutorBundle\Repository\TaskRepositoryInterface](../src/Repository/TaskRepositoryInterface.php) - this 
interface describe Repository for access to your tasks. Also, you can implement the required methods by updating the 
task's start date (for preventing unlimited loops). [More information here](03-Task Repository.md)

Step 2 - Setup running of Task Execute command as a cron job
-

For checking and executing tasks you need to run Symfony command 'task:execute'. For regular executing, you can 
configure it's running as a cron job.

Step 3 - Use Tasker Service for creating new tasks in your service
-

When you need to save a task to execute it in the future you need to describe the task and save it using 
[\Vados\TaskExecutorBundle\Service\Tasker](../src/Service/Tasker.php). Task contains two parts - document (more 
information about document [here](02-Task Document.md)) and handler. Before saving task document make sure that handler 
implements [\Vados\TaskExecutorBundle\Task\TaskInterface](../src/Task/TaskInterface.php). You can find more information 
about handlers [here](04-Task Handler.md).

Next steps:
-
[Task Document description](./02-Task Document.md)

[Task Repository description](./03-Task Repository.md)

[Task Handler description](./04-Task Handler.md)

[Exception Handler](./05-Exception Handler.md)

[Command Workflow](./06-Command Workflow.md)
