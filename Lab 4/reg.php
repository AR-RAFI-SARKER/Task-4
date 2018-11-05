<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $fullNameErr = $phoneErr = $passwordchk=$conpasswordchk= "";
$name = $email = $gender = $phone = $fullName = $password=$conpassword= "";
$chk= $_POST ['ct'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  
   if (empty($_POST["password"])) {
    $passwordchk = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
    // check if e-mail address is well-formed
    if ($password != $conpassword) {
      $passwordchk = "";
    }
  }
   if (empty($_POST["conpassword"])) {
    $conpasswordchk = "Confirm Password is required";
  } else {
    $conpassword = test_input($_POST["conpassword"]);
    // check if e-mail address is well-formed
    if ($password != $conpassword) {
      $conpasswordchk = "password don't match ";
    }
  }
    
  if (empty($_POST["fullName"])) {
    $fullName = "";
  } else {
    $fullName = test_input($_POST["fullName"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("[/a-zA-Z/ ]",$fullName)) {
      $fullNameErr = "Invalid Name";
    }
  }

 if (empty($_POST["phone"])) {
    $phone = "";
  } else {
    $phone = test_input($_POST["phone"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("[/0-9/ ]",$phone)) {
      $fullNameErr = "Invalid Number";
    }
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  UserName: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
   FullName: <input type="text" name="fullName" value="<?php echo $fullName;?>">
  <span class="error">* <?php echo $fullNameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Phone: <input type="text" name="phone" value="<?php echo $phone;?>">
  <span class="error"><?php echo $phoneErr;?></span>
  <br><br>
 
 password: <input type="password" name="password" value="<?php echo $password;?>">
  <span class="error">* <?php echo $passwordchk;?></span> 
  </br>
confirm password: <input type="password" name="conpassword" value="<?php echo $conpassword;?>">
  <span class="error">* <?php echo $conpasswordchk;?></span>  
 </br></br>
 
  Gender:
  </br></br>
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  
  </br></br>
 Education</br></br>
			   <input type="checkbox" name="ct[]" value="SSC <br/>" />SSC
			   <input type="checkbox" name="ct[]" value="HSC <br/>" />HSC
			   <input type="checkbox" name="ct[]" value="BSC <br/>" />BSC
			   <input type="checkbox" name="ct[]" value="MSC <br/>" />MSC
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>


<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $fullName;
echo "<br>";
echo $email;
echo "<br>";
echo $phone;
echo "<br>";

echo $gender;
?>
</br> </br>
<ul>
<?php foreach ($chk as $ct) {
    ?><li>
	<?php echo $ct;
?>
</li>	
<?php } ?>


</body>
</html>
