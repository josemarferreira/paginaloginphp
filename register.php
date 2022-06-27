<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;700;800&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/register.css">
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

</head>
<body>
    <div id="fundo">
        <header id="top">
            <div id="logo">
                <div class="box"></div>
                <p class="text-logo">Anywhere app<span class="dot">.</span></p>
            </div>
            <ul id="menu">
                <li><a href="index.html">Home</a></li>
                <li><a href="register.html">Join</a></li>
            </ul>
        </header>

        <main class="container">
            <header id="banner">
                <h3>START FOR FREE</h3>
                <h1>Create new account<span class="dot">.</span></h1>
                <p>Already A Member? <a href="index.html">Log In</a></p>
            </header>

            <form action="" method="post" id="form-group">
                <div class="input-nome">
                    <div class="input-group">
                        <input type="text" name="first_name" id="first_name" placeholder="">
                        <label for="first_name">First Name</label>
                        <span class="iconify" data-icon="bxs:user-detail"></span>
                    </div>
    
                    <div class="input-group">
                        <input type="text" name="last_name" id="last_name" placeholder="">
                        <label for="last_name">Last Name</label>
                        <span class="iconify" data-icon="bxs:user-detail"></span>
                    </div>
                </div>
            
                <div class="input-group">
                    <input type="email" name="email" id="email">
                    <label for="email">Email</label>
                    <span class="iconify" data-icon="dashicons:email"></span>
                </div>

                <div class="input-group">
                    <input type="password" name="password" id="password">
                    <label for="password">Password</label>
                    <span class="iconify" data-icon="bi:eye-fill"></span>
                </div>

                <div id="button">
                    <button type="submit" class="btn btn-confirm">Create account</button>
                </div>
            </form>
        </main>
    </div>
</body>
</html>