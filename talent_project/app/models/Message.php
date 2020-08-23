<?php 
    /**
     * Author: Ing. Alexis Yánez
     * Class Message
     */
    class Message{

        /**
        * Get all the messages for the home
        * @return array with the messages 
        */
        public function getAllMessages(){
            try{
                $file = fopen('message.txt','r');
                if (!$file) {echo 'Can not open file'; return false; exit;}

                $loop = 0;
                while (!feof($file)) {
                    $loop++;
                    $line = fgets($file);
                    $msg[$loop] = explode ('|', $line);
                    $file++;
                    unset($msg[$loop][5]);
                }
                unset($msg[$loop]);

                //Rename tags
                $msg = array_map(function($tag) {
                    return array(
                        'idpost' => $tag[0],
                        'post' => $tag[1],
                        'datemessage' => $tag[2],
                        'id_user' => $tag[3],
                        'username' => $tag[4]
                    );
                }, $msg);

                //Order array by date
                foreach ($msg as $key => $row) {
                    $aux[$key] = $row['datemessage'];
                }
                array_multisort($aux, SORT_DESC, $msg);
                        
                fclose($file);
                return $msg;
            }   catch (Exception $e) {
                echo 'Error: ',  $e->getMessage(), "\n";
            }
        }

        /**
        * Get all the messages for the profile
        * @param string $email with the logged user
        * @return array with the messages 
        */
        public function getProfileMessages($username){
            try{
                $msgProfile = $this->getAllMessages();

                $result = [];            
                foreach ($msgProfile as $key => $value) {
                    foreach ($value as $key2 => $value2) {
                        if ($value2 == $username) {
                            array_push($result, $msgProfile[$key]);
                        }
                    }
                }
                return $result;
            }   catch (Exception $e) {
                echo 'Error: ',  $e->getMessage(), "\n";
            }
        }

        /**
        * Insert the message from the post area
        * @param array $data with the message information
        * @return bool with the post executed
        */
        public function posting($data){
            try{
                //Set time
                date_default_timezone_set('America/Bogota');
                $date = date('Y/m/d H:i:s', time());

                var_dump($date);

                //Get fields
                $post = $data['post'];
                $id_user = $data['id_user'];
                $datemessage = $date;
                $username = $data['username'];

                // Open or create file
                if (file_exists("message.txt")){
                    $file = fopen("message.txt", "a");
                    if (!$file) {echo 'Can not open file'; return false; exit;}
                    $idpost = count(file("message.txt")) + 1;
                    fwrite($file, $idpost ."|". $post ."|". $datemessage ."|". $id_user ."|". $username ."|". PHP_EOL);
                    return true;
                    fclose($file);
                }
                else{
                    $file = fopen("message.txt", "w");
                    if (!$file) {echo 'Can not open file'; return false; exit;}
                    $idpost = count(file("message.txt")) + 1;
                    fwrite($file, $idpost ."|". $post ."|". $datemessage ."|". $id_user ."|". $username ."|". PHP_EOL);
                    return true;
                    fclose($file);
                }
            }   catch (Exception $e) {
                echo 'Error: ',  $e->getMessage(), "\n";
            }

        }
        
        /**
        * Search and filter by param
        * @param array $data with the search information
        * @return array with the result
        */
        public function searchPosting($data){  
            try{
                $word = $data['search'];
                $date = $data['date'];
                
                // Get all Messages
                $allMsg = $this->getAllMessages();

                // Filter by word
                function search_array($text, $array) {
                    return array_filter($array, function($a) use($text){          
                    return stristr(implode(" ", $a), $text);
                    });
                }
                
                // Filter by date
                function filter_date($array, $dateSearch){
                    $result = [];
                    foreach ($array as $key => $value) {     
                        $filteredDate = $value['datemessage'];
                        $postDate = date( "Y-m-d", strtotime($filteredDate));
                                    
                        if ($postDate >= $dateSearch) {
                            array_push($result, $array[$key]);
                        }
                    }
                    return $result;
                }
                
                if ($word == '' && $date =='') {
                    return $allMsg;    
                }
                else if ($word == ''){
                    return filter_date($allMsg, $date);
                }
                else if ($date =='') {
                    return search_array($word, $allMsg);
                }
                else{
                    $filtered = search_array($word, $allMsg);
                    return filter_date($filtered, $date);
                }

            }   catch (Exception $e) {
                echo 'Error: ',  $e->getMessage(), "\n";
            }
        }     
    }

?>