<?php 
    require_once "init.php";
?>

<?php include "header.php" ?>
<?php if(isset($_POST['Name'])  && isset($_POST['Email']) && isset($_POST['Password'])):{
            $Name = $_POST['Name'];
            $Email = $_POST['Email'];
            $Password =  $_POST['Password'];
            $usercheck = FindUserbyEmail($Email);
            $check = false;

            if(!$usercheck){        
                $newUsrerID = CreateUser($Name,$Email,$Password);
                
                $_SESSION['userid'] = $newUsrerID;
                $check = true;
            }
            
}
?>
    <?php
        if($check):     
    ?>
        <div class="card bg-primary m-2">
            <h5>Đăng kí thành công</h5>
        </div>
    <?php else: ?>
        <div class="card bg-danger m-2">
            <h5>Đăng kí thất bại</h5>
        </div>
    <?php endif; ?>
<?php else: ?>
<div class="card my-4 p-4 w-50 mx-auto">   
    <h1>Đăng kí</h1>
    <form method="post" action="register.php"  enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputEmail1">Họ tên</label>
        <input name="Name" type="text" class="form-control" id="Name"  placeholder="Enter họ tên" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input name="Email" type="email" class="form-control" id="Email" placeholder="Email" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input name="Password" type="password" class="form-control" id="Password" placeholder="Password" required>
    </div>
    <button type="submit" class="btn btn-primary">Đăng ký</button>
    </form>
</div>
    <?php endif;?>
<?php include "footer.php" ?>