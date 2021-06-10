<?php declare(strict_types=1);

require_once "connection.php";

/**
 * Class Guests
 */
final class Guests
{

    public static function AddGuestsModel($table, $data): string
    {

        $stmt = Connection::connect()->prepare("INSERT INTO $table(GUESTID,REFNO, G_FNAME, G_LNAME, G_CITY,G_ADDRESS,DBIRTH,
        G_PHONE,G_NATIONALITY,G_COMPANY,G_CADDRESS,G_TERMS,G_EMAIL,G_UNAME,G_PASS,ZIP,LOCATION) 
        VALUES (:GUESTID,:REFNO, :G_FNAME, :G_LNAME,:G_CITY,:G_ADDRESS,:DBIRTH,:G_PHONE,:G_NATIONALITY,
        :G_COMPANY,:G_CADDRESS,:G_TERMS,:G_EMAIL,:G_PASS,:ZIP,:LOCATION)");

        $stmt -> bindParam(":GUESTID", $data["GUESTID"], PDO::PARAM_STR);
        $stmt -> bindParam(":REFNO", $data["REFNO"], PDO::PARAM_STR);
        $stmt -> bindParam(":G_FNAME", $data["G_FNAME"], PDO::PARAM_STR);
        $stmt -> bindParam(":G_LNAME", $data["G_LNAME"], PDO::PARAM_STR);
        $stmt -> bindParam(":G_CITY", $data["G_CITY"], PDO::PARAM_STR);
        $stmt -> bindParam(":G_ADDRESS", $data["G_ADDRESS"], PDO::PARAM_STR);
        $stmt -> bindParam(":DBIRTH", $data["DBIRTH"], PDO::PARAM_STR);
        $stmt -> bindParam(":G_PHONE", $data["G_PHONE"], PDO::PARAM_STR);
        $stmt -> bindParam(":G_NATIONALITY", $data["G_NATIONALITY"], PDO::PARAM_STR);
        $stmt -> bindParam(":G_COMPANY", $data["G_COMPANY"], PDO::PARAM_STR);
        $stmt -> bindParam(":G_CADDRESS", $data["G_CADDRESS"], PDO::PARAM_STR);
        $stmt -> bindParam(":G_TERMS", $data["G_TERMS"], PDO::PARAM_STR);
        $stmt -> bindParam(":G_EMAIL", $data["G_EMAIL"], PDO::PARAM_STR);
        $stmt -> bindParam(":G_UNAME", $data["G_UNAME"], PDO::PARAM_STR);
        $stmt -> bindParam(":G_PASS", $data["G_PASS"], PDO::PARAM_STR);
        $stmt -> bindParam(":ZIP", $data["ZIP"], PDO::PARAM_STR);
        $stmt -> bindParam(":LOCATION", $data["LOCATION"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return 'ok';

        } else {

            return 'error';
        }

        $stmt -> close;

        $stmt = null;
    }

    public static function EditGuestsModel($table, $data,$id): string
    { 
        $stmt = Connection::connect()->prepare("UPDATE $table set  REFNO = :REFNO , G_FNAME = :G_FNAME,
         G_LNAME = :G_LNAME ,G_CITY = :G_CITY ,G_ADDRESS = :G_ADDRESS ,DBIRTH = :DBIRTH ,G_PHONE = :G_PHONE ,
         G_NATIONALITY = :G_NATIONALITY ,G_COMPANY = :G_COMPANY ,G_CADDRESS = :G_CADDRESS ,G_TERMS = :G_TERMS ,
         G_EMAIL = :G_EMAIL,G_UNAME = :G_UNAME, G_PASS = :G_PASS, ZIP = :ZIP, , LOCATION = :LOCATION 
          WHERE GUESTID = $id");

        $stmt -> bindParam(":REFNO", $data["REFNO"], PDO::PARAM_STR);
        $stmt -> bindParam(":G_FNAME", $data["G_FNAME"], PDO::PARAM_STR);
        $stmt -> bindParam(":G_LNAME", $data["G_LNAME"], PDO::PARAM_STR);
        $stmt -> bindParam(":G_CITY", $data["G_CITY"], PDO::PARAM_STR);
        $stmt -> bindParam(":G_ADDRESS", $data["G_ADDRESS"], PDO::PARAM_STR);
        $stmt -> bindParam(":DBIRTH", $data["DBIRTH"], PDO::PARAM_STR);
        $stmt -> bindParam(":G_PHONE", $data["G_PHONE"], PDO::PARAM_STR);
        $stmt -> bindParam(":G_NATIONALITY", $data["G_NATIONALITY"], PDO::PARAM_STR);
        $stmt -> bindParam(":G_COMPANY", $data["G_COMPANY"], PDO::PARAM_STR);
        $stmt -> bindParam(":G_CADDRESS", $data["G_CADDRESS"], PDO::PARAM_STR);
        $stmt -> bindParam(":G_TERMS", $data["G_TERMS"], PDO::PARAM_STR);
        $stmt -> bindParam(":G_EMAIL", $data["G_EMAIL"], PDO::PARAM_STR);
        $stmt -> bindParam(":G_UNAME", $data["G_UNAME"], PDO::PARAM_STR);
        $stmt -> bindParam(":G_PASS", $data["G_PASS"], PDO::PARAM_STR);
        $stmt -> bindParam(":ZIP", $data["ZIP"], PDO::PARAM_STR);
        $stmt -> bindParam(":LOCATION", $data["LOCATION"], PDO::PARAM_STR);
        
        if ($stmt->execute()) {

            return 'ok';

        } else {

            return 'error';
        }
        $stmt -> close;
        

        $stmt = null;
    }

    public static function DeleteGuestsModel($table, $id): string
    {
        $stmt = Connection::connect()->prepare("DELETE FROM $table WHERE GUESTID = $id");

        $stmt -> bindParam(":GUESTID", $id, PDO::PARAM_INT);

        

        if ($stmt->execute()) {

            return 'ok';

        } else {

            return 'error';
        }

        $stmt->close;

        $stmt = null;
    }
}