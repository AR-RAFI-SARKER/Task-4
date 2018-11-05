<?php
echo '<pre>';
print_r($_COOKIE);
echo '</pre>';
session_start();

if ($_COOKIE [$un] == $pw ){
	$_SESSION ['un'] = $un;
	header("location:login.php");
}
else 
{
	echo "Wrong User Name or Password.";
	echo "<a href='registartion.php'>Go Back</a>";
	
}

?>