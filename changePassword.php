<?php 
    require_once "init.php";
?>

<?php include "header.php" ?>
<?php if(isset($_POST['currentpass']) && isset($_POST['newpassword'])&& isset($_POST['renewpassword'])):{
        $curpass = $_POST['currentpass'];
        $newpass = $_POST['newpassword'];
        $check = null;      
        var_dump($check);
        echo "B";
}
?>
    <?php
        if(password_verify($curpass,$user['Password']))
            $check = ChangePass($user['ID'],$newpass);
            var_dump($check);
        if($check):
    ?>
        <div class="card bg-primary m-2">
            <h5>Change password succcess</h5>
        </div>
    <?php else: ?>
        <div class="card bg-danger m-2">
            <h5>Change password faild,current password does not match!</h5>
        </div>
    <?php endif; ?>
<?php else: ?>
<div class="card my-4 p-4 w-50 mx-auto">
    <form method="post" action="changePassword.php">
        <div class="form-group">
            <label for="currentpass">current-password</label>
            <input name="currentpass" type="password" class="form-control" id="currentpass" placeholder="Enter-currentassword" required>
        </div>
        <div class="form-group">
            <label for="newpassword">new-password</label>
            <input name="newpassword" type="password" class="form-control" id="newpassword" placeholder="enter new-password" required>
        </div>
        <div class="form-group">
            <label for="newpassword">Retype-newPassword</label>
            <input name="renewpassword" type="password" class="form-control" id="retypepassword" placeholder="enter retype new-password" required>
            <span id="mess"></span>
        </div>
        <button type="submit" id="btn" class="btn btn-primary" disabled>Submit</button>
    </form>
</div>
    
    <?php endif;?>
<?php include "footer.php" ?>
<script>
        $('#newpassword, #retypepassword').on('keyup',function(){
            if($('#newpassword').val() !== '')
            {
                if($('#newpassword').val() == $('#retypepassword').val()){
                $('#mess').html('Matching').css('color','green');
                $('#btn').attr("disabled",false);
                }
                else{
                    $('#mess').html('Not Matching').css('color','red');
                    $('#btn').attr("disabled",true);
                }
            }
            else{
                $('#mess').html('');
            }
        });
    </script>