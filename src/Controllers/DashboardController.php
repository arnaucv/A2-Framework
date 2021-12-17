<?php

    namespace App\Controllers;

    use App\Controller;
    use App\Registry;

    class DashboardController extends Controller {
        
        function index () {

            $user = $_SESSION['user']['userId'];
            $db=Registry::get('database');
            $course = NULL;
            $coursePointer = NULL;
            $subjects = NULL;

            try {
                $stmt1 = $db->query("SELECT courseName FROM course t1 INNER JOIN users t2 ON t1.courseId = t2.courseId WHERE userId = ?;");
                $stmt1->execute([$user]);
                $course = $stmt1->fetchAll();

                $stmt2 = $db->query("SELECT `name` FROM ((`subject` t1 INNER JOIN course t2 ON t1.courseId = t2.courseId)INNER JOIN users t3 ON t2.courseId = t3.courseId) WHERE t3.userID = ?;");
                $stmt2->execute([$user]);
                $subjects = $stmt2->fetchAll(\PDO::FETCH_COLUMN, 0);
                
    
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }

            return view ('dashboard', ['course' => $course , 'subjects' => $subjects]);
        }
    }