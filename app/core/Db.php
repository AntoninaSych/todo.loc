<?php
 class Db {
     private static $_db;  // экземпляра объекта
     private function __construct(){
        self::$_db = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
         mysql_select_db(DB_NAME) or die(mysql_error());
     }  // Защищаем от создания через new Singleton

     private function __clone()    { /* ... @return Singleton */ }  // Защищаем от создания через клонирование
     private function __wakeup()   { /* ... @return Singleton */ }  // Защищаем от создания через unserialize
     public static function getInstance() {    // Возвращает единственный экземпляр класса. @return Singleton
         if ( empty(self::$_db) ) {
             self::$_db = new self();
         }
         mysql_set_charset( 'utf8' );
         return self::$_db;
     }

     public function checkUserByLogin($user_login) {
         $rows=array();
         $query="SELECT * FROM `users` WHERE `login`= '".$user_login."'";
         $result=mysql_query($query);
         while($row = mysql_fetch_assoc($result)) {
             $rows[] = array("id"=>$row['id'],"login"=>$row['login']);
         }
         return $rows;
     }


 public function regNewUser($login,$password,$email){
     $query= "INSERT INTO  users (login ,  password, date , email ) VALUES ('".$login."', '".$password."', '".date("y.m.d")."', '".$email."')";
     mysql_query($query) or die(mysql_error());
     return mysql_insert_id();
 }


     public function loginUser($login,$password){
         $rows=array();
         $query="SELECT * FROM `users` WHERE `login`= '".$login."'";
         $result=mysql_query($query);
         while($row = mysql_fetch_assoc($result)) {
             $rows[] = array("id"=>$row['id'],"login"=>$row['login'],"password"=>$row['password'],"date"=>$row['date']);
             if($password==$row['password']){
                 return true;
             }
             else{return false;}
         }
         return false;
     }

     public function getUser($login){
         $rows=array();
         $query="SELECT * FROM `users` WHERE `login`= '".$login."'";
         $result=mysql_query($query);
         while($row = mysql_fetch_assoc($result)) {
             $rows[] = array("id"=>$row['id'],"login"=>$row['login'],"password"=>$row['password'],"date"=>$row['date']);
         }
         return $rows;
     }

     public function getTasks(){
         $query="SELECT * FROM `users` WHERE `login`='".$_SESSION["login"]."'";
         $rows=array();
         $rows2=array();
         $result=mysql_query($query);

             while($row = mysql_fetch_assoc($result)) {
                 $rows[] = array("id"=>$row['id'],"login"=>$row['login']);
             }
         $user_id=$rows[0]['id'];
         $query="SELECT * FROM `tasks` WHERE `id_user`='".$user_id."'";
         $result=mysql_query($query);

         while($row = mysql_fetch_assoc($result)) {
             $rows2[] = array("id"=>$row['id'],"title"=>$row['title'],"description"=>$row['description']);
         }

         return $rows2;
     }



 public function getTaskById($task_id)
 {
     $query="SELECT * FROM `users` WHERE `login`='".$_SESSION["login"]."'";
     $rows=array();
     $rows2=array();
     $result=mysql_query($query);

     while($row = mysql_fetch_assoc($result)) {
         $rows[] = array("id"=>$row['id'],"login"=>$row['login']);
     }
     $user_id=$rows[0]['id'];
     $query="SELECT * FROM `tasks` WHERE   `id_user`='".$user_id."'  AND   `id`='".$task_id."'";
     $rows=array();
     $result=mysql_query($query);
     while($row = mysql_fetch_assoc($result)) {
         $rows[] = array("id"=>$row['id'],"title"=>$row['title'],"description"=>$row['description'],"id_user"=>$row['id_user'],"date_create"=>$row['date_create'],"last_modify"=>$row['last_modify']);
     }
     return $rows;
 }

     public function editTask($data)
     {
         $query="SELECT * FROM `users` WHERE `login`='".$_SESSION["login"]."'";
         $rows=array();
         $rows2=array();
         $result=mysql_query($query);

         while($row = mysql_fetch_assoc($result)) {
             $rows[] = array("id"=>$row['id'],"login"=>$row['login']);
         }
         $user_id=$rows[0]['id'];
          $task_id=$data['id'];
//
     $now=date("y.m.d");
//       $query="UPDATE 'tasks'   SET title='".$data['title']."', description='".$data['description']."', last_modify='".$now."'  WHERE   `id_user`='".$user_id."'  AND   `id`='".$task_id."'";
//         $query="UPDATE 'tasks'   SET title='".$data['title']."', description='".$data['description']."', last_modify='".$now."'  WHERE   `id_user`='".$user_id."'  AND   `id`='".$task_id."'";

         $result=mysql_query("UPDATE `tasks` SET `title`='".$data['title']."',`description`='".$data['description']."', last_modify='".$now."'   WHERE id=$task_id AND id_user=$user_id");
         return $result;

     }

     public function addTask($data)
     {
         $query="SELECT * FROM `users` WHERE `login`='".$_SESSION["login"]."'";
         $rows=array();
         $rows2=array();
         $result=mysql_query($query);

         while($row = mysql_fetch_assoc($result)) {
             $rows[] = array("id"=>$row['id'],"login"=>$row['login']);
         }
         $user_id=$rows[0]['id'];

         $now=date("y.m.d");

         $query= "INSERT INTO  tasks (title ,  description, date_create,id_user  ) VALUES ('".$data['title']."', '".$data['description']."', '".$now."' , '".$user_id."' )";
         mysql_query($query) or die(mysql_error());
         return mysql_insert_id();

     }


     public function removeTask($id_task)
     {
         $message='';
         $query = "DELETE FROM tasks WHERE id=$id_task";
         if ( mysql_query($query) === TRUE) {
             $message= "Record deleted successfully";
         } else {
             $message= "Error deleting record: " . $conn->error;
         }
         return $message;
     }



     public function insertResultData($username,$surname,$dates,$test_id){
         $query= "INSERT INTO  users (names ,  surname, date,  test_id) VALUES ('".$username."', '".$surname."', '".$dates."', '".$test_id."')";
         mysql_query($query) or die(mysql_error());
         return mysql_insert_id();
     }

     public function insertResultTest($array_answers)
     {$arr=$array_answers;
         foreach($array_answers as $keys=>$values)
         {
         //    print_r($keys);

             for($y=0;$y<count($arr[$keys]);$y++)
                 {
                     foreach($arr[$keys][$y] as $key=>$value)
                     {
                         $query= "INSERT INTO  results (id_user , id_answer_checked) VALUES ('".$key."', '".$value."')";
                         mysql_query($query) or die(mysql_error());

                     }
                 }

         }

//         echo "<pre>";
//         print_r($array_answers);
//         echo "</pre>";
//         for($i=0;$i<count($array_answers);$i++)
//         {
////            echo count($array_answers);
////            echo"<br>";
////            echo "Arr#".$i."<br>";
//             if(isset($array_answers[$i])){
////               echo "<pre>";
////               print_r($array_answers[$i]);
////               echo "</pre>";
//                 for($y=0;$y<count($array_answers[$i]);$y++)
//                 {
//                     foreach($array_answers[$i][$y] as $key=>$value)
//                     {
//                         $query= "INSERT INTO  results (id_user , id_answer_checked) VALUES ('".$key."', '".$value."')";
//                         mysql_query($query) or die(mysql_error());
//
//                     }
//                 }
//             }
//         }
     }

//     public function insertResultTest($array_answers)
//     {
////         echo "<pre>";
////         print_r($array_answers);
////         echo "</pre>";
//        for($i=0;$i<count($array_answers);$i++)
//        {
////            echo count($array_answers);
////            echo"<br>";
////            echo "Arr#".$i."<br>";
//           if(isset($array_answers[$i])){
////               echo "<pre>";
////               print_r($array_answers[$i]);
////               echo "</pre>";
//             for($y=0;$y<count($array_answers[$i]);$y++)
//                {
//                     foreach($array_answers[$i][$y] as $key=>$value)
//                     {
//                         $query= "INSERT INTO  results (id_user , id_answer_checked) VALUES ('".$key."', '".$value."')";
//                         mysql_query($query) or die(mysql_error());
//
//                     }
//                }
//        }
//     }
//     }
//     public function getUsers(){
//         $query="select * from users ORDER BY id DESC";
//         $result=mysql_query($query);
//         while($row = mysql_fetch_assoc($result)) {
//             $rows[] = array("id"=>$row['id'],"names"=>$row['names'],"surname"=>$row['surname'],"date"=>$row['date']);
//         }
//        if(isset($rows)){
//         return $rows;}
//         else {return false;}
//     }

     public function getTestData($id_user)
     {

         $query="select results.id_user, results.id_answer_checked from results Where id_user = $id_user";
         $result=mysql_query($query);

         while($row = mysql_fetch_assoc($result)) {
             $rows[] = array("id_user"=>$row['id_user'],"id_answer_checked"=>$row['id_answer_checked']);
          }

         if(isset($rows)) {return $rows;}else { return false;}
     }

     public function getUserInfoById($user_id)
     {
         $query="select * from users Where id = $user_id";
         $result=mysql_query($query);
        if(isset($user_id))
        {
         while($row = mysql_fetch_assoc($result)) {
             $rows[] = array("id"=>$row['id'],"names"=>$row['names'],"surname"=>$row['surname'],"date"=>$row['date']);
         }
          return $rows;
     }

     else{return false;}
 }
}
?>