<?php

namespace App\Controllers;

use App\Registry;
use App\Controller;
use App\Database\Connection;

class RegisterController extends Controller{

    function index () {
        return view ('register');
    }

    function Reg() {
        if (isset ($_POST['username']) && isset ($_POST['passwd']) && isset ($_POST['email']) && isset ($_POST['role'])) {
    
            $user = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $pass = filter_input(INPUT_POST, 'passwd', FILTER_SANITIZE_EMAIL);
            $encryptedPass = password_hash($pass, PASSWORD_BCRYPT);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
            $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);
            $db=Registry::get('database');
            
            try {
                $stmt = $db->query("INSERT INTO users(username, `password`, email, `role`) VALUES(?,?,?,?)");
                $stmt->execute([$user, $encryptedPass, $email, $role]);
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
            if (Connection::auth($db, $email, $pass)) {
                header ('Location: /');
            }
        }
    }
    
}
