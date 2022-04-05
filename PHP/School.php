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
    <h2>
     It’s about our entire school community. It’s about the way our students, teachers, parents, staff and friends come together to create an extended, yet focused “family.” Together, we form a dynamic caring community that steers the individual progress of each student.
<br>
Like any community, people come and go. Surprisingly, given that we’re the American School in London, people come from all over the world and they leave for all corners of the globe. More than 70 nationalities are represented here, creating an exciting mix of personalities, attitudes and cultures.
<br>
Our students are well traveled with a worldly outlook, and through its mission, the School empowers them to thrive as lifelong learners and courageous global citizens by fostering intellect, creativity, inclusivity and character. In fact, despite their exotic itineraries, they often comment that being here is “more fun than vacation.” Our warm, welcoming spirit helps. Whether we’re a comparatively brief stop on a student’s travels or a long-term destin.

</h2>
    <?php
     $res=$_POST['problem']??"";//הוספה הודעה בPOST
	 if($res!=""){//בדיקה אם הכניסו הודעה
		file_put_contents('C:\xampp\htdocs\finalout.txt',$res);//שמירת הודעה בקובץ טקסט
        echo "<div class='not'>we saved your message</div>"  ;}                    
    ?>
    <!--פורום -->
    <form  class='label' action="/Mainfinal.php" method="post">

<label class='label'><br>Send us your review <br></label><br>
<input type='text' name='problem'/><br>
<button type="submit"  >Send</button>

</form>
</body>

</html>