<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/posts.css">
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <title>HOME</title>
</head>
<body>
    <div class="home-container">
        <nav>
            <?php include('./public/components/navbar.php')?>
        </nav>
        <main>
            <header>
                <div class="search-bar">
                     <input placeholder="search post">
                </div>
                <div class="add-post">
                    <a href="/addPost" class="addPost-link">Add post</a>
                </div>
            </header>
            
            <section class="blogs">
                <?php foreach($posts as $post): ?>
    
                <div id="post-2">
                    <img src="public/uploads/<?= $post-> getImage(); ?>">
                    <div>
                        <div class="homeTitle"><?= $post-> getTitle(); ?></div>
                        <p><?= $post-> getDescription(); ?></p>
                        <div class="social-section">
                            <i class="fas fa-heart">600</i>
                            <i class="fas fa-minus-square">101</i>
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
            </div>
        </div>
    </div>
</template>