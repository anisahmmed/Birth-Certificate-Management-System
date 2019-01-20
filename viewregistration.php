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
     <a href="searchbirth.php">Birth Data </a>
      <a href="searchparents.php">Parents Data</a>
      <a href="searchpersonal.php">Personal Data</a>
    <a href="searchaddress.php">Address Data</a>
    <a href="searchregistration.php">Registration Data</a>
    
    </div>
  </li>
  <li><a href="report.php">Report</a></li>
  </ul>
  <article class="article">
<h1 style="text-align:center;background-color:#719a71; width: 100%;">Registration Information</h1>

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

    $sql = "SELECT * FROM tb_registration";

    $result = $conn->query($sql);
    echo"<table align=center><tr><th>Birth ID</th><th>Registration Book No</th><th>Registration Date</th><th>Registration No</th><th>Edit</th><th>Delete</th><th>Print</th></tr>";

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        // HERE EVERY TABLE DATA WILL CONTAIN DIFFRENT ID TO PRINT
        echo "<tr><td id='a".$row['birth_id']."'>".$row['birth_id']."</td><td id='b".$row['birth_id']."'>".$row['regis_book_no']."</td>";
        echo "<td id='c".$row['birth_id']."'>".$row['regis_date']."</td><td id='d".$row['birth_id']."'>".$row['regis_no']."</td>";


        // EDIT BUTTON CREATION
        echo "<td><form action='' method='GET'><input type='submit' name=".$row['birth_id']." value='Edit'></form></td>";
        // DELETE BUTTON CREATION
        echo "<td><form action='' method='GET'><input type='submit' name='delete".$row['birth_id']."' value='Delete'></form></td>";
        // PDF BUTTON CREATION
        echo "<td><form action='' method='GET'><input type='submit' name='print".$row['birth_id']."' value='Print'></form></td></tr>";

        // UPDATE CODE STARTS FROM HERE
        if(isset($_GET[$row['birth_id']])){
          echo"<form action='' method='POST'><div class='p' id='close'>";// CLASS P IS USED TO DECORATION AND ID CLOSE IS USED TO CLOSE THE POPUP PAGE
          echo"<center><h3>Update Information</h3>";
          echo "Birth Id: <input type='text' name='birth_id' value=".$row['birth_id'].">";
          echo "</br></br>";
          echo "Registration Book No: <input type='text' name='regis_book_no' value=".$row['regis_book_no'].">";
          echo "</br></br>";
          echo "Registration Date: <input type='text' name='regis_date' value=".$row['regis_date'].">";
          echo "</br></br>";
          echo "Registration No: <input type='text' name='regis_no' value=".$row['regis_no'].">";
          echo "</br></br>";
          echo "</br>";

          echo"<center><input type='submit' name = 'submit' value='Update'>";
          echo"<input type='submit' name = 'cancle' value='Cancle'></center>";
          echo "</div></form>";
		  echo "</br>";

          if(isset($_POST['submit'])){
            $birth_id = $_POST["birth_id"];
            $regis_book_no = $_POST["regis_book_no"];
            $regis_date = $_POST["regis_date"];
            $regis_no = $_POST["regis_no"];

            $ssql = "UPDATE tb_registration SET birth_id='$birth_id', regis_book_no='$regis_book_no', regis_date='$regis_date', regis_no='$regis_no', refered_by='$refered_by'
            WHERE birth_id=".$row['birth_id']."";
            
            if ($conn->query($ssql) === TRUE) {
            echo "<script type='text/javascript'>alert('Submitted successfully!')</script>";
            } else {
            echo "Upadate Unsucessful". $conn->error;
            }

          }
          if(isset($_POST['cancle'])){
            echo "<script>document.getElementById('close').style.display='none'</script>";
          }
        }

        // DELETE CODE STARTS FORM HERE
        if(isset($_GET['delete'.$row['birth_id']])){
          $delete = "DELETE FROM tb_registration WHERE birth_id=".$row['birth_id']."";
          if ($conn->query($delete) === TRUE) {
          echo "<script type='text/javascript'>alert('Deleted successfully!')</script>";
          echo "<meta http-equiv='refresh' content='0'>"; // THIS IS FOR AUTO REFRESH CURRENT PAGE
          } else {
          echo "Delete Unsucessful". $conn->error;
          }
        }

        // PDF STARTS FROM HERE
        if(isset($_GET['print'.$row['birth_id']])){

          echo "<script>
          var mywindow = window.open('', 'PRINT', 'height=400,width=600');
					mywindow.document.write('<html><head><title>' + document.title  + '</title>');
					mywindow.document.write('</head><body >');
					mywindow.document.write('<h1 align=center>' + 'Registration Information'  + '</h1>');
					mywindow.document.write('<table align=center border=\"1\">');
					mywindow.document.write('<tr>');
					mywindow.document.write('<th>' + 'Birth Id' + '</th>');
					mywindow.document.write('<th>' + 'Registration Book No' + '</th>');
					mywindow.document.write('<th>' + 'Registration Date' + '</th>');
					mywindow.document.write('<th>' + 'Registration No' + '</th>');
					mywindow.document.write('</tr>');

					mywindow.document.write('<tr>');
					mywindow.document.write('<td>' + document.getElementById('a".$row['birth_id']."').innerHTML + '</td>');
					mywindow.document.write('<td>' + document.getElementById('b".$row['birth_id']."').innerHTML + '</td>');
					mywindow.document.write('<td>' + document.getElementById('c".$row['birth_id']."').innerHTML + '</td>');
					mywindow.document.write('<td>' + document.getElementById('d".$row['birth_id']."').innerHTML + '</td>');

					
					mywindow.document.write('</tr>');
					mywindow.document.write('</table>');
					mywindow.document.write('<p align=center>' + 'Developed by Anis Ahmmed,Id:16103128'  + '</p>');
					
					mywindow.document.write('</body></html>');
					mywindow.document.close(); // necessary for IE >= 10
					mywindow.focus(); // necessary for IE >= 10*/

					mywindow.print();
					mywindow.close();
					history.back(); // IT WILL TAKE YOU BAKE PAGE
					</script>";
        }





      }echo"</table>";
    }else{
        echo "No search found!!!";
    }
  $conn->close();
   ?>
   
  <div id="printableArea" style="opacity:0;display:none;visibility:hidden;">
   <h1 style="text-align:center;">Registration Information</h1>
        <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_birth_certificate";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM tb_registration";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    echo "<table align=center><tr><th>Birth ID</th><th>Registration Book No</th><th>Registration Date</th><th>Registration No</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["birth_id"]."</td><td>".$row["regis_book_no"]."</td><td>".$row["regis_date"]."</td><td>".$row["regis_no"]."</td></tr>";
    }
    echo "</table>";
}
else {
    echo "0 results";
}

mysqli_close($conn);
     ?>
	 <center><p>Powered by Anis Ahmmed, Id:16103128</p></center>
	 </div>
          </br><center><button onclick="printDiv('printableArea')"><b>Print</b></button></center>
		  </br>
<script>
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}</script>  
        
    <section class="footer">
Copyright © 2017 Birth certificate management system. All rights reserved.</br>
<h4>Developed by- Anis Ahmmed</h4>
    </body>
</html>       