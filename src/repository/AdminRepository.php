<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Admin.php';

class AdminRepository extends Repository
{

    public function getAdmin(string $email): ?Admin
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM admins u LEFT JOIN admin_details ud ON u.id_admin_details = ud.id WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin == false) {
            return null; //there should be catch exception
        }

        return new Admin(
            $admin['email'],
            $admin['password'],
            $admin['name'],
            $admin['surname']
        );
    }

    public function getUserinfoForDelete()
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM users u LEFT JOIN user_details ud ON u.id_user_details = ud.id
        ');
        $stmt->execute();

        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $user) {
            $result[] = new User(
                $user['email'],
                $user['name'],
                $user['surname'],
                $user['phone'],
                $user['id'],
            );
        }

       return $result;
    }

    public function prepareDelete(int $id)
    {

        
        $stmt = $this->database->connect()->prepare('

            DELETE FROM users WHERE id_user_details = :id
        ');
       
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();


        $stmt = $this->database->connect()->prepare('

            DELETE FROM user_details WHERE id = :id
        ');
       
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function getPostsForAdminPanel(): array
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

}