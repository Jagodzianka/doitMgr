<?php
class controller_Index extends _Controller
{
    protected $layout;
    protected $model;
    
    function __construct()
    {
        $this->layout = new _View('layout/index.phtml');
        $this->model = new model_Project;
    }
    
    function index()
    {
        $view = new _View('index.phtml');
        $view->data = $this->model->getItems();
        $this->layout->main = $view;
        return $this->layout;
    }
    
    /*function project()
    {
        if (empty($_GET['id'])) self::http404();
        $data = $this->model->getItem(array('id' => $_GET['id']));
        if (empty($data[0])) self::http404();
        self::$config['title'][] = $data[0]->title;
        $view = new _View('project.phtml');
        $view->data = $data;
        $this->layout->main = $view;
        return $this->layout;
    }
	function projectList()
    {
        $view = new _View('projectList.phtml');
        $view->data = $this->model->getItems();
        $this->layout->main = $view;
        return $this->layout;
    }*/
}
?>