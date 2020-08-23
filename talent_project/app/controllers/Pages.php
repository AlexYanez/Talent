<?php 
/**
* Author: Ing. Alexis Yánez
* Class Pages as the controller
*/
class Pages extends Controller{

    private $session;
    private $checkpoint = false;
    
    /**
    * Constructor with the instances
    */
    public function __construct(){
        $this->userModel = $this->model('User');
        $this->messageModel = $this->model('Message');
        $this->session = new Session();        
    }

    /**
    * Load the main page
    */
    public function index(){          
        $data = [
        ];
        $this->view('pages/start', $data);
    }

    /**
    * Load the Home page
    * @param $checkpoint for ensure session
    */
    public function home($checkpoint){  
        
        if ($checkpoint == false) {
            $this->session->init();
        }

        $allMessages = $this->messageModel->getAllMessages();
        $data = [
            'allMessages' => $allMessages
        ];

        if ($this->session->getStatus() === 1 || empty($this->session->get('email'))) {
            $this->view('pages/start', $data);
        }else {
            $this->view('pages/home', $data);
        }
    }

    /**
    * Load the Profile page
    */
    public function profile(){  
        $this->session->init();

        $username = $this->session->get('username');
        $profileMessages = $this->messageModel->getProfileMessages($username);

        $data = [
            'profileMessages' => $profileMessages,
            'username' => $username
        ];

        if ($this->session->getStatus() === 1 || empty($this->session->get('email'))) {
            $this->view('pages/start', $data);
        }else {
            $this->view('pages/profile', $data);
        }
    }

    /**
    * Insert the post message
    */
    public function posting(){
        $this->session->init();
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){            
            $data =[
                'post' => trim($_POST['description']),
                'id_user' => trim($_SESSION['iduser']),
                'username' => trim($_SESSION['username'])
            ];

            if($this->messageModel->posting($data)){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
            else{
                die('...Something wrong');
            }
        }else{
            $data = [
            ];
        }        
    }
    
    /**
    * Load the Sign In page
    */
    public function signin(){     
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password'])
            ];
        }

        $access = $this->userModel->checkLogin($data);

        if ($access == true) {
            $this->session->init();
            $this->session->add('iduser', $access['iduser']);
            $this->session->add('username', $access['username']);
            $this->session->add('email', $access['email']);
            header('location: home');   
        }
        else{
            $data = [];
        } 
    }

    /**
    * Load the Sign Up page
    */
    public function signup(){ 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'phone'=> trim($_POST['phone']),
                'password' => trim($_POST['password'])
            ];
            
            $username = $data['username'];
            $email = $data['email'];
            $phone = $data['phone'];
            $password = $data['password'];

            //  Username validation settings
            $letters = preg_match_all('@[a-zA-Z]@', $username);
            $numbersUser = preg_match_all('/\d/', $username);
            $containsSpecial = preg_match('@[^\da-zA-Z]@', $username);

            //  Phone Number validation settings
            $numbersPhone = preg_match('/^([0-9]*)$/', $phone);
            $numbersPhoneLen = preg_match_all('/\d/', $phone);

            //  Password validation settings
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $specialChars = preg_match('@[-]@', $password);

            // Validations of fields
            if($letters < 4 || $numbersUser < 2 || $containsSpecial === 1 ){
                echo "Username should not be empty, have at least 4 letters, 2 numbers and not contain special character";
                $data = [
                ];
                $this->view('pages/register', $data);
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Invalid email format, please write yourmail@example.com";
                $data = [
                ];
                $this->view('pages/register', $data);
            } else if ($numbersPhone === false || $numbersPhoneLen <10) {
                echo "Invalid phone number format, must write only numbers and at least 10";
                $data = [
                ];
                $this->view('pages/register', $data);
            } else if(!$uppercase || !$lowercase || !$specialChars || strlen($password) < 6) {
                echo 'Password should be at least 6 characters in length and should include at least one upper case letter, and one "-" character.';
                $data = [
                ];
                $this->view('pages/register', $data);
                }else{
                    $this->userModel->signUpUser($data);
                    $this->view('pages/start', $data);
                    echo 'User registered sucessfully';
            }

        }else{
            $this->view('pages/register');
        }   
    }

    /**
    * Search posts by word and/or date
    */
    public function searchPost(){        

        $this->session->init();      
        
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $dataSearch = [
                'search' => trim($_GET['search']),
                'date' => trim($_GET['date'])
            ];

                $searchResult = $this->messageModel->searchPosting($dataSearch);
                $data = [
                    'allMessages' => $searchResult,
                ];
         
            if ($this->session->getStatus() === 1 || empty($this->session->get('email'))) {
                $this->view('pages/start', $data);
            }else {
                $this->view('pages/home', $data);
            }
        }else{
            $data = [
            ];
        }
    }

    /**
    * Logout and close session
    */
    public function logout()
    {
        $this->session->close();
        header('location: start.php');
    }

}

?>