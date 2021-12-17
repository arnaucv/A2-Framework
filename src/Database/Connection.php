<?php
    namespace App\Database;

    class Connection{
        public static function make($config){
          $dsn=$config['connection'].';dbname='.$config['dbname'];
            try {
                return new \PDO(
                   $dsn,
                    $config['dbuser'],
                    $config['dbpassword'],
                    $config['options']
                );
            } catch (\PDOException $e) {
                die($e->getMessage());
            }

        }
        public static function auth($db,$email,$password):bool {
        
            try{   
        
            //preparem sentència
            $stmt=$db->query('SELECT * FROM users WHERE email=:email LIMIT 1');
            $stmt->execute([':email'=>$email]);
            $count=$stmt->rowCount();
            $row=$stmt->fetchAll(\PDO::FETCH_ASSOC);  
            
            // ha trobat incidència
            if($count==1){       
                $user=$row[0];
                $res=password_verify($password,$user['password']);
               
                if ($res){
                // establim sessió
                  $_SESSION['logged']=true;
                  $_SESSION['username']=$user['username'];
                  $_SESSION['email']=$user['email'];
                  $_SESSION['user']=$user;
                  $_SESSION['role']=$user['role'];
                // retornem true
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }catch(\PDOException $e){
            return false;
        }
    }
    }
