<html>
  <head>
    <title>F.I.S.H. - Semi-Annual Report</title>
  </head>
  <body>
    <center><h1>Grand Lodge A.F. & A.M. of Canada in the Province of Ontario</h1></center>    
    <?php

      require_once('config.php');
      $startDate = $_POST['startDate'];
      $endDate = $_POST['endDate'];

      if(!get_magic_quotes_gpc())
      {
      	$startDate = addslashes($startDate);
      	$endDate = addslashes($endDate);
      }

      echo "<p>Semiannual return for the period " . $startDate . " to " . 
            $endDate . "</strong></p>";
      echo "<p>Lodge Name: Golden Star  Lodge No. 484</p>";

      @ $db = new mysqli($host, $user, $password, $database);;

      if(mysqli_connect_errno())
      {
      	echo "Error connected to database: " . $db->error;
      	exit;
      }

      /* Query for Initiated, Passed, Raised in the time frame */
      $query = "SELECT firstName,lastName,birthday,city,address,postalCode,occupation,rollNumber,initiatedDate,passedDate,raisedDate FROM members WHERE " . 
               "initiatedDate >= " . $startDate . " OR " .
               "passedDate >= " . $startDate . " OR " .
               "raisedDate >= " . $startDate . "";

      $result = $db->query($query);

      echo "<table border='1' cellpadding='2' cellspacing='2' width='100%'>";

      if($result)
      {
      	$numRows = $result->num_rows;

      	for($i = 0; $i < $numRows; $i++)
      	{
      		$row = $result->fetch_assoc();
      		echo "<tr>";
      		echo "<td width='10%'><strong>Roll No.</strong><br />" . $row['rollNumber'] . "</td>";
      		echo "<td width='25%'><strong>Surname</strong><br />" . $row['lastName'] . "</td>";
      		echo "<td width='25%'><strong>Given Name in Full</strong><br />" . $row['firstName'] . "</td>";
      		echo "<td><strong>Initiated Date</strong><br />" . $row['initiatedDate'] . "</td>";
      		echo "<td><strong>Passed Date</strong><br />" . $row['passedDate'] . "</td>";
      		echo "<td><strong>Raised Date</strong><br />" . $row['raisedDate'] . "</td>";
      		echo "</tr>";
      		echo "<tr>";
      		echo "<td colspan='3'><strong>Full Address</strong><br />" . 
      		     $row['address'] . ", " . $row['city'] . ", ON " . $row['postalCode'] . "</td>";
      		echo "<td><strong>Date of Birth</strong><br />" . $row['birthday'] . "</td>";
      		echo "<td colspan='2'><strong>Occupation</strong><br /> " . $row['occupation'] . "</td>";
      	}
      }
      else
      {
      	echo "unable to generate report: " . $db->error;
      }

      $query = $query = "SELECT firstName,lastName,birthday,city,address,postalCode,occupation,rollNumber,initiatedDate,passedDate,raisedDate FROM members WHERE " . 
               "initiatedDate >= " . $startDate . " OR " .
               "passedDate >= " . $startDate . " OR " .
               "raisedDate >= " . $startDate . "";

      echo "</table>";

    ?>
  </body>
</html>

