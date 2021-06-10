<?php declare(strict_types=1);

require_once "connection.php";

/**
 * Class Rooms
 */

final class Rooms
{

    public static function AddRoomsModel($table, $data): string
    {

        $stmt = Connection::connect()->prepare("INSERT INTO $table(ROOMID,ROOMNUM, ACCOMID, ROOM, ROOMDESC,
        NUMPERSON,PRICE,ROOMIMAGE,OROOMNUM,RoomTypeID) 
        VALUES (:ROOMID,:ROOMNUM, :ACCOMID, :ROOM,:ROOMDESC,:NUMPERSON,:PRICE,:ROOMIMAGE,:OROOMNUM,
        :RoomTypeID)");

        $stmt -> bindParam(":ROOMID", $data["ROOMID"], PDO::PARAM_STR);
        $stmt -> bindParam(":ROOMNUM", $data["ROOMNUM"], PDO::PARAM_STR);
        $stmt -> bindParam(":ACCOMID", $data["ACCOMID"], PDO::PARAM_STR);
        $stmt -> bindParam(":ROOM", $data["ROOM"], PDO::PARAM_STR);
        $stmt -> bindParam(":ROOMDESC", $data["ROOMDESC"], PDO::PARAM_STR);
        $stmt -> bindParam(":NUMPERSON", $data["NUMPERSON"], PDO::PARAM_STR);
        $stmt -> bindParam(":PRICE", $data["PRICE"], PDO::PARAM_STR);
        $stmt -> bindParam(":ROOMIMAGE", $data["ROOMIMAGE"], PDO::PARAM_STR);
        $stmt -> bindParam(":OROOMNUM", $data["OROOMNUM"], PDO::PARAM_STR);
        $stmt -> bindParam(":RoomTypeID", $data["RoomTypeID"], PDO::PARAM_STR);
        

        if ($stmt->execute()) {

            return 'ok';

        } else {

            return 'error';
        }

        $stmt -> close;

        $stmt = null;
    }

    public static function EditRoomsModel($table, $data,$id): string
    { 
        $stmt = Connection::connect()->prepare("UPDATE $table set  ROOMNUM = :ROOMNUM,
         ACCOMID = :ACCOMID ,ROOM = :ROOM ,ROOMDESC = :ROOMDESC ,NUMPERSON = :NUMPERSON ,PRICE = :PRICE ,
         ROOMIMAGE = :ROOMIMAGE ,OROOMNUM = :OROOMNUM ,RoomTypeID = :RoomTypeID 
          WHERE ROOMID = $id");

        
        $stmt -> bindParam(":ROOMNUM", $data["ROOMNUM"], PDO::PARAM_STR);
        $stmt -> bindParam(":ACCOMID", $data["ACCOMID"], PDO::PARAM_STR);
        $stmt -> bindParam(":ROOM", $data["ROOM"], PDO::PARAM_STR);
        $stmt -> bindParam(":ROOMDESC", $data["ROOMDESC"], PDO::PARAM_STR);
        $stmt -> bindParam(":NUMPERSON", $data["NUMPERSON"], PDO::PARAM_STR);
        $stmt -> bindParam(":PRICE", $data["PRICE"], PDO::PARAM_STR);
        $stmt -> bindParam(":ROOMIMAGE", $data["ROOMIMAGE"], PDO::PARAM_STR);
        $stmt -> bindParam(":OROOMNUM", $data["OROOMNUM"], PDO::PARAM_STR);
        $stmt -> bindParam(":RoomTypeID", $data["RoomTypeID"], PDO::PARAM_STR);
        
        if ($stmt->execute()) {

            return 'ok';

        } else {

            return 'error';
        }
        $stmt -> close;
        

        $stmt = null;
    }

    public static function DeleteRoomsModel($table,$id): string
    {
        $stmt = Connection::connect()->prepare("DELETE FROM $table WHERE ROOMID = $id");

        $stmt -> bindParam(":ROOMID", $id, PDO::PARAM_INT);

        

        if ($stmt->execute()) {

            return 'ok';

        } else {

            return 'error';
        }

        $stmt->close;

        $stmt = null;
    }
}