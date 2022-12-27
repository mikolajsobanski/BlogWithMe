

<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/posts.css">
    <?php include("./public/constants/iconLink.php") ?>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <?php
    $title = "People";
    include("./public/constants/title.php");
    ?>
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
                <?php foreach($users as $user): ?>
                
                <div id="">
                    <div>       
                        <h2><?= $user->getEmail(); ?></h2>
                        <p> <?= $user->getPassword(); ?> <?= $user->getName(); ?></p>
                        <p> <?= $user->getSurname(); ?></p>
                    </div>
                </div>
                
                <?php endforeach; ?>

            </section>
        </main>
    </div>
</body>

