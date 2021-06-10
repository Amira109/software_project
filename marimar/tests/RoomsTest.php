<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
require __DIR__ . "/../src/Rooms.php";

class RoomsTest extends TestCase
{
   
    public function test_reset_table () {
        $stmt = Connection::connect()->prepare("TRUNCATE users");
        $ok = $stmt->execute();
        $this->assertTrue($ok);
    }

    
    public function test_add () {
        $table = 'tblroom';

        $data = array(
            'ROOMID' => '20',
            'ROOMNUM' => '0',
            'ACCOMID' => '12',
            'ROOM' => 'Wing A',
            'ROOMDESC' => 'without TV',
            'NUMPERSON' => '1',
            'PRICE' => '10',
            'ROOMIMAGE' => 'rooms/1.jpg',
            'OROOMNUM' => '1',
            'RoomTypeID' => '0',
            
        );


        $answer = Rooms::AddRoomsModel($table, $data);
        $this->assertEquals($answer, "ok");
    }

    public function test_edit () {

        $table = 'tblroom';

        $data = array(
            'ROOMNUM' => '0',
            'ACCOMID' => '12',
            'ROOM' => 'Wing A',
            'ROOMDESC' => 'without TV',
            'NUMPERSON' => '1',
            'PRICE' => '10',
            'ROOMIMAGE' => 'rooms/1.jpg',
            'OROOMNUM' => '1',
            'RoomTypeID' => '0',
        );
        $id = "12";


        $answer = Rooms::EditRoomsModel($table, $data,$id);
        $this->assertEquals($answer, "ok");
    }

    public function test_delete () {
        $table ="tblroom";
        $id = "11";
        $answer = Rooms::DeleteRoomsModel($table, $id);
        $this->assertEquals($answer, "ok");
    }



}