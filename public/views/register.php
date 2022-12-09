<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/register.css">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="public/img/logo.svg">
        </div>

        <div class="register-container">
            
            <form class="register" action="register" method="POST"> 
                <div class="messages">
                    <?php if(isset($messages)){
                        foreach ($messages as $message){
                            echo $message;
                        }
                        
                    }
                    ?>
                </div>
                <h2>Register to app</h2>
                <input name="name" type="text" placeholder="Enter name">
                <input name="surname" type="text" placeholder="Enter surname">
                <input name="email" type="text" placeholder="Enter email email@email.com">
                <input name="password" type="password" placeholder="Enter password ***********">
                <input name="confirmedPassword" type="password" placeholder="confirm password *********">
                <input name="phone" type="text" placeholder="phone">
                <button type="submit">REGISTER</button>
                <div class="gotoRegister">
                    Have account? click <a href="/login" class="login-link">Login</a>
                </div>
            </form>
        </div>
        
    </div>
</body>