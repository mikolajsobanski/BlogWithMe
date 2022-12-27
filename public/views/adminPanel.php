
<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="/public/css/adminPanel.css">
    <?php include("./public/constants/iconLink.php") ?>
    <?php
    $title = "Admin panel";
    include("./public/constants/title.php");
    ?>
</head>
<body>
    <div class="home-container">
        <nav>
            <div class="users">
        <?php foreach($users as $user): ?>
                
                <div id="">
                    <div>       
                        <h2><?= $user->getEmail(); ?></h2>
                        <p> <?= $user->getPassword(); ?> <?= $user->getName(); ?></p>
                        <p> <?= $user->getSurname(); ?></p>
                    </div>
                    <td></a>&nbsp;<a class="btn btn-danger" href="delete/<?= $user->getId(); ?>">Delete</a></td>
                </div>
                
                <?php endforeach; ?>
                </div>
        </nav>
        <main>
            
            <section class="posts-section">
            <?php foreach($posts as $post): ?>
                
                <div id="<?= $post->getId(); ?>">
                    <img src="public/uploads/<?= $post->getImage(); ?>">
                    <div>
                            
                        <h2><?= $post->getTitle(); ?></h2>
                       
                        
                        <p> <?= $post->getDescription(); ?></p>
                       

                        <div class="social-section">
                            <i class="fas fa-heart"> <?= $post->getLike(); ?></i>
                            <i class="fas fa-minus-square"> <?= $post->getDislike(); ?></i>
                            <a href="post/<?= $post->getId(); ?>" >See Post</a>
                            
                        </div>
                        
                    
                    </div>
                </div>
                
                <?php endforeach; ?>
            
            </section>
        </main>
    </div>
</body>
