<!DOCTYPE html>

<html lang="en">

<link rel="stylesheet" href="style5.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>School</title>
</head>
<body>
   <header>
      <nav>
        <ul>
		  <li> <a href="School.php"> Our School </a></li>
          <li> <a href="AddStudent.php"> Add Student </a></li>
          <li> <a href="ShowStudent.php"> Show Student </a> </li>
          <li> <a href="DeleteStudent.php"> Delete Student </a> </li>
          <li> <a href="UpdateStudent.php"> Update UserName </a> </li>
           <li> <a href="Login.php">Log out</a> </li>
        </ul>
      </nav>
    </header>
</form>
<?php
   require_once("dbClass.php"); //מחלקה שמקשרת ל בסיסי נתונים
   $db=new dbClass();
   $id=$_POST['id']??""; //קבלת תעודת זהות בPOST
   if($id!=""){//בדיקה שהכניסו תעודת זהות
   if(!($db->checkEmployee($id))){//בדיקה אם קיים תז זהות כזאת בבסיס נתונים
   $db->delete($id);  //פונק' למחיקה מבסיס נתונים לפי תעודת זהות
	echo "<div class='not'>The Delete was successful</div>";
   }else echo "<div class='not'>This id Not exists</div>";
   }
$db=null;
?>
<body>
       <!-פורום -->
    <form class="t1" method="post"><br>
            Id of student to delete:<input type="text" name="id"  required >
           <button type="submit"  >Delete Student</button>
</form>
</body>

</html>