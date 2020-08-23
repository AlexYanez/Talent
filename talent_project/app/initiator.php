<?php 
    //Load libraries
    require_once 'config/Configure.php';
    require_once 'helpers/url_helper.php';

    //Autoload.php
    spl_autoload_register(function($className){        
        require_once 'library/'.$className. '.php';
    });
    
?>