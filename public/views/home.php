

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/posts.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <script type="text/javascript" src="./public/js/statistics.js" defer></script>
    <title>HOME</title>
</head>
<body>
    <div class="home-container">
        <nav>
            <?php include('./public/components/navbar.php')?>
        </nav>
        <main>
            <header>
            <?php include('./public/components/header.php')?>
            </header>
            
            <section class="blogs">
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

<template id="post-template">
    <div id="">
        <img src="">
        <div>
            <h2>title</h2>
            <p>description</p>
            <div class="social-section">
                <i class="fas fa-heart"> 0</i>
                <i class="fas fa-minus-square"> 0</i>
                <a href="post/<?= $post->getId(); ?>" >See Post</a>
            </div>
        </div>
    </div>
</template>