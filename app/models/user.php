<?php
class Model_Main extends BaseModels{

    public function getData(){
       // Db::getInstance()->doAction();
    }

    public function checkUserByLogin($user_login){
       return Db::getInstance()->checkUserByLogin($user_login);
    }

    public function regNewUser($login,$password,$email)
    {
        return Db::getInstance()->regNewUser($login,$password,$email);
    }

    public function loginUser($login,$password){
        return Db::getInstance()->loginUser($login,$password);
    }

    public function insertResultData($username,$surname,$date,$test_id){
        return  $id_user=Db::getInstance()->insertResultData($username,$surname,$date,$test_id);

    }

    public function insertResultTest($array_answers){
        Db::getInstance()->insertResultTest($array_answers);
    }

    public function getUsers(){
        $getUsers=Db::getInstance()->getUsers();
        if($getUsers){return $getUsers;} else return false;
    }

    public function getTestData($id_user)
    {   $TestData=Db::getInstance()->getTestData($id_user);
        if($TestData){return $TestData;}else{return false;}

    }

    public function getUserInfoById($user_id)
    {
       return Db::getInstance()->getUserInfoById($user_id);
    }

}