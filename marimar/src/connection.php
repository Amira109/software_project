<?php
class Connection{

/**
* establishes a connection with the db
* @return PDO
 */
public static function connect(): PDO
{
    
$link = new PDO("mysql:host=localhost;dbname=dragonhousedb", "root", "");
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$link -> exec("set names utf8");

return $link;
}

}