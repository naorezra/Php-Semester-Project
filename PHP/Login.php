<!DOCTYPE html>

<html lang="en">
<link rel="stylesheet" href="style5.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login page</title>
</head>
<body>
<?php
require_once("dbClass.php");//קישור לבסיס נתונים
$db=new dbClass();
  $username = $_POST["username"]??'unknown'; //קבלת פרטים שם משתמש וסיסמא בPOST
 $password = $_POST["password"]??"" ;
 if($username!='unknown'){//בדיקה אם הכניסו שם משתמש 
 if(!($db->CheckUserName($username))){//בדיקה אם יש שם משתמש כזה
 if( $password!= ""){//בדיקה אם הכניסו סיסמא
	$res=$db->Login( $username, $password);//בדיקה אם סיסמא נכונה
	if($res==1){  header("Location:School.php"); //אם הסיסמא נכונה עוברים לדף ראשי 
 }else echo "<div class='not'>The Password Not Correct</div>";
}
}else echo "<div class='not'>This UserName  Not exists</div>";}
?>
 <!--פורום-->

<form class="t"   method="post">
<br>
UserName:<input type="text" name="username"required>
Password:<input type="password" name="password"required>
<button type="submit" name="login">Login</button>
</form>
</body>
</html>