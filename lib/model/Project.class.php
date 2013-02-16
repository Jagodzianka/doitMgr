<?php
class model_Project extends _Model
{
    protected $sql = array(
	//-- main query - select all projects
        'getItems' => '	SELECT 
							project.id,project.title,project.description,
							project.priority,project.dateAdd,
							user.first,user.last
						FROM project project
							left join user user on user.id=project.idProjectOwner
						ORDER by project.dateAdd',
						
	//-- select one project			
        'getItem' => 'SELECT * FROM project WHERE id = :id'
    );
}
?>