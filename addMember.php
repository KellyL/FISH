<html>
  <head>
    <title>F.I.S.H. - Add Member Results</title>
  </head>
  <body>
<?php

  /* Process Form Variables */
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $spouse = $_POST['spouseName'];
  $birthday = $_POST['birthday'];
  $city = $_POST['city'];
  $address = $_POST['address'];
  $postalCode = $_POST['postalCode'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $contactPref = $_POST['contactPreference'];
  $occupation = $_POST['occupation'];
  $bylawsReceived = $_POST['bylawsReceived'];
  $paymentType = $_POST['paymentType'];
  $rollNumber = $_POST['rollNumber'];
  $glCertNumber = $_POST['glCertNumber'];
  $initiatedDate = $_POST['initiatedDate'];
  $passedDate = $_POST['passedDate'];
  $raisedDate = $_POST['raisedDate'];
  $affiliatedDate = $_POST['affiliatedDate'];
  $maxOfficerPos = $_POST['maxOfficerPos'];

  /* Check for required fields */
  if(!$firstName || !$lastName || !$initiatedDate)
  {
  	echo "ERROR: Missing required fields<br />";
  	echo "Required: First Name, Last Name, Initiated Date<br />";
  }
  
  /*DEBUG
  echo "Data Received:<br />";
  echo $firstName . "<br />";
  echo $lastName . "<br />";
  echo $spouse . "<br />";
  echo $city . "<br />";
  echo $address . "<br />";
  echo $postalCode . "<br />";
  echo $phone . "<br />";
  echo $email . "<br />";
  echo $contactPref . "<br />";
  echo $bylawsReceived . "<br />";
  echo $paymentType . "<br />";
  echo $rollNumber . "<br />";
  echo $glCertNumber . "<br />";
  echo $initiatedDate . "<br />";
  echo $passedDate . "<br />";
  echo $raisedDate . "<br />";
  echo $affiliatedDate . "<br />";
  echo $maxOfficerPos . "<br />";
  */

  /* clean up input */
  if(!get_magic_quotes_gpc())
  {
  	$firstName = addslashes($firstName);
  	$lastName = addslashes($lastName);
  	$spouse = addslashes($spouse);
    $birthday = addslashes($birthday);
  	$city = addslashes($city);
  	$address = addslashes($address);
  	$postalCode = addslashes($postalCode);
  	$phone = addslashes($phone);
  	$email = addslashes($email);
  	$contactPref = addslashes($contactPref);
    $occupation = addslashes($occupation);
  	$bylawsReceived = addslashes($bylawsReceived);
  	$paymentType = addslashes($paymentType);
  	$rollNumber = addslashes($rollNumber);
  	$glCertNumber = addslashes($glCertNumber);
  	$initiatedDate = addslashes($initiatedDate);
  	$raisedDate = addslashes($raisedDate);
  	$passedDate = addslashes($passedDate);
  	$affiliatedDate = addslashes($affiliatedDate);
  	$maxOfficerPos = addslashes($maxOfficerPos);
  }
  
  @ $db = new mysqli('localhost', 'kl365', 'x3!17a', 'fish');

  if(mysqli_connect_errno())
  {
  	echo "ERROR: could not connect to database";
  	exit;
  }

  $query = "INSERT INTO members (firstName, lastName, spouse, birthday, city, address, postalCode,
  	        phoneNumber, email, contactPreference, occupation, bylawsReceived, paymentType, 
  	        rollNumber, glCertNumber, initiatedDate, passedDate, raisedDate,
  	        affiliatedDate, highestPosition)
            VALUES ('" . $firstName . "', '" . $lastName . "', '" .
  	        $spouse . "', '" . $birthday . "', '" . $city . "', '" . $address . "', '" . $postalCode . "', '" . $phone . "', '" .
  	        $email . "', '" . $contactPref ."', '" . $occupation ."', '" . $bylawsReceived . "', '" . $paymentType . "', '" .
  	        $rollNumber . "', '" . $glCertNumber . "', '" . $initiatedDate . "', '" . $passedDate . "', '" . $raisedDate . "', '" .
  	        $affiliatedDate . "', '" . $maxOfficerPos . "')";


  $result = $db->query($query);


  if($result)
  {
  	echo $db->affected_rows . " member added<br />";
  }
  else
  {
  	echo "Error: unable to insert member: " . $db->error; // that's what she said
  }

  $db->close();

?>

  <p><a href="index.html">Home</a></p>
  <p><a href="newMember.html">Add Another Member</a></p>
</body>
</html>