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
<h1 style="text-align:center;background-color:#719a71; width: 100%;">Parents Information</h1>

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

    $sql = "SELECT * FROM parent_info";

    $result = $conn->query($sql);
    echo"<table align=center><tr><th>Birth ID</th><th>Father Name</th><th>Father National ID</th><th>Father Nationality</th><th>Mother Name</th><th>Mother National ID</th><th>Mother Nationality</th><th>Edit</th><th>Delete</th><th>Print</th></tr>";

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        // HERE EVERY TABLE DATA WILL CONTAIN DIFFRENT ID TO PRINT
        echo "<tr><td id='a".$row['birth_id']."'>".$row['birth_id']."</td><td id='b".$row['birth_id']."'>".$row['father_name']."</td>";
        echo "<td id='c".$row['birth_id']."'>".$row['father_national_id']."</td><td id='d".$row['birth_id']."'>".$row['father_nationality']."</td>";
        echo "<td id='e".$row['birth_id']."'>".$row['mother_name']."</td><td id='f".$row['birth_id']."'>".$row['mother_national_id']."</td>";
        echo "<td id='g".$row['birth_id']."'>".$row['mother_nationality']."</td>";


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
		  echo "</br>";
          echo "Father Name: <input type='text' name='father_name' value=".$row['father_name'].">";
          echo "</br>";
          echo "Father National Id: <input type='text' name='father_national_id' value=".$row['father_national_id'].">";
          echo "</br>";
          echo "Father Nationality: <input type='text' name='father_nationality' value=".$row['father_nationality'].">";
          echo "</br>";
          echo "Mother Name: <input type='text' name='mother_name' value=".$row['mother_name'].">";
		  echo "</br>";
          echo "Mother National Id: <input type='text' name='mother_national_id' value=".$row['mother_national_id'].">";
		  echo"</br>";
          echo "Mother Nationality: <input type='text' name='mother_nationality' value=".$row['mother_nationality']."></center>";
          echo "</br>";
		  
          echo"<center><input type='submit' name = 'submit' value='Update'>";
          echo"<input type='submit' name = 'cancle' value='Cancle'></center>";
          echo "</div></form>";
		  echo "</br>";

          if(isset($_POST['submit'])){
            $birth_id = $_POST["birth_id"];
            $father_name = $_POST["father_name"];
            $father_national_id = $_POST["father_national_id"];
            $father_nationality = $_POST["father_nationality"];
            $mother_name = $_POST["mother_name"];
            $mother_national_id = $_POST["mother_national_id"];
            $mother_nationality = $_POST["mother_nationality"];

            $ssql = "UPDATE parent_info SET birth_id='$birth_id', father_name='$father_name', father_national_id='$father_national_id', father_nationality='$father_nationality',mother_name='$mother_name',mother_national_id='$mother_national_id',mother_nationality='$mother_nationality'
            WHERE birth_id=".$row['birth_id']."";
            
            if ($conn->query($ssql) === TRUE) {
            echo "<script type='text/javascript'>alert('Submitted successfully!')</script>";
			echo "<meta http-equiv='refresh' content='0'>";
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
          $delete = "DELETE FROM parent_info WHERE birth_id=".$row['birth_id']."";
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
					mywindow.document.write('<h1 align=center>' + 'Parents Information'  + '</h1>');
					mywindow.document.write('<table align=center border=\"1\">');
					mywindow.document.write('<tr>');
					mywindow.document.write('<th>' + 'Birth Id' + '</th>');
					mywindow.document.write('<th>' + 'Father Name' + '</th>');
					mywindow.document.write('<th>' + 'Father National Id' + '</th>');
					mywindow.document.write('<th>' + 'Father Nationality' + '</th>');
					mywindow.document.write('<th>' + 'Mother Name' + '</th>');
					mywindow.document.write('<th>' + 'Mother National Id' + '</th>');
					mywindow.document.write('<th>' + 'Mother Nationality' + '</th>');
					mywindow.document.write('</tr>');

					mywindow.document.write('<tr>');
					mywindow.document.write('<td>' + document.getElementById('a".$row['birth_id']."').innerHTML + '</td>');
					mywindow.document.write('<td>' + document.getElementById('b".$row['birth_id']."').innerHTML + '</td>');
					mywindow.document.write('<td>' + document.getElementById('c".$row['birth_id']."').innerHTML + '</td>');
					mywindow.document.write('<td>' + document.getElementById('d".$row['birth_id']."').innerHTML + '</td>');
					mywindow.document.write('<td>' + document.getElementById('e".$row['birth_id']."').innerHTML + '</td>');
					mywindow.document.write('<td>' + document.getElementById('f".$row['birth_id']."').innerHTML + '</td>');
					mywindow.document.write('<td>' + document.getElementById('g".$row['birth_id']."').innerHTML + '</td>');
					
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
   <h1 style="text-align:center;">Parents Information</h1>
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

$sql = "SELECT * FROM parent_info";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    echo "<table align=center><tr><th>Birth ID</th><th>Father Name</th><th>Father National ID</th><th>Father Nationality</th><th>Mother Name</th><th>Mother National ID</th><th>Mother Nationality</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["birth_id"]."</td><td>".$row["father_name"]."</td><td>".$row["father_national_id"]."</td><td>".$row["father_nationality"]."</td><td>".$row["mother_name"]."</td><td>".$row["mother_national_id"]."</td><td>".$row["mother_nationality"]."</td></tr>";
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