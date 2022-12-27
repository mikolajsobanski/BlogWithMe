<?php

require_once 'AppController.php';
require_once 'src/models/Admin.php';
require_once __DIR__.'/../repository/AdminRepository.php';

class AdminController extends AppController {

    private $adminRepository;

    public function __construct()
    {
        parent::__construct();
        $this->adminRepository = new AdminRepository();
    }

    public function adminPanel()
    {
        if(!isset($_COOKIE["admin"]))
        {
            header("Location: {$url}/");
        }
        $users = $this->adminRepository->getUserinfoForDelete();
        $posts = $this->adminRepository->getPostsForAdminPanel();
        $this->render('adminPanel',['users' => $users, 'posts' => $posts]);
    }

    public function loginAdmin(){
        
        
        if (!$this->isPost()) {
            return $this->render('loginAdmin');
        }

        $email = $_POST["email"];
        $password = $_POST['password'];

        $admin = $this->adminRepository->getAdmin($email);


        if(!$admin){
            return $this->render('loginAdmin', ['messages' => ['admin not exist!']]);
        }

        if($admin->getEmail() !== $email){
            return $this->render('loginAdmin', ['messages' => ['admin with this email not exist!']]);
        }

        if($admin->getPassword() !== $password){
            return $this->render('loginAdmin', ['messages' => ['admin with this password not exist!']]);
        }
        
        setcookie("admin", $admin->getEmail(), time() + 3600);
        //return $this->render('home');
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/adminPanel");
    }

    public function delete(string $id)
    {
        $tmp = (int) $id;$tmp = (int) $id;
        $this->adminRepository->prepareDelete($tmp);
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/adminPanel");
    }

}