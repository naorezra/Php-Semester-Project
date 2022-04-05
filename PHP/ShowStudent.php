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
       require_once("dbClass.php");//קישור למחלקה של DATABASE
       $db=new dbClass();
      
       $id=$_POST['id']??"";//הכנסת פרטים בפוסט
			
    if($id!=""){ //בדיקה שהכניסו תעודת זהות
      if(!($db->checkEmployee($id)))//בדיקה שקיים תז בבסיס נתונים 
       {
        $result=$db->getPerson($id);//בקשה לפרטים מבסיס נתונים לפי תעודת זהות
    foreach ((array)$result as $value) {// לולאה לעבור על המערך והדפסת הפרטים שהתקבלו
	
       echo "<div>Id: ".$value['id']. "<br>UserName: ".$value['username']."<br>FirstName: ".$value['firstName']."<br>LastName: ".$value['lastName']."<br>City: ".$value['cityName']."<br>Car: ".$value['carName']."</div>";
}
    }else echo "<div class='not'>User NOT Exist</div>";
}
	   ?>
    <!--פורום-->
    <form class="t" method="post">
    Enter id to show student details<br><br>
    id: <br> <input type="number"  name='id' required><br><br>
          
<button  type="submit"  value="Show">Show</button></form>
</form>
</body>

</html>