Exception Handler
=

If you need to process some kinds of exceptions that could be thrown by executing your task, you can handle it using 
Exception Handler. Bundle provide 
[\Vados\TaskExecutorBundle\Exception\Handler\HandlerInterface](../src/Exception/Handler/HandlerInterface.php) for your 
custom exception handlers. It describes two methods:

_HandlerInterface::accept_ method accepts a string with a class name of exception and returns bool value - can it 
process this kind of exception or not.

_HandlerInterface::handle_ method accepts \Throwable object and should make some operation with exception data. This 
method should return the bool value which tells to the Handler, should the task be returned to the storage or deleted. 
