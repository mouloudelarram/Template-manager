<?php
 session_start();
 ?>
<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor\autoload.php';

$servername='localhost';
	$username='root';
	$password='';
	$dbname = "email";
	$conn=mysqli_connect($servername,$username,$password,"$dbname");
	  if(!$conn){
		  
		die('Could not Connect MySql Server:' .mysql_error());
		
		}
    
    if(isset($_POST["envoyer"])){
        

         $recepteur = $_POST["recepteur"];
         $from = $_POST["from"];
         $objet = $_POST["objet"];
         $message = $_POST["message"];
         $password = $_POST["password"];
         $id=$_SESSION['id'];
/* L'envoi d'e-mail pou un personne  */
   if($recepteur!=""){
       /*  Insertion à la table mysql */
    $sql = "INSERT INTO history (iduser,too,fromm,objet,message) VALUES ('$id','$recepteur','$from','$objet','$message')";
    /* envoi  */
    send($from, $recepteur , $password , $objet , $message);
    if (mysqli_query($conn, $sql)) {
        setcookie("sent", "mail bien envoyé!", time()+50);
        header('Location: ../forms-elements.php');
        
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
    
   }

/* L'envoi à l'aide de fichier excel  */
else {
    



         /* Upload fichier excel  */
      $file       = $_FILES['file']['name'];  
      $excel="../csv/".$file;
         
         $f=fopen($excel,"r");
         $rr=array();

         $temp= explode('.',$excel);
         $extension = end($temp);
         /* Checking si le fichier de type csv  */
                if ($extension == "csv"){  
                   
                   $f=fopen($excel,"r");
                $rr=array();
       while(!feof($f)){
          $str=fgets($f);
          $arr=explode(PHP_EOL ,$str);
          $rr=$arr;
       
                if($rr[0]!=""){
                    /* Insertion à la table mysql  */
                $sql = "INSERT INTO history (iduser,too,fromm,objet,message) VALUES ('$id','$rr[0]','$from','$objet','$message')";
               /* Envoi */
                send($from, $rr[0] , $password , $objet , $message);
                
                if (mysqli_query($conn, $sql)) {
                    
                   setcookie("sent", "mail bien envoyé!", time()+1);
                   header('Location: ../forms-elements.php');
                   
                } else {
                   echo "Error: " . $sql . ":-" . mysqli_error($conn);
                }
           }}
          
          
        }
        else {
            setcookie("csv", "Please use a csv file!!!!", time()+50);
            header('Location: ../forms-elements.php');
        }
mysqli_close($conn);
}

    }















/* La fonction de phpmailer  */

    function send($from, $to , $password , $objet , $message){
$mail = new PHPMailer();

$mail -> isSMTP();
$mail -> SMTPAuth = true;
$mail -> SMTPDebug = 2;
$mail -> Host = 'smtp.gmail.com';
$mail -> Username = $from;
$mail -> Password= $password;
$mail -> SMTPSecure= 'tls';
$mail -> Port= 587;


$mail -> From = $from;
$mail -> FromName = '';
$mail -> addReplyTo($from, '');
$mail -> addAddress($to, '');






$mail -> Subject = $objet;
$mail -> isHTML(true);
$mail -> Body = $message;

$mail -> SMTPOptions= array(

'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true,
)



);
if ($mail ->send()){
    echo 'mail sent!';
}
else{ echo "erroooooor!!!!" ;}


}

?>