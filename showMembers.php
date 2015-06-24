<html>
  <head>
    <title>F.I.S.H. - Member List</title>
  </head>
  <body>
    <h1>F.I.S.H. - Member list</h1>
    <p><a href="index.html">Home</a></p>
    <table>
      <tr>
        <th>First Name</th><th>Last Name</th><th>Spouse</th><th>Birthday</th><th>City</th><th>Address</th><th>Postal Code</th><th>Phone</th>
        <th>email</th><th>contact preference</th><th>Occupation</th><th>Bylaws Received</th><th>Payment Type</th><th>rollNumber</th>
        <th>GL Cert</th><th>Initiated Date</th><th>Passed Date</th><th>Raised Date</th><th>Affiliated Date</th><th>Officer Position</th>
      </tr>
      <?php


        $db = new mysqli('localhost', 'kl365', 'x3!17a', 'fish');

        if(mysqli_connect_errno())
        {
        	echo "ERROR: could not connect to database <br />";
        	echo "<strong>" . $db->error . "</strong><br />";
        	exit;
        }

        echo "<!--connected-->";

        $query = 'SELECT * FROM members';

        $result = $db->query($query);

        if($result)
        {

          $numMembers = $result->num_rows;

          for($i = 0; $i < $numMembers; $i++)
          {  
          	$row = $result->fetch_assoc();
        	echo "<tr>";
        	echo "<td>" . $row['firstName'] . "</td>";
        	echo "<td>" . $row['lastName'] . "</td>";
        	echo "<td>" . $row['spouse']. "</td>";
            echo "<td>" . $row['birthday'] . "</td>";
        	echo "<td>" . $row['city']. "</td>";
        	echo "<td>" . $row['address']. "</td>";
        	echo "<td>" . $row['postalCode']. "</td>";
        	echo "<td>" . $row['phoneNumber']. "</td>";
        	echo "<td>" . $row['email']. "</td>";
        	echo "<td>" . $row['contactPreference']. "</td>";
            echo "<td>" . $row['occupation'] . "</td>";
        	echo "<td>" . $row['bylawsReceived']. "</td>";
        	echo "<td>" . $row['paymentType']. "</td>";
        	echo "<td>" . $row['rollNumber']. "</td>";
        	echo "<td>" . $row['glCertNumber']. "</td>";
        	echo "<td>" . $row['initiatedDate']. "</td>";
        	echo "<td>" . $row['passedDate']. "</td>";
        	echo "<td>" . $row['raisedDate']. "</td>";
        	echo "<td>" . $row['affiliatedDate']. "</td>";
        	echo "<td>" . $row['highestPosition']. "</td>";
        	echo "</tr>";
	      }
        }
        else
        {
        	echo "ERROR: Could not retrieve results<br />";
        	echo "<strong>" . $db->error . "</strong>";
        }
      ?>
    </table>
  </body>
</html>

   