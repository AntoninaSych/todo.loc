<?php

require_once "core/BaseControllers.php";
require_once "core/BaseModels.php";
require_once "core/BaseViews.php";
require_once "core/Check.php";
require_once "core/Db.php";

$controller=Check::Controller_Check();
$currentController="Controller_".$controller;
include 'controllers/'.$controller.".php";
include 'models/'.$controller.'.php';

$obj=new $currentController();
$action=Check::Model_Check($obj);
$currentAction="action_".$action;
$obj->$currentAction();

