<?php
/**
 * Created by PhpStorm.
 * User: Panika
 * Date: 13.02.2017
 * Time: 16:45
 */

$db = new Db();
$db->connectToDb();

$lastname = trim($_REQUEST['lastname']);
$firstname = trim($_REQUEST['firstname']);
$middlename = trim($_REQUEST['middlename']);
$birthday = trim($_REQUEST['birthday']);
$passport = trim($_REQUEST['passport']);
$email = trim($_REQUEST['email']);


$insert_sql = "INSERT INTO users (lastname, firstname, middlename, birthday, passport, email)" .
    "VALUES('{$lastname}', '{$firstname}', '{$middlename}', '{$birthday}', '{$passport}' '{$email}');";
mysql_query($insert_sql);