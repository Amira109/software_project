<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
require __DIR__ . "/../src/Users.php";

class UsersTest extends TestCase
{
   
    public function test_reset_table () {
        $stmt = Connection::connect()->prepare("TRUNCATE users");
        $ok = $stmt->execute();
        $this->assertTrue($ok);
    }
    
    
    public function test_add () {
        $table = 'tbluseraccount';
        $crypt = crypt('146', '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
        $data = array(
            'USERID' => '2',
            'UNAME' => 'fffd',
            'USER_NAME' => 'admin',
            'UPASS' => $crypt,
            'ROLE' => 'Administrator',
            'PHONE' => '13455665',
            
        );


        $answer = Users::AddUsersModel($table, $data);
        $this->assertEquals($answer, "ok");
    }

    public function test_edit () {

        $table = 'tbluseraccount';
        $encryptpassword = "1256";
        $data = array(
            'UNAME' => 'fffd',
            'USER_NAME' => 'admin',
            'UPASS' => $encryptpassword,
            'ROLE' => 'Administrator',
            'PHONE' => '13455665',
            
        );
        $id = "2";


        $answer = Users::EditUsersModel($table, $data,$id);
        $this->assertEquals($answer, "ok");
    }

    public function test_delete () {
        $table ="tbluseraccount";
        $id = "2";
        $answer = Users::DeleteUsersModel($table, $id);
        $this->assertEquals($answer, "ok");
    }



}