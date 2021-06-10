<?php declare(strict_types=1);

require_once "connection.php";

/**
 * Class Users
 */

final class Users
{

    public static function AddUsersModel($table, $data): string
    {

        $stmt = Connection::connect()->prepare("INSERT INTO $table(USERID,UNAME, USER_NAME, UPASS, ROLE,
        PHONE) 
        VALUES (:USERID,:UNAME, :USER_NAME, :UPASS,:ROLE,:PHONE)");

        $stmt -> bindParam(":USERID", $data["USERID"], PDO::PARAM_STR);
        $stmt -> bindParam(":UNAME", $data["UNAME"], PDO::PARAM_STR);
        $stmt -> bindParam(":USER_NAME", $data["USER_NAME"], PDO::PARAM_STR);
        $stmt -> bindParam(":UPASS", $data["UPASS"], PDO::PARAM_STR);
        $stmt -> bindParam(":ROLE", $data["ROLE"], PDO::PARAM_STR);
        $stmt -> bindParam(":PHONE", $data["PHONE"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return 'ok';

        } else {

            return 'error';
        }

        $stmt -> close;

        $stmt = null;
    }

    public static function EditUsersModel($table, $data,$id): string
    { 
        $stmt = Connection::connect()->prepare("UPDATE $table set  
         UNAME = :UNAME ,USER_NAME = :USER_NAME ,UPASS = :UPASS ,ROLE = :ROLE ,PHONE = :PHONE
          WHERE USERID = $id");

        
        $stmt -> bindParam(":UNAME", $data["UNAME"], PDO::PARAM_STR);
        $stmt -> bindParam(":USER_NAME", $data["USER_NAME"], PDO::PARAM_STR);
        $stmt -> bindParam(":UPASS", $data["UPASS"], PDO::PARAM_STR);
        $stmt -> bindParam(":ROLE", $data["ROLE"], PDO::PARAM_STR);
        $stmt -> bindParam(":PHONE", $data["PHONE"], PDO::PARAM_STR);
       
        
        if ($stmt->execute()) {

            return 'ok';

        } else {

            return 'error';
        }
        $stmt -> close;
        

        $stmt = null;
    }

    public static function DeleteUsersModel($table,$id): string
    {
        $stmt = Connection::connect()->prepare("DELETE FROM $table WHERE USERID = $id");

        $stmt -> bindParam(":USERID", $id, PDO::PARAM_INT);

        

        if ($stmt->execute()) {

            return 'ok';

        } else {

            return 'error';
        }

        $stmt->close;

        $stmt = null;
    }
}