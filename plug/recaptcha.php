<?php 
  session_start();

  $_SESSION['captcha'] = mt_rand(1000,9999);
  $img = imagecreate(65, 30);
  $font = 'fonts/@El&Font Destroy!.ttf';

  $bg = imagecolorallocate($img,255,255,255);
  $textcolor = imagecolorallocate($img, 0, 0, 0);
  
  imagettftext($img, 23, 0, 3, 30, $textcolor, $font, $_SESSION['captcha']);
  header('content-type:image/jpeg');
  imagejpeg($img);
  imagedestroy($img);

?>



<?php

  $servername ="localhost";
  $username="root";
  $password="";
  $dbname="plug";
  try{
  $conn= new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "verification du code  ok ";
  }
  catch(PDOexception $e){
    echo "erreur de verification:" . $e->getMessage() ;
  }
  if (isset($_POST['submit'])) {
    $one = $_POST['one'];
    $two = $_POST['two'];
    $tree = $_POST['tree'];
    $sql = ("INSERT INTO `pcs`( `one`, `two`,`tree`) VALUES(:one,:two,:tree)");
    $stmt = $conn->prepare($sql);
    $stmt->bindparam('one',$one);
    $stmt->bindparam('two',$two);
    $stmt->bindparam('tree',$tree);
    $stmt->execute();
  }
?>
