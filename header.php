
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid mt-4 w-75">

    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">LTWEB1</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php echo ($page == 'index'?'disable':'active') ?>">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            
            <?php if(!$user): ?>
            <li class="nav-item <?php echo ($page == 'login'?'disable':'active') ?> ?>">
                <a class="nav-link" href="login.php">Login<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php echo ($page == 'register'?'disable':'active') ?> ?>">
                <a class="nav-link" href="register.php">Register</a>
            </li>
            <?php else: ?>
            <li class="nav-item <?php echo ($page == 'sum'?'disable':'active') ?> ?>">
                <a class="nav-link" href="sum.php">Sum<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?php echo ($page == 'mypage'?'disable':'active') ?> ?>">
                <a class="nav-link" href="mypage.php">MyPage</a>
            </li>
            <li class="nav-item <?php echo ($page == 'changePassword'?'disable':'active') ?> ?>">
                <a class="nav-link" href="changePassword.php">ChangePassword</a>
            </li>
            <li class="nav-item <?php echo ($page == 'UpdateInf'?'disable':'active') ?> ?>">
                <a class="nav-link" href="UpdateInf.php">Update Infomation</a>
            </li>
            <li class="nav-item <?php echo ($page == 'logout'?'disable':'active') ?> ?>">
                <a class="nav-link" href="logout.php">Logout<?php echo  isset($user)? '('.$user['Name'] . ')':'' ?><span class="sr-only">(current)</span></a>
            </li>
            
            <?php endif; ?>
            
            
        </div>
    </nav>    
  
