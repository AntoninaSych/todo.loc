<?php
class Check{
    public static function Controller_Check(){
        if(isset($_GET['controller']))
        {
            $controller=$_GET['controller'];
        }
        else {
            $controller="main";
        }

        if (!file_exists('app/controllers/'.$controller.".php")){

            $controller="main";

        }
        return $controller;
    }


    public static function Model_Check($obj){
        if(isset($_GET['action']))
        {
            $action=$_GET['action'];
            $currentAction="action_".$action;
                if(method_exists($obj,$currentAction)){
                  //  $obj->$currentAction();
                    $action=$_GET['action'];
                     }
                else {
                        $action="index";
                    }
        }

        else {
            $action="index";
        }

        return $action;
    }


}
?>