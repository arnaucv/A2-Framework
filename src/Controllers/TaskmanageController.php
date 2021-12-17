<?php

namespace App\Controllers;

use App\Controller;
use App\Registry;

class TaskManageController extends Controller
{

    function index()
    {
        $user = $_SESSION['user']['userId'];
        $db=Registry::get('database');
        $tasks = NULL;

        try {
            $stmt = $db->query("SELECT listName FROM list WHERE userId=?");
            $stmt->execute([$user]);
            $result = $stmt->fetchAll(\PDO::FETCH_COLUMN, 0);

        } catch (\PDOException $e) {
            echo $e->getMessage();
        }

        if (isset ($_POST['listSelection'])) {

            $user = $_SESSION['user'];
            $listName = filter_input(INPUT_POST, 'listSelection', FILTER_SANITIZE_STRING);
        
            try {
                $stmt = $db->query("SELECT taskName FROM task t1 INNER JOIN list t2 ON t1.listId = t2.listCode WHERE listName = ?;");
                $stmt->execute([$listName]);
                $tasks = $stmt->fetchAll(\PDO::FETCH_COLUMN, 0);
                
            } catch (\PDOException $e) {
                echo $e->getMessage();
            } 
            try {
                $stmt = $db->query("SELECT listCode FROM list WHERE  listName = ?");
                $stmt->execute([$listName]);
                $listId = $stmt->fetchAll();
                $_SESSION['currentList']=$listId[0]['listCode'];
        
            } catch (\PDOException $e) {
                echo $e->getMessage();
            } 
        }
       
    return view('taskmanage', ['result' => $result , 'tasks' => $tasks]);
    }

    function createTask(){

        if (isset ($_POST['taskName'])) {
    
            $user = $_SESSION['user']['userId'];
            $taskName = filter_input(INPUT_POST, 'taskName', FILTER_SANITIZE_STRING);
            $taskDescription = filter_input(INPUT_POST, 'taskDescription', FILTER_SANITIZE_STRING);
            $currentList = $_SESSION['currentList'];
            $db=Registry::get('database');
            
            try {
                $stmt = $db->query("INSERT INTO task(listId, taskName, taskDescription) VALUES(?,?,?)");
                $stmt->execute([$currentList, $taskName, $taskDescription]);
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        
            $this->redirectTo("taskmanage");
        }
    }

    function createList() {

        if (isset ($_POST['listName'])) {
    
            $user = $_SESSION['user']['userId'];
            $listName = filter_input(INPUT_POST, 'listName', FILTER_SANITIZE_STRING);
            $db=Registry::get('database');
            
            try {
                $stmt = $db->query("INSERT INTO list(userId, listName) VALUES(?,?)");
                $stmt->execute([$user, $listName]);
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        
            $this->redirectTo("taskmanage"); 
        }
    }
}
