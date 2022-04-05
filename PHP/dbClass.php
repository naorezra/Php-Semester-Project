<?php
//מחלקות מצורפות
require_once "City.php";
require_once "Persons.php"; 
require_once "Cars.php";

class dbClass{
    //תכונות
    private $connection;
    private $host;
    private $db;
    private $charset;
    private $user;
    private $pass;
    private $opt=array(
        PDO::ATTR_ERRMODE    =>PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
    );
    public function __construct(string $host="localhost",string $db="students",
    string $charset="utf8", string $user="root",string $pass="")//פעולה בונה עדכון פרטי בסיס נתונים
    {
        $this->host=$host;
        $this->db=$db;
        $this->charset=$charset;
        $this->user=$user;
        $this->pass=$pass;
    }
    private function connect()//התחברות לבסיס נתונים
    {
        $dns="mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $this->connection=new PDO($dns,$this->user,$this->pass,$this->opt);
    }
    public function disconnect()// התנתקות מבסיס נתונים
   {
    $this->connction=null;
   }
   //בדיקת סיסמא נכונה לפי שם משתמש
   public function Login(string $username,string $password):int
   {
    $this->connect();
    $statement=$this->connection->prepare("SELECT  `userPassword` FROM `persons` WHERE username =:username ");
    $statement->execute([':username'=>$username]);
	
    $result=$statement->fetchObject('Persons');    
    $this->disconnect();
    $test_password=$result->getuserPassword();
    if(password_verify($password,$test_password)) return 1;
      else return 0;
   }
   //הוספת סטודנט 
  public function  Insertfun(Persons $person)
  {
    $this->connect();
    $statement = $this->connection->prepare("INSERT INTO persons(id,firstName,lastName,cityCode,carCode,username,userPassword)
     VALUES (:id,:firstName,:lastName,:cityCode,:carCode,
    :username,:userPassword)");
   $arr=[':id'=>$person->getid(),
    ':firstName'=>$person->getfirstName(),
    ':lastName'=>$person->getlastName(),
    ':cityCode'=>$person->getcityCode(),
    ':carCode'=>$person->getcarcode(),
    ':username'=>$person->getusername(),
    ':userPassword'=>$person->getuserPassword(),
    ];

    $statement->execute($arr);
    $this->disconnect();
  }
  //מחיקת סטודנט לפי מספר תעודת זהות
  public function delete(int $id):int 
  {
    $this->connect();
    $statement = $this->connection->prepare(" DELETE FROM `persons` WHERE id=:id");
    $statement->execute([':id'=>$id]);
    $this->disconnect();
      return 1;
  }
  //עדכון שם משתמש של סטודנט לפי תעודת זהות
  public function update(int $id,string $username):int
  {
    $this->connect();
    $statement = $this->connection->prepare("UPDATE persons SET username=:username  WHERE id=:id");
     $statement->execute([':username'=>$username,':id'=>$id]);
     $this->disconnect();
     return 1;
   
  }
  // פונק' למשיכת פרטים של משתמש לפי תעודת זהות
 public function getPerson($id)
{
if($id==null)
	return 0;//בדיקת קלט אם לא מכניסים כלום
$this->connect();
$PersonArray = array();
$result = $this->connection->query("SELECT city.cityName , persons.* , cars.carName
FROM city, persons,cars
WHERE persons.cityCode = city.cityCode
AND persons.id=$id AND persons.carCode=cars.carCode");
while($row = $result->fetch(PDO::FETCH_ASSOC)) {//הכנסת פרטים 
	$PersonArray[] = $row;
}
if($PersonArray==null)// בדיקת קלט אם לא קיים 
	return 0;

$this->disconnect();
return $PersonArray;
}
//פונק' לבדיקה אם תעודת זהות קיימת במערכת
 public function CheckEmployee($id){

        $this->connect();
        $statement = $this->connection->prepare("SELECT * FROM persons WHERE id = :id");
        $statement->execute([':id'=>$id]);
        $result=$statement->fetch(PDO::FETCH_ASSOC);
        $this->disconnect();
        if(!$result)
            return 1;
        else
            return 0; 
    }

// פונק' לבדיקה אם שם משתמש קיים במערכת
 public function CheckUserName($username){

        $this->connect();
        $statement = $this->connection->prepare("SELECT * FROM persons WHERE username = :username");
        $statement->execute([':username'=>$username]);
        $result=$statement->fetch(PDO::FETCH_ASSOC);
        $this->disconnect();
        if(!$result)
            return 1;
        else
            return 0; 
    }





}
?>