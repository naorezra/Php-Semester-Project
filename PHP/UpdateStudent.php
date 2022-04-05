<!DOCTYPE html>

<html lang="en">

<link rel="stylesheet" href="style5.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
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
       require_once("dbClass.php"); //קישור לDATABASE

       $db=new dbClass();
       $person=new Persons();
       $id=$_POST['id']??"";//קבלת ת.ז בPOST
       $username=$_POST['username']??"";//קבלת שם משתמש לעדכון בPOST
       if($id!=""){ //בדיקה אם הכניסו תעודת זהות
	    if(!($db->checkEmployee($id))){//בדיקה אם יש תעודת זהות כזאת
       if($db->CheckUserName($username)){//בדיקה אם לא  קיים שם משתמש כזה
            $person->setusername($username);//עדכון שם מתמש
        $db->update($id,$username);//מעדכנת שם משתמש בבסיס נתונים
     echo "<div class='not'>Update Succses</div>";
    }else echo "<div class='not'>This username exists</div>";
    }else echo "<div class='not'>This id Not exists</div>";
}
    $db=null;
    ?>
    <!--פורום -->
    <form class="t"  method="post">
  <br>
    id: <br> <input type="number" min='1' name='id'required><br><br>
           Username to update: <input type="text" name='username'required><br>
<button name="update"  type="submit"  value="Update">Update</button ></form>
</form>
</body>

</html>