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
	
	text-align:center;
	color: #093109;
}
table, th, td {
    border: 1px solid black;
	margin-top:51px;
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
    <h1 style="text-align:center;background-color:#719a71; width: 100%;">Address Information</h1>

<?php
    $con= new mysqli("localhost","root","","db_birth_certificate");
    $bid = $_POST['birth_id'];
    //$query = "SELECT * FROM personal_info
   // WHERE birth_id LIKE '%{$bid}%'";

    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

$result = mysqli_query($con, "SELECT * FROM tb_address
    WHERE birth_id LIKE '%{$bid}%'");
	if ($result->num_rows > 0) {
    echo "<table align=center><tr><th>Birth ID</th><th>Union/Word</th><th>Thana/Upazilla</th><th>District</th></tr>";
    // output data of each row

while ($row = mysqli_fetch_array($result))
{
       
        echo "<tr><td>" . $row["birth_id"]. "</td><td>" . $row["union_word"]."</td><td>".$row["thana_upazilla"]."</td><td>".$row["district"]."</td></tr>";
		
}
 echo "</table>";
}
else {
    echo "0 results";
}
    mysqli_close($con);
    ?>
	</article>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<section class="footer">
Copyright © 2017 Birth certificate management system. All rights reserved.</br>
<h4>Developed by- Anis Ahmmed</h4>
</section>
</body>
</html>
