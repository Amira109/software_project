<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
require __DIR__ . "/../src/Reservations.php";

class ReservationTest extends TestCase
{
   
    public function test_reset_table () {
        $stmt = Connection::connect()->prepare("TRUNCATE users");
        $ok = $stmt->execute();
        $this->assertTrue($ok);
    }


    public function test_add () {
        $table = 'tblreservation';

        $data = array(
            'RESERVEID' => '11',
            'CONFIRMATIONCODE' => 'fd5',
            'TRANSDATE' => '2021-03-20',
            'ROOMID' => '14',
            'ARRIVAL' => '2021-03-02 00:00:00',
            'DEPARTURE' => '2021-03-10 00:00:00',
            'RPRICE' => '3960',
            'GUESTID' => '11122',
            'PRORPOSE' => 'Travel',
            'STATUS' => 'Pending',
            'BOOKDATE' => '0000-00-00 00:00:00',
            'REMARKS' => 'gfv',
            'USERID' => '88',
            
        );


        $answer = Reservation::AddReservationModel($table, $data);
        $this->assertEquals($answer, "ok");
    }

    public function test_edit () {

        $table = 'tblreservation';

        $data = array(
            'CONFIRMATIONCODE' => 'fd5',
            'TRANSDATE' => '2021-03-20',
            'ROOMID' => '14',
            'ARRIVAL' => '2021-03-02 00:00:00',
            'DEPARTURE' => '2021-03-10 00:00:00',
            'RPRICE' => '3960',
            'GUESTID' => '11122',
            'PRORPOSE' => 'Travel',
            'STATUS' => 'Pending',
            'BOOKDATE' => '0000-00-00 00:00:00',
            'REMARKS' => 'gfv',
            'USERID' => '88',
            
        );
        $id = "1";


        $answer = Reservation::EditReservationModel($table, $data,$id);
        $this->assertEquals($answer, "ok");
    }

    public function test_delete () {
        $table ="tblreservation";
        $id = "1";
        $answer = Reservation::DeleteReservationModel($table, $id);
        $this->assertEquals($answer, "ok");
    }



}