<?php 
    
    /**
    * Author: Ing. Alexis Yánez
    * Class for maping the url [0]-Controller, [1]-Methods and [2]-Parameters
    */
    class Core{
        private $currentController = 'pages';
        private $currentMethod = 'index';
        private $parameters = [];

        /**
        * Constructor for maping the url
        */
        public function __construct()
        {
            $url = $this->getUrl();
            
            if (isset($url[0])) {
                // Search if the controller exist
                if (file_exists('../app/controllers/' .ucwords($url[0]).'.php')){
                    
                    //Set the controller by default
                    $this->currentController = ucwords($url[0]);

                    //Unset initial index 
                    unset($url[0]);
                    
                }
            }

            //require the controller
            require_once '../app/controllers/' . $this->currentController . '.php';
            $this->currentController = new $this->currentController;
        
            //Check the second part from url (Method)
            if (isset($url[1])){

                if (method_exists($this->currentController, $url[1])){
                    $this->currentMethod = $url[1];
                    unset($url[1]);
                }
            }
                    
                //Get the parameters
                $this->parameters[] = $url ? array_values($url) : [];

                //Callback with parameters array
                call_user_func_array([$this->currentController, $this->currentMethod], $this->parameters);
                unset($url[2]); 
        }

        /**
        * Get the url mapped
        * @return array the url configuration
        */
        public function getUrl(){
            if (isset($_GET['url'])){
                
                //Cut the right spaces after slash
                $url = rtrim($_GET['url'],'/');
                
                //This will be read like url
                $url = filter_var($url, FILTER_SANITIZE_URL);
                
                //This function require one delimiter and the url (string)
                $url = explode('/', $url);
                
                return $url;
            }     
        }
    }

?>