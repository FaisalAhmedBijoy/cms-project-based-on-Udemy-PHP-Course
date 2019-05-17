<?php include "db.php"; ?>
<?php session_start() ; ?>

<?php

if (isset($_POST['login'])) {


	echo $username=$_POST['username'];
	echo $passward=$_POST['passward'];


	$username=mysqli_real_escape_string($connection,$username);
	$passward=mysqli_real_escape_string($connection,$passward);

	//echo $username;
	//echo $passward;

   $query="SELECT * FROM users WHERE username='{$username}' ";
   $select_login_query= mysqli_query($connection ,$query) ;


	while ($row=mysqli_fetch_array($select_login_query)) {
		
		$db_user_id=$row['user_id'] ;
		$db_username=$row['username'] ;
		$db_user_firstname=$row['user_firstname'] ;
		$db_user_lastname=$row['user_lastname'] ;
		$db_email=$row['user_email'] ;
		$db_user_role=$row['user_role'] ;
		$db_user_passward=$row['user_passward'] ;
		
	}

	if (passward_verify($passward,$db_user_passward)) {

		
		$_SESSION['username']=$db_username ;
		$_SESSION['passward']=$db_user_passward;
		$_SESSION['user_role']=$db_user_role;

		header("Location: ../admin");
	}

	else
	{
	
		header("Location: ../index.php");
	
	}
}

?>