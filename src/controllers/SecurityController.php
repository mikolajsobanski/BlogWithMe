<?php

require_once 'AppController.php';
require_once 'src/models/User.php';
require_once 'src/models/Admin.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController {

    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login(){
        
        
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = $_POST['password'];
        


        $user = $this->userRepository->getUser($email);


        if(!$user){
            return $this->render('login', ['messages' => ['User not exist!']]);
        }

        if($user->getEmail() !== $email){
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if(!password_verify($password,$user->getPassword())){
            return $this->render('login', ['messages' => ['User with this password not exist!']]);
        }



        
        setcookie("type", $user->getEmail(), time() + 3600);
        //return $this->render('home');
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");
    }

    public function register(){
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $phone = $_POST['phone'];

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }

        $options = [
            'cost' => 10,
            'salt' => '$P27r06o9!nasda57b2M22'
        ];


        //TODO try to use better hash function
        $user = new User(
            $email,
            password_hash($password, PASSWORD_BCRYPT, $options), 
             $name,
             $surname);
        $user->setPhone($phone);

        $this->userRepository->setUser($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }


    public function loginAdmin(){
        
        
        if (!$this->isPost()) {
            return $this->render('loginAdmin');
        }

        $email = $_POST["email"];
        $password = $_POST['password'];

        $admin = $this->userRepository->getAdmin($email);


        if(!$admin){
            return $this->render('loginAdmin', ['messages' => ['admin not exist!']]);
        }

        if($admin->getEmail() !== $email){
            return $this->render('loginAdmin', ['messages' => ['admin with this email not exist!']]);
        }

        if($admin->getPassword() !== $password){
            return $this->render('loginAdmin', ['messages' => ['admin with this password not exist!']]);
        }
        
        setcookie("type", $user->getEmail(), time() + 3600);
        //return $this->render('home');
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/home");
    }

    public function logout(){
        setcookie("type", "", time()-3600);
        header("Location: {$url}/");
    }

    public function people()
   {
    if(!isset($_COOKIE["type"]))
    {
        header("Location: {$url}/");
    }
   $users = $this->userRepository->getUserinfo();
   $this->render('people',['users' => $users]);
   }
}