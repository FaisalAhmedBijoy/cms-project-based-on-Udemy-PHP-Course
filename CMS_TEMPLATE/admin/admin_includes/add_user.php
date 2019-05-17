




<?php

if (isset($_POST['create_add_user'])) {

	
                 
                    $user_firstname=$_POST['user_firstname'];
                    $user_lastname=$_POST['user_lastname'];
                    $user_email=$_POST['user_email'];
                    $user_passward=$_POST['user_passward'];
                    
                    // $post_image=$_FILES['image']['name'];
                    // $post_image_temp=$_FILES['image']['tmp_name'];
                    // echo $post_image;
                    // echo $post_image_temp;

                    $username=$_POST['username'];
                    $user_role=$_POST['user_role'] ;



                   // $post_comment_count=4;
                  //  $post_date=date('d-m-y');

                    //move_uploaded_file($post_image_temp, "../images/{$post_image}") ;

                    $query="INSERT INTO users (username,user_passward,user_firstname,user_lastname,user_email,user_role)VALUES ('{$username}' ,'{$user_passward}','{$user_firstname}','{$user_lastname}',
                    '{$user_email}','{$user_role}')" ;

                    $create_add_query=mysqli_query($connection,$query);

                    echo "Added User Successfully </br>";

                   // confirmQuery($create_add_query) ;

                    // if (!$create_post_query) {

                    // 	die("QUERY FAILED ".mysqli_error($connection)) ;
                    // 	# code...
                    // }


}

?>


<form method="post" action="" enctype="multipart/form-data">

	<div class="form-group">
		<label for="user_firstname">First Name</label>
		<input class="form-control" type="text" name="user_firstname">

	</div>


	<div class="form-group">
		<label for="user_lastname">Last Name</label>
		<input class="form-control" type="text" name="user_lastname">

	</div>

	<div class="form-group">
		<label for="username">User Name</label>
		<input class="form-control" type="text" name="username">

	</div>

	<div class="form-group">
		<label for="user_email">Email</label>
		<input class="form-control" type="text" name="user_email">

	</div>

	<div class="form-group">
		<label for="user_email">Passward</label>
		<input class="form-control" type="passward" name="user_passward">

	</div>

	<!-- <div class="form-group">
		<label for="image">User image</label>
		<input class="form-control" type="file" name="image">

	</div>
 -->



 
		<div class="form-group">
			
        <select id="" name="user_role" class="form-control">


        	<option value="subscriber">Select Option</option>
        	<option value="admin">Admin</option>
        	<option value="subscriber">Subscriber</option>

 <?php          //Update Time it's required 

               //     $query="SELECT * FROM users";
               //     $select_user_query= mysqli_query($connection ,$query) ;

               //   while ($row =mysqli_fetch_assoc($select_user_query)) 
               // {
               //      $user_id=  $row['user_id'] ; 
               //      $user_role=$row['user_role'] ;

               //      echo "<option value='$user_id'>{$user_role} </option>";
               //  }
 ?>
            

        </select>


		</div> 
 

	

	<div class="form-group">
		
		<input class="btn btn-success" type="submit" name="create_add_user" value="Add User">

	</div>
	

</form>