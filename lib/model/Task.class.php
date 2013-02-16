<?php
class model_Task extends _Model
{

    protected $sql = array(
		
		// single task by ID
		
		'getItem'			=> 'SELECT * FROM task WHERE id = :id',
		
		// all tasks
        'getItems' 			=> 'SELECT 
									task.id,task.title,task.priority,task.dateAdd,task.idProject, task.dateEnd,
									author.first as authorFirst,author.last as authorLast
								FROM task task 
									left join user author on author.id=task.idAuthor
								ORDER by title',
		
		// only unassigned tasks [where idReceiver is empty]					
		'getItemsFromMarket' => "SELECT 
									task.id,task.title,task.priority,task.dateAdd,task.idProject,task.dateEnd,
									author.first as authorFirst,author.last as authorLast
								FROM task task 
									left join user author on author.id=task.idAuthor
								WHERE task.idReceiver is null or task.idReceiver=''
								ORDER by title"
								
    );
}
?>