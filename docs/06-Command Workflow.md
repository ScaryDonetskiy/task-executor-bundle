Command Workflow
=
=======
=

This part of the documentation describes, what's happened when you call Symfony command 'task:execute'.

**Step 1.** Command try to find a task document using 
[\Vados\TaskExecutorBundle\Repository\TaskRepositoryInterface](../src/Repository/TaskRepositoryInterface.php).

**1.1.** If task document found, command try to get task handler from "\Psr\Container\ContainerInterface"
   
**1.2.** Command tries to execute a task with metadata from the task document.

**1.2.1.** If the execution was successful, the command will delete a task from the storage.

**1.2.2.** If the handler returns false as an operation of executing, we get back to step 1.

**1.2.3.** If the handler throws some exception, we try to handle it using 
[\Vados\TaskExecutorBundle\Exception\Handler\ExceptionHandle](../src/Exception/Handler/ExceptionHandle.php) and delete 
a task from the storage.

**1.2.3.1.** If Exception Handler can't process this type of Exception - we add an error to the logger and return to step 1.

**Step 2.** If the command can't find tasks, which ready to be executed - the command is successful end of executing. 