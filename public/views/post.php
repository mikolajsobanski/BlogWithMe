
<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="/public/css/post.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <script type="text/javascript" src="/public/js/search.js" defer></script>
    <script type="text/javascript" src="/public/js/statistics.js" defer></script>
    <title>Post</title>
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


            <section class="post-details-section">
            <div id="<?= $post->getId(); ?>">
                <img src="/public/uploads/<?= $post->getImage(); ?>">
                <div>
                    <h2><?= $post->getTitle(); ?></h2>
                    <p><?= $post->getDescription(); ?></p>
                    <p><?= $post->getContent(); ?></p>
                    <div class="social-section">
                        <i class="fas fa-heart"> <?= $post->getLike(); ?></i>
                        <i class="fas fa-minus-square"> <?= $post->getDislike(); ?></i>
                    </div>
                </div>
            </div>
        
            </section>
        </main>
    </div>
</body>