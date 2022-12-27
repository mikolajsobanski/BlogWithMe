<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <?php
    $title = "Login admin";
    include("./public/constants/title.php");
    ?>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="public/img/logo.svg">
        </div>

        <div class="login-container">
            
            <form class="loginAdmin" action="loginAdmin" method="POST">
                <div class="messages">
                    <?php if(isset($messages)){
                        foreach ($messages as $message){
                            echo $message;
                        }
                        
                    }
                    ?>
                </div>
                
                <input name="email" type="text" placeholder="email@email.com">
                <input name="password" type="password" placeholder="***********">
                <button type="submit">LOGIN</button>
                
            </form>
        </div>
        
    </div>
</body>