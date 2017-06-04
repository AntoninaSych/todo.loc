<?php
/**
 * Quiz
 */
class Controller_main extends BaseControllers{
public $isUser=false;
    public function __construct(){
        $this->_view=new BaseViewes();
        $this->_model=new Model_Main();
        $this->isUser=$this->action_isUser();
  }

    public function action_index()
    {
        $data= "";
        if($this->isUser ==true){
        $this->_view->render("template.php","view.php",$data);
        }else{
            $this->_view->render("template.php","main.php",$data);
        }
    }


    public function action_isUser()
    {  $data=$this;
        $this->isUser = false;
        if (isset($_SESSION['login'])) {
            if ($_SESSION['login'] == $_COOKIE['login'] && $_SESSION['password'] == $_COOKIE['password']) {
                $this->isUser = true;
            }else{
                $this->_view->render("template.php", "login.php", $data);
            }
        }
        return  $this->isUser;
    }

    public function action_GetTasks()
    {
        $data['user']=$this->isUser;
        if($this->isUser == true){
            $data['tasks']= $this->_model->getTasks();
            $this->_view->render("template.php", "view.php", $data);
        }
        else{
            $this->_view->render("template.php", "login.php", $data);
        }
    }



    public function action_edit()
    {

        $data['user']=$this->isUser;
        $data['message']="";
        $data_task=array();
        if(isset($_POST['edited'])&& $_POST['edited']==1 ){
            $data_task['id']=$_POST['task_id'];
            $data_task['title']=$_POST['title'];
            $data_task['description']=$_POST['description'];
            $this->_model->editTask($data_task);
            $data['message']="Success";
            $data['tasks']= $this->_model->getTasks();
            $this->_view->render("template.php", "view.php", $data);

        }else{
        if($this->isUser == true){
            if(isset($_GET['id']))
        {
            $data['task']=$this->_model->getTaskById($_GET['id']);
        }

            $this->_view->render("template.php", "edit.php", $data);
        }
        else{
            $this->_view->render("template.php", "login.php", $data);
        }
        }
    }


    public function action_detailed()
    {

        $data['user']=$this->isUser;
        $data['message']="";

            if($this->isUser == true){
                if(isset($_GET['id']))
                {
                    $data['task']=$this->_model->getTaskById($_GET['id']);
                }

                $this->_view->render("template.php", "detailed.php", $data);
            }
            else{
                $this->_view->render("template.php", "login.php", $data);
            }
        }





    public function action_add()
    {
        $data['user']=$this->isUser;
        $data['message']="";
        $data_task=array();
        if(isset($_POST['add'])&& $_POST['add']==1 ){

            $data_task['title']=$_POST['title'];
            $data_task['description']=$_POST['description'];
            $data['message']="Your task id is #".$this->_model->addTask($data_task);
            $data['tasks']= $this->_model->getTasks();
            $this->_view->render("template.php", "view.php", $data);

        }else{
            if($this->isUser == true){
                if(isset($_GET['id']))
                {
                    $data['task']=$this->_model->getTaskById($_GET['id']);
                }
                $this->_view->render("template.php", "add.php", $data);
            }
            else{
                $this->_view->render("template.php", "login.php", $data);
            }
        }

    }
    public function action_remove()
    {
        $data['user']=$this->isUser;
        $data['message']="";
        if($this->isUser == true){
            if(isset($_GET['id']))
            {
               $data['message']="Your task id is #".$this->_model->removeTask($_GET['id']);
               $data['tasks']= $this->_model->getTasks();
            }
            $this->_view->render("template.php", "view.php", $data);
        }
        else{
            $this->_view->render("template.php", "login.php", $data);
        }
    }

}