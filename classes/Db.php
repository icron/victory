<?php
/**
 * Created by PhpStorm.
 * User: Panika
 * Date: 13.02.2017
 * Time: 16:45
 */

class Db
{
    public $pdo;
    public function connectToDb()
    {
        try {
            $this->pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->exec("SET NAMES 'utf8'");
        } catch (Exception $e) {
            echo "Ошибка загрузки базы данных";
            exit;
        }
    }
}