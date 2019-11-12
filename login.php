<?php 
    require_once "init.php";
?>

<?php include "header.php" ?>
<?php if(isset($_POST['username']) && isset($_POST['password'])):{
            $username = $_POST['username'];
            $password=  $_POST['password'];
            $check = false;

            $user = FindUserbyEmail($username);
            
            if($user && password_verify($password,$user['Password'])){
                $check = true;
                $_SESSION['userid'] = $user["ID"];
            }
}
?>
    <?php
        if($check):
            ob_start();
            header('Location: index.php');     
            ob_end_flush();
    ?>
        
    <?php else: ?>
        <div class="card bg-danger m-2">
            <h5>Login fail</h5>
        </div>
    <?php endif; ?>
<?php else: ?>
<div class="card my-4 p-4 w-50 mx-auto">
    <form method="post" action="login.php">
    <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input name="username" type="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter username" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
    <?php endif;?>
<?php include "footer.php" ?>