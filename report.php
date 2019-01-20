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
table, th, td {
    border: 1px solid black;
}
.footer{
	
	text-align:center;
	color:#093109;
}
.anis{
	border:10px solid black;
	height:700px;
	width:700px;
	align:center;
}
.a{
	float:left;
	padding-left:25px;
}
.b{
	float:right;
	padding-right:80px;
}
.c{
	
	padding-right:250px;
}
.d{
	padding-right:110px;
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
  <article class="article">
  </br>
		

<form method="post" action="">
<table align=center>
       <tr>
           <td>Search By Birth Id :</td>
           <td><input type="number" name="birth_id" value=""></td>
       </tr>
	    <td></td>
           <td><input type="submit" name="submit" value="Search" value=""></td>
       </tr>
    </table>
	</form>
	</br>
									
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "db_birth_certificate";
	// Create connection
	$conn = new mysqli($servername, $username, $password,$dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	//echo "Connected successfully\n";
	 if(isset($_POST['submit'])){
	 $bid = $_POST['birth_id'];

		$sql = "SELECT tb_registration.regis_book_no,tb_registration.regis_date,tb_registration.regis_no, birth_info.birth_id,personal_info.name,birth_info.birth_date,personal_info.gender,birth_info.birth_place, tb_address.union_word,tb_address.thana_upazilla,tb_address.district,parent_info.father_name,parent_info.father_nationality, parent_info.mother_name,parent_info.mother_nationality from tb_registration inner join birth_info on tb_registration.arg=birth_info.arg inner join personal_info on tb_registration.arg=personal_info.arg inner join parent_info on tb_registration.arg=parent_info.arg inner join tb_address on tb_registration.arg=tb_address.arg where tb_registration.birth_id='$bid'";
		
	 
		$result = $conn->query($sql);
		//echo"<table align=center><tr><th>Product id</th><th>Product name</th><th>Description</th><th>Supplyer</th><th>price</th><th>Category</th><th>Action</th><th>Action</th><th>Action</th></tr>";

		if ($result->num_rows > 0) {
		

		//$row = $result->fetch_assoc() ?>
		
		     <?php  while ($row = $result->fetch_assoc())
				 
				 {
				
					 ?>
				
						<div id="printableArea">
						<center><div class="anis" >					
						<center><h2> People's Republic of Bangladesh</h2><h4>Office of the Registrar of Birth and Death</br>Gazipur Union Gazipur</br>Sreepur,Gazipur,Bangladesh<br><h2>Birth Certificate </h4></center>
													
												
												
												<div class="a" ><tr><td>Registration Book No</td> <td>:</td><td> <?php echo $row['regis_book_no'];?></td></tr></div>
												</br></br>
												<div class="a"><tr><td>Registration Date</td> <td>:</td><td> <?php echo $row['regis_date'];?></td></tr></div>
												</br></br>
												<div class="a"><tr><td>Registration No</td> <td>:</td><td> <?php echo $row['regis_no'];?></td></tr></div>
												</br></br>
												<div class="a"><tr><td>Birth Id</td> <td>:</td><td> <?php echo $row['birth_id'];?></td></tr></div>
												</br></br>
												<div class="a"><tr><td>Name </td> <td>:</td><td> <?php echo $row['name'];?> </td></tr></div>
												</br></br>
											
												<div class="a"><tr><td>Date of Birth</td> <td>:</td><td>  <?php echo $row['birth_date'];?> </td></tr></div>
												</br></br>
												
												<div class="a"><tr><td>Gender</td> <td>:</td><td> <?php echo $row['gender'];?></td></tr></div>
												
												
												<div class="b"><tr><td>Birth Place</td> <td>:</td><td> <?php echo $row['birth_place'];?></td></tr></div>
												
												<div class="b"><tr><td>Union/Word</td> <td>:</td><td> <?php echo $row['union_word'];?></td></tr></div>
												</br>
												
												<div class="b"><tr><td>Thana/Upazilla</td> <td>:</td><td> <?php echo $row['thana_upazilla'];?></td><tr></div>
												
												<div class="b"><tr><td>District</td><td>:</td><td> <?php echo $row['district'];?></td></tr></div>
												</br></br>
												
												<div class="a"><tr><td>Father Name</td><td>:</td><td> <?php echo $row['father_name'];?></td></tr></div>
												
												
												<div class="b"><tr><td>Father Nationality</td><td>:</td><td> <?php echo $row['father_nationality'];?></td></tr></div>
												</br></br>
												
												<div class="a"><tr><td>Mother Name</td><td>:</td><td> <?php echo $row['mother_name'];?></td></tr></div>
												
												<div class="b"><tr><td>Mother Nationality</td><td>:</td><td> <?php echo $row['mother_nationality'];?></td></tr></div>
												</br></br></br></br></br></br></br>
												<div class="a"><tr><td><h4> Signature & Seal of the UP Secretary</div><td> </td><div class="b"><h4>Signature, Name & Seal of the Registrar</h4></td></tr></div>
												
												
										</div></center>
										<center><p>Developed by Friends Group</p></center>
										</div>
			<h3 align="center"></h3><center><input type="button" onclick="printDiv('printableArea')" value="Print!" /></center>
			<script>
			function printDiv(divName) {
				var printContents = document.getElementById(divName).innerHTML;
				var originalContents = document.body.innerHTML;
				document.body.innerHTML = printContents;
				window.print();
				document.body.innerHTML = originalContents;
			}</script>
				
				 <?php }}}?>	
</br>
<section class="footer">
Copyright © 2017 Birth certificate management system. All rights reserved.</br>
<h4>Developed by- Friends Group</h4>
</section>


</body>
</html>