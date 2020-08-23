<?php 

/**
* Author: Ing. Alexis Yánez
* Class for load the models and views
*/
class Controller{

    /**
    * @param string $model selected 
    * @return object the model with the url shorted
    */
    public function model($model){
        //Load model
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    /**
    * @param string $view selected 
    * @param array $data with aditional information
    */
    public function view($view, $data = []){
        
        //Check if the view exist
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        }else{
            // if not exist
            die('Wrong page');
        }
    }
}


?>