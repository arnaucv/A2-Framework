<?php

    namespace App\Controllers;

    use App\Registry;
    use App\Controller;
    use App\Database\Connection;

    class LoginController extends Controller {
        
        function index () {
            return view ('login');
        }

        function Lgin() {
            
            if (isset ($_COOKIE['emailCookie']) && isset ($_COOKIE['passwdCookie'])) {

                $pass = filter_input(INPUT_COOKIE, 'passwdCookie', FILTER_SANITIZE_EMAIL);
                $email = filter_input(INPUT_COOKIE, 'emailCookie', FILTER_SANITIZE_STRING);
        
                $db=Registry::get('database');
        
                
                if (Connection::auth($db, $email, $pass)) {
                    $this->redirectTo("dashboard");
                } else {
                    $this->redirectTo("badLogin");
                }
            }
            // Accion login normal
            else if (isset ($_REQUEST['passwd']) && isset ($_REQUEST['email'])) {
        
                $pass = filter_input(INPUT_POST, 'passwd', FILTER_SANITIZE_EMAIL);
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        
                $db=Registry::get('database');
        
                
                if (Connection::auth($db, $email, $pass)) {
                    
                    if ($_POST['rememberMe']) {
                        setcookie("emailCookie", $email, time()+86400); // expires in 1 day
                        setcookie("passwdCookie", $pass, time()+86400); // expires in 1 day
                    }
                    
                    $this->redirectTo("dashboard");
                    
                } else {
                    $this->redirectTo("badLogin");
                }
            }  else {
                
                $this->redirectTo("badLogin");
            }
        }

        function Lgout() {
            session_destroy();

            $email = $_COOKIE['emailCookie'];
            $pass = $_COOKIE['passwdCookie'];
            setcookie("emailCookie", $email, -1); // expires in 1 day
            setcookie("passwdCookie", $pass, -1); // expires in 1 day

            $this->redirectTo("");
        }
    }