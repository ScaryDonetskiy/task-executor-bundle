Task Repository
=
=======
=


[\Vados\TaskExecutorBundle\Repository\TaskRepositoryInterface](../src/Repository/TaskRepositoryInterface.php) describes 
the repository object which will be responsible for access to your tasks in some storage of your choice (eg. PostgreSQL 
or MongoDB).

_TaskRepositoryInterface::findTask_ method should retrieve task document from your storage and return it as an object 
which implements [\Vados\TaskExecutorBundle\Document\TaskDocumentInterface](../src/Document/TaskDocumentInterface.php).
For preventing unlimited loops I recommend using the "find and update" operation for delaying tasks in case of the 
unsuccessful result of executing and moving it to the next job running cycle.

_TaskRepositoryInterface::saveTask_ method should accept a 
[\Vados\TaskExecutorBundle\Document\TaskDocumentInterface](../src/Document/TaskDocumentInterface.php) object and save it 
to your data storage.

_TaskRepositoryInterface::deleteTask_ method should accept a 
[\Vados\TaskExecutorBundle\Document\TaskDocumentInterface](../src/Document/TaskDocumentInterface.php) object and delete 
it from your data storage.