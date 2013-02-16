<?php
class controller_Task extends _Controller
{
    protected $layout;
    protected $model;
    
    function __construct()
    {
        $this->layout = new _View('layout/index.phtml');
        $this->model = new model_Task;
    }
    
    function index()
    {
        $view = new _View('taskList.phtml');
        $view->data = $this->model->getItems();
        $this->layout->main = $view;
        return $this->layout;
    }
    
    function task()
    {
        if (empty($_GET['id'])) self::http404();
		$_GET['id']=intval($_GET['id']);
		$data = $this->model->getItem(array('id' => $_GET['id']));
        if (empty($data[0])) self::http404();
        self::$config['title'][] = $data[0]->title;
        $view = new _View('task.phtml');
        $view->data = $data;
        $this->layout->main = $view;
        return $this->layout;
    }
	
	function market()
    {
       $view = new _View('taskListMarket.phtml');
        $view->data = $this->model->getItemsFromMarket();
        $this->layout->main = $view;
        return $this->layout;
    }
}
?>