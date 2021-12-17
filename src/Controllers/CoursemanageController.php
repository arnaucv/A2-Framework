<?php

namespace App\Controllers;

use App\Controller;
use App\Registry;

class CoursemanageController extends Controller {
    
    function index() {

        $db=Registry::get('database');

        try {
            $stmt = $db->query("SELECT courseId, courseName FROM course");
            $stmt->execute();
            $course = $stmt->fetchAll();

        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

        try {
            $stmt = $db->query("SELECT subjectId, `name` FROM `subject`");
            $stmt->execute();
            $subject = $stmt->fetchAll();

        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

        return view('coursemanage', ['course' => $course, 'subject' => $subject]);
    }

    function assignCourse(){

        if (isset ($_POST['userId']) && isset($_POST['courseId'])) {

            $user = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_STRING);
            $course = filter_input(INPUT_POST, 'courseId', FILTER_SANITIZE_STRING);
            $db=Registry::get('database');
            
            try {
                $stmt = $db->query("UPDATE users SET courseId = ? WHERE userId = ?");
                $stmt->execute([$course, $user]);
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        
            $this->redirectTo("coursemanage");
        }
    }
    
    function assignSubject(){

        if (isset ($_POST['courseId2']) && isset($_POST['subjectId'])) {

            $subject = filter_input(INPUT_POST, 'subjectId', FILTER_SANITIZE_STRING);
            $course = filter_input(INPUT_POST, 'courseId2', FILTER_SANITIZE_STRING);
            $db=Registry::get('database');
            
            try {
                $stmt = $db->query("UPDATE `subject` SET courseId = ? WHERE subjectId = ?");
                $stmt->execute([$course, $subject]);
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        
            $this->redirectTo("coursemanage");
        }
    }
       
    
}