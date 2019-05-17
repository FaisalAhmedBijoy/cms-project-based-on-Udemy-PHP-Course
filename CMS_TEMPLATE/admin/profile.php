

<?php include "admin_includes/admin_header.php" ?>
        <!-- Navigation -->
       

<?php include "admin_includes/admin_navigation.php" ?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">


                        <h1 class="page-header">
                            Welcome To CMS 
                            <small>Author</small>
                        </h1>

<?php

if (isset($_SESSION['username'])) {
    # code...
    $username=$_SESSION['username'] ;

     $query="SELECT * FROM users WHERE username='{$username}' ";
     $select_profile_query= mysqli_query($connection ,$query) ;



    while ($row=mysqli_fetch_array($select_profile_query)) {
        
        $user_id=$row['user_id'] ;
        $username=$row['username'] ;
        $user_firstname=$row['user_firstname'] ;
        $user_lastname=$row['user_lastname'] ;
        $user_email=$row['user_email'] ;
        $user_role=$row['user_role'] ;
        $ser_passward=$row['user_passward'] ;
        
    }

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

                        <div class="col-xs-12">
     
                        </div>


                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "admin_includes/admin_footer.php" ?>