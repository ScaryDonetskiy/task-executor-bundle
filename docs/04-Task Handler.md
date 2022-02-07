Task Handler
=
=======
=

For executing your task you need a handler that implements 
[\Vados\TaskExecutorBundle\Task\TaskInterface](../src/Task/TaskInterface.php) interface. It contains only one method - 
_TaskInterface::execute_ which accepts [\Vados\TaskExecutorBundle\Task\Metadata](../src/Task/Metadata.php) object that 
contains all business logic data you need for executing. Your implementation of the handler's method execute should 
return bool value as a result of executing - success or not. If the execution was successful, the task document will be 
removed from storage. 