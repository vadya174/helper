<?php
require_once "app/db/components/connection.php";
require_once "app/db/components/QueryHelper.php";
$config=require_once "config.php";
$newPost=new PostData(Connection::make($config));
$dataPost=new UserData(Connection::make($config));