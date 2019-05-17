                       <table class="table table-bordered table-hover">

                                
                                <thead>
                                    
                           
                                        <tr>
                                            <th>Id</th>
                                            <th>Username</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            
                                            
                                            
                                            


                                        </tr>


                               
                                </thead>

                                <tbody>




<?php



                $query="SELECT * FROM users";
                $select_users_query= mysqli_query($connection ,$query) ;

               while ($row =mysqli_fetch_assoc($select_users_query)) 
               {
                   
                   
                    $user_id =$row['user_id'];
                    $username=$row['username'];

                    $user_passward=$row['user_passward'];
                    $user_firstname=$row['user_firstname'];
                    $user_lastname=$row['user_lastname'];
                    $user_email=$row['user_email'];
                    $user_image=$row['user_image'];
                    $user_role=$row['user_role'];
                    $user_randSalt=$row['randSalt'];
                  


                    echo "<tr>";
                    echo "<td> {$user_id }  </td>";
                    echo "<td> {$username}  </td>";
                    echo "<td> {$user_firstname} </td>";
                    echo "<td> {$user_lastname} </td>";
                    echo "<td> {$user_email} </td>";



                // $query="SELECT * FROM posts WHERE post_id ={$comment_post_id}";
                // $select_post_id_query= mysqli_query($connection ,$query) ;

                // while ($row =mysqli_fetch_assoc($select_post_id_query)) 
                // {
                //     $post_id=  $row['post_id'] ; 
                //     $post_title=$row['post_title'] ;

                    
                   
                //   //  echo "<td> {$cat_title }  </td>";
                //     echo "<td> <a href='../post.php?p_id=$post_id'> $post_title </a> </td>";
                   
                // }





                    //echo "<td> {$post_category_id}</td>";







                   
                  //  echo "<td> Some Title </td>";
                    
                    echo "<td> {$user_role} </td>";
                  
                    echo "<td> <a href='users.php?change_to_admin={$user_id }'> Admin </a> </td>";
                    echo "<td> <a href='users.php?change_to_sub={$user_id }'> Subscriber </a> </td>";
                      echo "<td> <a href='users.php?source=edit_user&edit_user_id={$user_id }'> Edit </a> </td>";
                    echo "<td> <a onClick=\"javascript: return confirm('Are you sure to delete '); \" href='users.php?delete={$user_id }'> Delete </a> </td>";
                    
                    
                    echo "</tr>";
                }



?>


                              
                                  
                                </tbody>
            
                            </table>

<?php

//Delete 
if (isset($_GET['delete'])) {
    # code...

    $delete_user_id =$_GET['delete'] ;
    $query="DELETE FROM users WHERE user_id = {$delete_user_id}" ;

    $delete_user_query=mysqli_query($connection,$query) ;

}

//Approve
if (isset($_GET['change_to_admin'])) {
    # code...

    $change_user_id =$_GET['change_to_admin'] ;
    $query="UPDATE  users SET user_role = 'admin' WHERE user_id={$change_user_id}" ;

    $change_role_query=mysqli_query($connection,$query) ;

}

//Unapprove
if (isset($_GET['change_to_sub'])) {
    # code...

    $change_user_id =$_GET['change_to_sub'] ;
    $query="UPDATE  users SET user_role = 'Subscriber' WHERE user_id={$change_user_id}" ;

    $change_role_query=mysqli_query($connection,$query) ;

}


?>