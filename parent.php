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
      <a href="parent.php">Parents Information</a>
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
    <a href="viewregistration.php">Registration Information View</a>
    
    </div>
  </li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Search</a>
    <div class="dropdown-content">
     <a href="searchbirth.php">Birth Information</a>
      <a href="searchparents.php">Parents Information</a>
      <a href="searchpersonal.php">Personal Information</a>
    <a href="searchaddress.php">Address Information</a>
    <a href="searchregistration.php">Registration Information</a>
    
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
$fname= $_POST['fname'];
$fnid = $_POST['fnid'];
$fnlity = $_POST['fnlity'];
$mname = $_POST['mname'];
$mnid = $_POST['mnid'];
$mnlity = $_POST['mnlity'];



$sql = "INSERT INTO parent_info( birth_id,father_name,father_national_id, father_nationality,mother_name,mother_national_id,mother_nationality) VALUES('$bid','$fname', '$fnid','$fnlity','$mname','$mnid','$mnlity' )";
// $dept, $subject, $contact, $email
if ($conn->query($sql) === TRUE) {
    echo "Your Information Saved successfully";
} else {
    if ($birth_id ==""||$father_name == "" || $father_national_id == "" || $father_nationality == ""|| $mother_name == ""|| $mother_national_id == ""|| $mother_nationality == "" ) {
         echo "Please input your values! ";
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
    padding-top: 5px;
    padding-right: 70px;
    padding-bottom: 12px;
    padding-left: 100px;
	margin-bottom: 16px;
	margin-top:16px;
}
</style>
<form action=""method="POST">
  <fieldset>
    <h1 style="text-align:center;background-color:#719a71; width: 100%;">Parents Information</h1>
	<h4>Birth Id<br>
	<input type="text" name="bid" placeholder="Enter Birth Id" value=""><br><br>
    Father Name<br>
    <input type="text" name="fname" placeholder="Enter Father Name" value=""><br><br>
    Father National Id<br>
    <input type="text" name="fnid" placeholder="Enter National Id" value=""><br><br>
    Father Nationality<br>
    <input type="text" name="fnlity" placeholder="Enter Nationality" value=""><br><br>
	Mother Name<br>
    <input type="text" name="mname" placeholder="Enter Mother Name" value=""><br><br>
	mother national id<br>
    <input type="text" name="mnid" placeholder="Enter National Id" value=""><br><br>
    Mother Nationality<br>
    <input type="text" name="mnlity" placeholder="Enter Nationality" value=""><br><br>
    <input type="submit" name="submit" value="Submit">
  </fieldset>
</form>
<section class="footer">
Copyright © 2017 Birth certificate management system. All rights reserved.
<h4>Developed by- Anis Ahmmed</h4>


</section>
</body>
</html>
