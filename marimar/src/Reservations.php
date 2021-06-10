<?php declare(strict_types=1);

require_once "connection.php";

/**
 * Class Reservation
 */
final class Reservation
{

    public static function AddReservationModel($table, $data): string
    {

        $stmt = Connection::connect()->prepare("INSERT INTO $table(RESERVEID,CONFIRMATIONCODE, TRANSDATE,
         ROOMID, ARRIVAL,DEPARTURE, RPRICE,GUESTID,PRORPOSE,STATUS,BOOKDATE,REMARKS,USERID) 
        VALUES (:RESERVEID,:CONFIRMATIONCODE, :TRANSDATE, :ROOMID,:ARRIVAL,:DEPARTURE,:RPRICE,:GUESTID,
        :PRORPOSE,:STATUS,:BOOKDATE,:REMARKS,:USERID)");

        $stmt -> bindParam(":RESERVEID", $data["RESERVEID"], PDO::PARAM_STR);
        $stmt -> bindParam(":CONFIRMATIONCODE", $data["CONFIRMATIONCODE"], PDO::PARAM_STR);
        $stmt -> bindParam(":TRANSDATE", $data["TRANSDATE"], PDO::PARAM_STR);
        $stmt -> bindParam(":ROOMID", $data["ROOMID"], PDO::PARAM_STR);
        $stmt -> bindParam(":ARRIVAL", $data["ARRIVAL"], PDO::PARAM_STR);
        $stmt -> bindParam(":DEPARTURE", $data["DEPARTURE"], PDO::PARAM_STR);
        $stmt -> bindParam(":RPRICE", $data["RPRICE"], PDO::PARAM_STR);
        $stmt -> bindParam(":GUESTID", $data["GUESTID"], PDO::PARAM_STR);
        $stmt -> bindParam(":PRORPOSE", $data["PRORPOSE"], PDO::PARAM_STR);
        $stmt -> bindParam(":STATUS", $data["STATUS"], PDO::PARAM_STR);
        $stmt -> bindParam(":BOOKDATE", $data["BOOKDATE"], PDO::PARAM_STR);
        $stmt -> bindParam(":REMARKS", $data["REMARKS"], PDO::PARAM_STR);
        $stmt -> bindParam(":USERID", $data["USERID"], PDO::PARAM_STR);
    

        if ($stmt->execute()) {

            return 'ok';

        } else {

            return 'error';
        }

        $stmt -> close;

        $stmt = null;
    }

    public static function EditReservationModel($table, $data,$id): string
    { 
        $stmt = Connection::connect()->prepare("UPDATE $table set  CONFIRMATIONCODE = :CONFIRMATIONCODE,
         TRANSDATE = :TRANSDATE ,ROOMID = :ROOMID ,ARRIVAL = :ARRIVAL ,DEPARTURE = :DEPARTURE  ,
         RPRICE = :RPRICE ,GUESTID = :GUESTID ,PRORPOSE = :PRORPOSE ,STATUS = :STATUS ,
         BOOKDATE = :BOOKDATE,REMARKS = :REMARKS, USERID = :USERID 
          WHERE RESERVEID = $id");

          $stmt -> bindParam(":CONFIRMATIONCODE", $data["CONFIRMATIONCODE"], PDO::PARAM_STR);
          $stmt -> bindParam(":TRANSDATE", $data["TRANSDATE"], PDO::PARAM_STR);
          $stmt -> bindParam(":ROOMID", $data["ROOMID"], PDO::PARAM_STR);
          $stmt -> bindParam(":ARRIVAL", $data["ARRIVAL"], PDO::PARAM_STR);
          $stmt -> bindParam(":DEPARTURE", $data["DEPARTURE"], PDO::PARAM_STR);
          $stmt -> bindParam(":RPRICE", $data["RPRICE"], PDO::PARAM_STR);
          $stmt -> bindParam(":GUESTID", $data["GUESTID"], PDO::PARAM_STR);
          $stmt -> bindParam(":PRORPOSE", $data["PRORPOSE"], PDO::PARAM_STR);
          $stmt -> bindParam(":STATUS", $data["STATUS"], PDO::PARAM_STR);
          $stmt -> bindParam(":BOOKDATE", $data["BOOKDATE"], PDO::PARAM_STR);
          $stmt -> bindParam(":REMARKS", $data["REMARKS"], PDO::PARAM_STR);
          $stmt -> bindParam(":USERID", $data["USERID"], PDO::PARAM_STR);
        
        if ($stmt->execute()) {

            return 'ok';

        } else {

            return 'error';
        }
        $stmt -> close;
        

        $stmt = null;
    }

    public static function DeleteReservationModel($table, $id): string
    {
        $stmt = Connection::connect()->prepare("DELETE FROM $table WHERE RESERVEID = $id");

        $stmt -> bindParam(":RESERVEID", $id, PDO::PARAM_INT);

        

        if ($stmt->execute()) {

            return 'ok';

        } else {

            return 'error';
        }

        $stmt->close;

        $stmt = null;
    }
}