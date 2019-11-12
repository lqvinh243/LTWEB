<?php ob_start();  require_once 'init.php' ?>

<?php include("header.php") ?>

<?php 
    if(isset($_POST['newname']) && isset($_FILES['avatar'])):{
        $newname = $_POST['newname'];
        $img_file = $_FILES['avatar']['name'];
        $img_temp = $_FILES['avatar']['tmp_name'];
        $check2 = resizeImage($img_temp,170,170);
        imagejpeg($check2,$img_temp,100);
        $check1 = move_uploaded_file($img_temp,'uploads/image/'.$img_file);
        $check = UpdateInf($user['ID'],$newname,$img_file);
    }

    if($check):   
        header('Location:index.php');
        ob_flush_end();
?>
    
    <?php else: ?>
    <h4 class="text-center">Update infomation fail</h4>
    <?php endif; ?>
<?php else: ?>
<div class="card w-50 mx-auto" >
    <div class="card-body">
        <form action="UpdateInf.php" method="post" class="was-validated" enctype="multipart/form-data">
            <div class="form-group">
                <label for="NewName">NewName</label>
                <input type="text" name="newname" class="form-control my-2" required> 
            </div>
            <div class="custom-file">
                <input type="file" name="avatar" class="custom-file-input" id="avatar" required>
                <label class="custom-file-label" for="Avatar">Avatar</label>
            </div>
            <button type="submit" class="btn btn-primary mt-2" >Submit</button>
        </form>
    </div>
</div>
<?php endif; ?>


<?php include("footer.php") ?>