<!DOCTYPE html>
<html>
<head>
<title>Birth Certificate
	</title>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #414420;
}

li {
    float: left;
}

li a {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 18px 45.2px;
    text-decoration: none;
	text-style:normal;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: red;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: white;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
	text-style:normal;
}

.dropdown-content a:hover {background-color: #eaeaea;}

.dropdown:hover .dropdown-content {
    display: block;
}
article {
    margin-left: 0px;
    border-left: 1px solid gray;
    padding: 0em;
    overflow: hidden;
}
.footer{
	height:70px;
	width:100%;
	color:#093109;
text-align:center;
}
</style>
</head>

<body style="background-color:white;">

<center><h1 Style="color:#093109;">Birth Certificate Management System</h1></center>


<ul>
  <li><a href="home.html">Home</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Insert</a>
    <div class="dropdown-content">
    <a href="birth.php">Birth Information</a>
      <a href="parent.php">Parent Information</a>
      <a href="personal.php">Personal Information</a>
    <a href="address.php">Address Information</a>
    <a href="registration.php">Registration Information</a>
    
    </div>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">View</a>
    <div class="dropdown-content">
     <a href="viewbirth.php">Birth Information View </a>
      <a href="viewparents.php">Parents Information View</a>
      <a href="viewpersonal.php">Personal Information View</a>
    <a href="viewaddress.php">Address Information View</a>
    <a href="viewaddress.php">Registration Information View</a>
    
    </div>
  </li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Search</a>
    <div class="dropdown-content">
     <a href="searchbirth.php">Birth Data </a>
      <a href="searchparents.php">Parents Data</a>
      <a href="searchpersonal.php">Personal Data</a>
    <a href="searchaddress.php">Address Data</a>
    <a href="searchaddress.php">Registration Data</a>
    
    </div>
  </li>
  <li><a href="report.php">Report</a></li>
  </ul>
  
 <?php
 if(isset($_POST['submit'])){
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "db_birth_certificate";

$conn = new mysqli($hostname,$username,$password,$dbname);

if($conn->connect_error) {
    die("Connection Fail".$conn->connect_error);
}


$bid= $_POST['bid'];
$regbn = $_POST['regbn'];
$regd = $_POST['regd'];
$regn = $_POST['regn'];



$sql = "INSERT INTO tb_registration( birth_id,regis_book_no, regis_date,regis_no) VALUES('$bid', '$regbn','$regd','$regn' )";
// $dept, $subject, $contact, $email
if ($conn->query($sql) === TRUE) {
    echo "Your Information Saved successfully";
} else {
    if ($birth_id == "" || $regis_book_no == "" || $regis_date == ""|| $regis_no == "" ) {
         echo  "Please input your values! ";
    }else {
         echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
 }
?>

 <div class="pbody">
<center>

</div>
<style>
fieldset{
	margin: auto;
    width: 37%;
    background-color: #e5ecea;
    padding-top: 12px;
    padding-right: 70px;
    padding-bottom: 16px;
    padding-left: 100px;
	margin-bottom: 21px;
	margin-top:21px;
}
</style>
<form action=""method="post">
  <fieldset>
    <h1 style="text-align:center;background-color:#719a71; width: 100%;">Registration Information</h1>
    <h4>Birth Id<br>
    <input type="text" name="bid"  value=""><br><br>
    Registration Book NO<br>
    <input type="text" name="regbn" value=""><br><br>
    Registration Date<br>
    <input type="text" name="regd" value=""><br><br>
    Registration No<br>
    <input type="text" name="regn" value=""><br><br>
    <input type="submit" name="submit" value="Submit">
  </fieldset>
</form>
<section class="footer">
Copyright © 2017 Birth certificate management system. All rights reserved.</br>
<h4>Developed by- Anis Ahmmed</h4>

</section>
</body>
</html>
