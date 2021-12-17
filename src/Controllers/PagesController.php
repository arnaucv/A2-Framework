<?php

    namespace App\Controllers;

    class PagesController{

        function index(){
            return view('index');
        }

        function register() {
            return view('register');
        }

        function badLogin() {
            return view('badLogin');
        }

        function dashboard() {
            return view('dashboard');
        }

        function home() {
            return view('home');
        }

        function login() {
            if (isset($_COOKIE['emailCookie']) && isset($_COOKIE['passwdCookie'])) {
                header('Location:?url=login');
            } else {
                // renders login template
                return view('login');
            }
        }

        function taskManage() {
        return view('taskManage' /*['result'=>$result, 'tasks'=>$tasks]*/);
        }
    }