<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
require __DIR__ . "/../src/Guests.php";

class GuestsTest extends TestCase
{

    public function test_reset_table () {
        $stmt = Connection::connect()->prepare("TRUNCATE users");
        $ok = $stmt->execute();
        $this->assertTrue($ok);
    }


    public function test_add () {
        $table = 'tblguest';

        $crypt = crypt('146', '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

        $data = array(
            'GUESTID' => '11111',
            'REFNO' => '0',
            'G_FNAME' => 'ansam',
            'G_LNAME' => 'madi',
            'G_CITY' => 'gaza',
            'G_ADDRESS' => 'hgdhjfjks',
            'DBIRTH' => '2021-03-03',
            'G_PHONE' => '12345',
            'G_NATIONALITY' => 'ffddsdf',
            'G_COMPANY' => 'fdeef',
            'G_CADDRESS' => 'ffffff',
            'G_TERMS' => '1',
            'G_EMAIL' => 'admin2@gmail.com',
            'G_UNAME' => 'ansam madi',
            'G_PASS' => $crypt,
            'ZIP' => '12345',
            'LOCATION' => 'sfgg',
        );


        $answer = Guests::AddGuestsModel($table, $data);
        $this->assertEquals($answer, "ok");
    }

    public function test_edit () {

        $table = "tblguest";
        $encryptpassword = "1256";
        $data = array(
            'REFNO' => '0',
            'G_FNAME' => 'ansam',
            'G_LNAME' => 'madi',
            'G_CITY' => 'gaza',
            'G_ADDRESS' => 'hgdhjfjks',
            'DBIRTH' => '2021-03-03',
            'G_PHONE' => '12345',
            'G_NATIONALITY' => 'ffddsdf',
            'G_COMPANY' => 'fdeef',
            'G_CADDRESS' => 'ffffff',
            'G_TERMS' => '1',
            'G_EMAIL' => 'admin2@gmail.com',
            'G_UNAME' => 'ansam madi',
            'G_PASS' => $encryptpassword,
            'ZIP' => '12345',
            'LOCATION' => 'sfgg',
        );
        $id = "11122";

        $answer = Guests::EditGuestsModel($table, $data,$id);
        $this->assertEquals($answer, "ok");
    }

    public function test_delete () {
        $table ="tblguest";
        $id = 11122;
        $answer = Guests::DeleteGuestsModel($table, $id);
        $this->assertEquals($answer, "ok");
    }



}