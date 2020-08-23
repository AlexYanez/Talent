<?php 
/**
 * Author: Ing. Alexis Yánez
 * Class User
 */
class User{
    
    /**
    * Validate the data login
    * @param array $data with de information to validate
    * @return array with the result of the query 
    */
    public function checkLogin($data){
        try{
            $username = $data['username'];
            $password = $data['password'];

            // Search files
            $file = fopen('user.txt','r');
            if (!$file) {echo 'Can not open file'; return false; exit;}

            $loop = 0;
            while (!feof($file)) {
                $loop++;
                $line = fgets($file);
                $field[$loop] = explode ('|', $line);
                $file++;
                unset($field[$loop][5]);
            }
            unset($field[$loop]);

            foreach ($field as $key => $value) {
                if ($username === $field[$key][1] && $password === $field[$key][4]) {               
                    $result = [
                        'iduser' => $field[$key][0],
                        'username' => $field[$key][1],
                        'email' => $field[$key][2],
                        'phone' => $field[$key][3],
                        'password' => $field[$key][4]
                    ];
                    break;
                }
                else{
                    $result = false;
                }
            }  
            fclose($file);
            return $result;
        }   catch (Exception $e) {
            echo 'Error: ',  $e->getMessage(), "\n";
        }
        
        
    }

    /**
    * Sign up a new user
    * @param array $data with de information for validate
    * @return bool with the result
    */
    public function signUpUser($data){
        try{
            //File creation
            $username = $data['username'];
            $email = $data['email'];
            $phone = $data['phone'];
            $password = $data['password'];

            // Create or open file
            if (file_exists("user.txt")){
                $file = fopen("user.txt", "a");
                if (!$file) {echo 'Can not open file'; return false; exit;}
                $id = count(file("user.txt")) + 1;
                fwrite($file, $id ."|". $username ."|". $email ."|". $phone ."|". $password ."|". PHP_EOL);
                return true;
                fclose($file);
            }
            else{
                $file = fopen("user.txt", "w");
                if (!$file) {echo 'Can not open file'; return false; exit;}
                $id = count(file("user.txt")) + 1;
                fwrite($file, $id ."|". $username ."|". $email ."|". $phone ."|". $password ."|". PHP_EOL);
                return true;
                fclose($file);
            }
        }   catch (Exception $e) {
            echo 'Error: ',  $e->getMessage(), "\n";
        }
    }
}


?>