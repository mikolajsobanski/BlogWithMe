<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class PostRepository extends Repository
{

    //function which return user by his email, or return null
    public function getPost(int $id): ?Post
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.posts WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $post = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($post == false) {
            return null; //there should be catch exception
        }

        return new Post(
                $post['title'],
                $post['description'],
                $post['image'],
                $post['content'],
                $post['like'],
                $post['dislike'],
                $post['id']
            
        );
    }

    public function addPost(Post $post): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.posts (title, description, content ,id_asigned_by ,created_at ,image) VALUES (?,?,?,?,?,?)
        ');
        $asigned_by = 20;
        $stmt->execute([
            $post->getTitle(),
            $post->getDescription(),
            $post->getContent(),
            $asigned_by,
            $date->format('Y-m-d'),
            $post-> getImage()
        ]);
    }

    public function getPosts(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM posts;
        ');
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

         foreach ($posts as $post) {
             $result[] = new Post(
                 $post['title'],
                 $post['description'],
                 $post['image'],
                 $post['content'],
                 $post['like'],
                 $post['dislike'],
                 $post['id']
             );
         }

        return $result;
    }

    public function getPostByTitle(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM posts WHERE LOWER(title) LIKE :search OR LOWER(description) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function like(int $id) {
        $stmt = $this->database->connect()->prepare('
           UPDATE posts SET "like" = "like" + 1 WHERE id = :id
        ');

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
   }

   public function dislike(int $id) {
       $stmt = $this->database->connect()->prepare('
           UPDATE posts SET dislike = dislike + 1 WHERE id = :id
        ');

       $stmt->bindParam(':id', $id, PDO::PARAM_INT);
       $stmt->execute();
   }

   public function getFavourite(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM posts ORDER BY "like" DESC; 
        ');
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

         foreach ($posts as $post) {
             $result[] = new Post(
                 $post['title'],
                 $post['description'],
                 $post['image'],
                 $post['content'],
                 $post['like'],
                 $post['dislike'],
                 $post['id']
             );
         }

        return $result;
    }
    
}