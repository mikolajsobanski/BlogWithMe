<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/uploadPost.css">

    <title>Add Post</title>
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
                    
                    <a href="/favourite" class="button">Favourite</a>
                </li>
                <li>
                    
                    <a href="/logout" class="button">Logout</a>
                </li>
            </ul>
        </nav>
        <main>
            
            <section class="post-form">
                <div class="uploadTitle">Add post</div>
                <form action="addPost" method="POST" ENCTYPE="multipart/form-data">
                    <div class="messages">
                        <?php
                            if(isset($messages)){
                                foreach($messages as $message) {
                                    echo $message;
                                }
                            }
                        ?>
                    </div>
                    <input class="postTitle" name="title" type="text" placeholder="title">
                    <textarea name="description" rows=5 placeholder="description"></textarea>
                    <input class="addImage-button" type="file" name="file"/>
                    <textarea name="content" rows=10 placeholder="Enter your post content..."></textarea>
                    <button type="submit">Add</button>
                </form>
            </section>
        </main>
    </div>
</body>