Task Document
=
=======
=


[\Vados\TaskExecutorBundle\Document\TaskDocumentInterface](../src/Document/TaskDocumentInterface.php) describes entity 
or document which contains details about task - which handler should be called, data for execution etc.

_TaskDocumentInterface::getId_ method should return the storage identification value of the task (or just return a null 
value if your storage engine doesn't need identification value or the task don't saved yet).

_TaskDocumentInterface::getClassname_ method should return a string with the class name of the task handler.

_TaskDocumentInterface::setClassname_ method should accept a string with the class name of the task handler and save it 
to the document.

_TaskDocumentInterface::getMetadata_ method should return an array with some data which will be sent to the task 
handler.

_TaskDocumentInterface::setMetadata_ method should accept an array with some data which will be sent to the task handler
and saved to the document.