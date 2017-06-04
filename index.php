<?php
session_start();
error_reporting(E_ALL & ~E_DEPRECATED);
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "todo");

define("Q_PATH",dirname(__FILE__));
//запускаю загрузчик
include Q_PATH . '/app/bootstrap.php';
