
<?php  
                // Put Values to the Form 
               

                if (isset($_GET['edit_user_id'])) {

                    $edit_user_id=$_GET['edit_user_id'];
                    // echo $edit_post_id;
                }

                $query="SELECT * FROM users WHERE user_id='{$edit_user_id}' ";
                $select_edit_users_query= mysqli_query($connection ,$query) ;

                 while ($row =mysqli_fetch_assoc($select_edit_users_query)) 
                {
                   
                   
                    
                    $username=$row['username'];
                    $user_firstname=$row['user_firstname'];
                    $user_lastname=$row['user_lastname'];
                    $user_email=$row['user_email'];
                    $user_passward=$row['user_passward'] ;
                    $user_role=$row['user_role'];
                    
                  
                    
                }

              

?>




<?php


if (isset($_GET['edit_user_id'])) {
    # code...
    $edit_user_id=$_GET['edit_user_id'];
   // echo $edit_user_id;
}


if (isset($_POST['edit_user'])) {

    
                 
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

                   // echo $user_email;



                   // $post_comment_count=4;
                  //  $post_date=date('d-m-y');

                    //move_uploaded_file($post_image_temp, "../images/{$post_image}") ;

                      $query="UPDATE users SET user_firstname='{$user_firstname}',user_lastname='{$user_lastname}',user_email='{$user_email}',username='{$username}',user_passward='{$user_passward}',user_role='{$user_role}' WHERE user_id='{$edit_user_id}' " ;

                         $edit_user_query=mysqli_query($connection,$query);


                   // confirmQuery($create_add_query) ;

                    // if (!$create_post_query) {

                    //  die("QUERY FAILED ".mysqli_error($connection)) ;
                    //  # code...
                    // }


}

?>


<form method="post" action="" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input class="form-control" type="text" name="user_firstname" value="<?php echo $user_firstname ; ?>">

    </div>


    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input class="form-control" type="text" name="user_lastname" value="<?php echo $user_firstname ; ?>">

    </div>

    <div class="form-group">
        <label for="username">User Name</label>
        <input class="form-control" type="text" name="username" value="<?php echo $username ; ?>">

    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input class="form-control" type="text" name="user_email" value="<?php echo $user_email ; ?>">

    </div>

    <div class="form-group">
        <label for="user_email">Passward</label>
        <input class="form-control" type="passward" name="user_passward" value="<?php echo $user_passward ; ?>">

    </div>

    <!-- <div class="form-group">
        <label for="image">User image</label>
        <input class="form-control" type="file" name="image">

    </div>
 -->



 
        <div class="form-group">
            
        <select id="" name="user_role" class="form-control" >


            <option value="subscriber"><?php echo $user_role ; ?></option>

            <?php

            if ($user_role == 'admin') {

                # code...
                 echo "<option value='subscriber'>Subscriber</option>";
            }
            else
            {
                 echo "<option value='admin'>admin</option>";
            }


            ?>
           
           
      

        </select>


        </div> 
 

    

    <div class="form-group">
        
        <input class="btn btn-success" type="submit" name="edit_user" value="Update User">

    </div>
    

</form>