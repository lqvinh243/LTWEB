<?php   

function sum($a, $b) {
    $c = $a + $b;
    return $c;
}

function FindUserbyEmail($email){
    global $db;
    $query = $db->prepare("SELECT * from users where Email = ?");
    $query->execute(array($email));
    return $query->fetch(PDO::FETCH_ASSOC);
}

function FindUserbyId($id){
    global $db;
    $query = $db->prepare("Select * from users where ID = ?");
    $query->execute(array($id));
    return $query->fetch(PDO::FETCH_ASSOC);
}

function CreateUser($Name,$Email,$Password){
    global $db;
    $query = $db->prepare("INSERT INTO users (Name,Email,Password,Image) values (?,?,?,?)");
    $HashPassWord = password_hash($Password,PASSWORD_DEFAULT);
    $query->execute(array($Name,$Email,$HashPassWord,"anh-dai-dien-FB-200.jpg"));
    return $db->LastInsertId();
}

function ChangePass($id,$newpass){
    global $db;
    $query = $db->prepare("UPDATE users SET Password = ? WHERE ID = ?");
    return $query->execute(array(password_hash($newpass,PASSWORD_DEFAULT),$id));
}


function UpdateInf($id,$newname,$img){
    global $db;
    $query = $db->prepare("UPDATE Users SET Name = ?, Image = ? WHERE ID = ?");
    return $query->execute(array($newname,$img,$id));
}

function resizeImage($filename, $max_width, $max_height)
{
  list($orig_width, $orig_height) = getimagesize($filename);

  $width = $orig_width;
  $height = $orig_height;

  # taller
  if ($height > $max_height) {
      $width = ($max_height / $height) * $width;
      $height = $max_height;
  }

  # wider
  if ($width > $max_width) {
      $height = ($max_width / $width) * $height;
      $width = $max_width;
  }

  $image_p = imagecreatetruecolor($width, $height);

  $image = imagecreatefromjpeg($filename);

  imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);

  return $image_p;
}

function getPosts(){
    global $db;
    $query = $db->query("SELECT * FROM posts as  p join users as u on u.ID = p.IDuser order by p.Date DESC");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getPostsMe($id){
    global $db;
    $query = $db->prepare("SELECT * FROM posts as  p join users as u on u.ID = p.IDuser where u.ID = ? order by p.Date DESC");
    $query->execute(array($id));
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function createPost($idus,$Status){
    global $db;
    $query = $db->prepare("INSERT INTO posts (Status,IDuser,Date) values (?,?,?)");
    date_default_timezone_set("Asia/Bangkok");
    $p = date('Y-m-d H:i:s'); 
    echo $p;
    $query->execute(array($Status,$idus,$p));
    return $db->LastInsertId();
}

function getconvertTime($time){
    return $time>9?$time:"0".$time;
}

function CalculatedTime($timepost, $timenow){
        $diff = $timepost->diff($timenow);
        $result ="";
        $year = getconvertTime($diff->y);
        $month = getconvertTime($diff->m);
        $day = getconvertTime($diff->d);
        $hour = getconvertTime($diff->h);
        $minutes = getconvertTime($diff->i);
        $second = getconvertTime($diff->s);
        if($year == "00" && $month == "00" && $day == "00"){
            if($hour == "00"){
                $result .=$minutes=="00"?"Vừa xong":$minutes." phút ago";
            }
            else $result .= $hour." giờ ".$minutes." phút ago";
        }
        else{ 
            $result .= $timepost->format("h")." giờ ";
            $result .= $timepost->format("i") !="00"?$timepost->format("i"):"";
            $result .= $timepost->format("A")." ".$timepost->format('d')."/".$timepost->format('m');
            $result .= $timepost->format("Y") != $timepost->format("Y")?"/".$timepost->format("Y"):"";
        }
        return $result;
}
?>

