<?php
define ("DB_HOST", "localhost");
define ("DB_NAME", "shcheglova");
define ("DB_USER", "shcheglova");
define ("DB_PASS", "neto0758");

$db = new Db();
$db->connectToDb();

$model = new DbModel();