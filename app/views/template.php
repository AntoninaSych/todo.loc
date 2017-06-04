<!doctype html>
<html data-savefrom-tab-data="{&quot;module&quot;:&quot;lm&quot;,&quot;tooltip&quot;:&quot;Найдено ссылок: 0&quot;}" lang="en"><head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>TodoList</title>
    <link href="css/main.css" rel="stylesheet" >
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="js/jquery-2.0.2.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>

<div class="container">
    <div class="span12"> &nbsp;</div>
    <div class="row-fluid">
        <?php
        if(isset($_SESSION['login'])){

            echo "<a href='index.php?controller=user&action=logout'  class='btn btn-medium logout'  >Logout</a>";//$_SESSION['login'];
        ?>
        <div class="span2">
            <a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'];?>/index.php?controller=main&action=GetTasks" class="btn btn-info">My Tasks</a>
        </div>

       <?php  }?>

        <div class="span8" >
        <?php
        include "app/views/$page";
        ?>

    </div>
</div>