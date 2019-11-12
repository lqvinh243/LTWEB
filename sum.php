<?php 
    require_once "init.php";

    if(!$user){
        header('Location: index.php');
    }
?>

<?php include "header.php" ?>

        <div class="card my-4 w-50 mx-auto text-center">
            <div class="card-body">
                <div class="card-header">
                    <h3>Chương trình tính tổng 2 số</h3>
                </div>
                <div class="row ">
                    <?php if(isset($_POST['number1']) && isset($_POST['number2'])){
                    ?>
                    <div class="card-body w-50">
                        <h5><?php echo $_POST['number1'].'+'.$_POST['number2']; ?></h5>
                        <h5>Kết quả là : <?php echo sum($_POST['number1'],$_POST['number2']); ?> </h5>
                    </div>
                    <?php 
                    }
                        else {
                     ?>
                    <form action="sum.php" method="post" class="mx-auto">
                        <div class="form-group">
                            <label for="Number1">Nhập số thứ nhất</label>
                            <input class="form-control" type="number" name="number1" placeholder="Enter number one" required>
                        </div>
                        <div class="form-group">
                            <label for="Number2">Nhập số thứ hai</label>
                            <input class="form-control" type="number" name="number2" placeholder="Enter number two" required>
                        </div>
                        <button type="submit" class="btn btn-primary d-block">Kết quả</button>
                    </form>
                        <?php }?>
                    
                </div>
            </div>  
        </div>
    


<?php include "footer.php" ?>