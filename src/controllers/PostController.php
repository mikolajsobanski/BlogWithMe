<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Post.php';
require_once __DIR__.'/../repository/PostRepository.php';

class PostController extends AppController {

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png','image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';
    
    private $message = [];
    private $postRepository;

    public function __construct()
    {
        parent::__construct();
        $this->postRepository = new PostRepository();
    }

    public function home()
    {
       $posts = $this->postRepository->getPosts();
       $this->render('home',['posts' => $posts]);
    }

    public function addPost()
    {   
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'], 
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            // TODO create new project object and save it in database
            $post = new Post($_POST['title'], $_POST['description'], $_FILES['file']['name'], $_POST['content']);
            $this->postRepository->addPost($post);
            return $this->render('home', [
                'posts' => $this->postRepository->getPosts(),
                'messages' => $this->message]);
        }
         $this->render('addPost', ['messages' => $this->message]);
    }

    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }
}