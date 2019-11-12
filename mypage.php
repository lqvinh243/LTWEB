<?php 
    require_once "init.php";
?>

<?php include "header.php" ?>
<?php 
if(isset($_POST["Status"])):
    $Status = $_POST["Status"];
    $IDInsser = createPost($user["ID"],$Status);

    if($IDInsser):
        ob_start();
        header('Location: mypage.php');     
        ob_end_flush();
    else:
?>
<h1>err</h1>
<?php endif; ?>
<?php endif; ?>
<?php if($user): ?>
<h1 class="text-center">Trang cá nhân của <?php echo $user['Name'] ?></h1>
<div class="row" style="width:100%;position:relative;height:20rem">
    <form action="index.php" method="post" class="mx-auto" style="width:65%;height:10%">
        <div class="form-group"><textarea placeholder="Bạn đang nghĩ gì?" name="Status" id="Tus" cols="20" rows="10" class="form-control" style="height:10rem"></textarea></div>
        <div class="form-group"><input type="submit" class="btn btn-primary mx-auto d-block w-75"></button></div>   
    </form>
</div>

<?php 
    $rows = getPostsMe($user["ID"]);
    foreach($rows as $p):
        $Datepost= new DateTime($p["Date"]);
        $Datenow = new Datetime();  
        $res = CalculatedTime($Datepost,$Datenow);
?>
    <div class="card mx-auto my-2 w-50" style="width:60%!important">
        <div class="card h-100">
            <div class="card-body h-50">
                <div class="row ">
                    <div class="col-md-4">
                        <img  class="img-thumbnail"  src="<?php echo 'uploads/image/'.$p['Image']; ?>"alt="">
                    </div>     
                    <div class="col-md-8">
                        <p class="list-inline-item font-weight-bold mb-0">
                            <?php if($user["ID"] == $p["IDuser"]) echo "Tôi";
                                  else echo $p["Name"]; ?>                  
                        </p>
                        <p class="mb-0" style="font-size:0.8rem">
                        <?php 
                        echo $res;
                        ?>
                         </p>
                        <p class="text-wrap overflow-hidden"><?php  echo $p["Status"]?></p>
                    </div>
                </div>
                
            </div>
        </div>
    <?php if($p['Imagepost'] != ''): ?>
        <div class="card">
            <div class="card-img">
            <img  src="<?php echo 'uploads/imgpost/'.$p['Imagepost']; ?>" alt="">
            </div>
        </div>
    <?php endif; ?>
    </div>
    <?php endforeach; ?>
<?php endif; ?>
<?php include "footer.php" ?>