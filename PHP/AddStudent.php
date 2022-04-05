<!DOCTYPE html>

<html lang="en">
    <head>
     
    <link rel="stylesheet" href="style5.css">
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
        require_once("dbClass.php"); //קישור למחלקה של DATABASE
        $db=new dbClass();
         //קבלת פרטים
        $id=$_POST['id']??'0';
        $firstname=$_POST['firstname']??'unknown';
        $lastname=$_POST['lastname']??'unknown';
        $citycode=$_POST['citycode']??'0';
        $carcode=$_POST['carcode']??'0';
        $username=$_POST['username']??'unknown';
        $password=$_POST['password']??'unknown';


		if($id!=0)//בדיקה שהכניסו תעודת זהות
        if($db->checkEmployee($id)){//בדיקה אם לא קיים כזה תעודת זהות
        if($db->CheckUserName($username)){//בדיקה אם לא קיים כזה שם משתמש
         //עדכון פרטי הסטודנט
        $person=new Persons();
        $person->setid($id);
        $person->setfirstName($firstname);
        $person->setlastName($lastname);
        $person->setcityCode($citycode);
        $person->setcarcode($carcode);
        $person->setusername($username);
        $person->setuserPassword($password);
         //הוספת נתונתים לDATABASE
        $db->Insertfun($person);
		echo "<div class='not'>AddStutend was successful</div>";
        }else
		echo "<div class='not'>This username exists</div>";
    }
		else
		echo "<div class='not'>This id exists</div>";
		

        $db=null;
        ?>
     <!--פורום -->
            <form method="post" >
               
            id:<br> <input type="number" min='1' name='id' required><br>
            firstName: <input type="text" name='firstname'required><br>
            lastName: <input type="text" name='lastname'required><br>
            username:  <input type="text" name='username'required><br>
            Password: <input type="password"  name='password'required><br>
			 Citycode: <input type="number"  min='1' max='5' name='citycode'required><br>
            Carcode: <input type="number" min='1' max='5' name='carcode'required><br>
            <button type="submit" value='Submit'> Add Student</button >
        </form>
        <p> City code :<br> 1-Haifa,2-Tel-Aviv,3-Jeruslam,4-Eilat,5-Zfat. <br>Car Code :<br> 1-Honda,2-Mazda,3-Suzuki,4-Hyundai,5-Kia. </p>
        
    </body>

</html>
