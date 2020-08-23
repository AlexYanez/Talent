<?php 

/**
* @param string $page recieve and redirect 
*/
function redirect($page){
    header('localhost' . ROUTE_URL . $page);
}


?>