<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <title>LOGIN PAGE</title>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="public/img/logo.svg">
        </div>

        <div class="login-container">
            
            <form class="login" action="login" method="POST">
                <div class="messages">
                    <?php if(isset($messages)){
                        foreach ($messages as $message){
                            echo $message;
                        }
                        
                    }
                    ?>
                </div>
                <h2>Login to app</h2>
                <input name="email" type="text" placeholder="email@email.com">
                <input name="password" type="password" placeholder="***********">
                <button type="submit">LOGIN</button>
                <div class="gotoRegister">
                    Do not have account? click <a href="/register" class="register-link">Register</a>
                </div>
            </form>
        </div>
        
    </div>
</body>