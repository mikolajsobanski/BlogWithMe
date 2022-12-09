<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/posts.css">
    <title>HOME</title>
</head>
<body>
    <div class="home-container">
        <nav>
            <div class="home-logo">
                <img src="public/img/logo.svg">
            </div>
            
            <ul>
                <li>
                    <a href="/home" class="button">Posts</a>
                </li>
                <li>
                    
                    <a href="#" class="button">People</a>
                </li>
                <li>
                    
                    <a href="#" class="button">Favourite</a>
                </li>
                <li>
                    
                    <a href="#" class="button">Settings</a>
                </li>
                <li>
                    
                    <a href="/" class="button">Logout</a>
                </li>
            </ul>
        </nav>
        <main>
            <header>
                <div class="search-bar">
                    <form>
                        <input placeholder="Search post">
                    </form>

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