<?php
if (isset($_POST['checkboxArray'])) {

    foreach ($_POST['checkboxArray'] as $checkboxvalue) {
        # code...
        echo "success";
        $bulk_Option=$_POST['bulk_Option'];


        switch ($bulk_Option) {
            case 'published':

                $query="UPDATE posts SET post_status = {$bulk_Option} WHERE post_id ={'$checkboxvalue'} " ;
                $update_to_publish=mysqli_query($connection,$query) ;
                
                # code...
                break;

                case 'draft':
                  $query="UPDATE posts SET post_status = {$bulk_Option} WHERE post_id ={'$checkboxvalue'} " ;
                 $update_to_draft=mysqli_query($connection,$query) ;
                    # code...
                    break;


                       case 'delete':
                    $query="DELETE FROM posts WHERE post_id ={'$checkboxvalue'} " ;
                    $update_to_delete=mysqli_query($connection,$query) ;
                    # code...
                    break;
            
            default:
                # code...
                break;
        }
    }
    # code...
}


?>

                       
                <form method="post" action="">
                       <table class="table table-bordered table-hover">


                        <div class="col-xs-4" id="bulkOptionContainer" >

                            <select class="form-control" name="bulk_Option">
                                

                                <option value="">Select operation</option>
                                <option value="published">Published</option>
                                <option value="draft">Draft</option>
                                <option value="delete">Delete</option>

                            </select>
                            
                        </div>

                        <div class="col-xs-4" class="form-control">
                            <input type="submit" name="submit" class="btn btn-success" value="success" >
                            <a href="add_post.php" class="btn btn-primary">Add New</a>

                        </div>


                                
                                <thead>
                                    
                           
                                        <tr>
                                            <th><input type="checkbox" name="selectAllBoxes"> </th>
                                            <th>Id</th>
                                            <th>Author</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Tags</th>
                                            <th>Comments</th>
                                            <th>Date</th>
                                            <th>View Post</th>
                                            <th>Delete</th>
                                            <th>Edit</th>
                                            <th>Post Views Count</th>
                                            
                                            


                                        </tr>


                               
                                </thead>

                                <tbody>




<?php



                $query="SELECT * FROM posts";
                $select_posts_query= mysqli_query($connection ,$query) ;

               while ($row =mysqli_fetch_assoc($select_posts_query)) 
               {
                   
                   
                    $post_id =$row['post_id'];
                    $post_author=$row['post_author'];
                    $post_title=$row['post_title'];
                    $post_category_id=$row['post_category_id'];
                    $post_status=$row['post_status'];
                    $post_image=$row['post_image'];
                    $post_tags=$row['post_tags'];
                    $post_comment_count=$row['post_comment_count'];
                    $post_date=$row['post_date'];
                    $post_views_count=$row['post_views_count'];


                    echo "<tr>";

                    ?>

                   <td> <input type="checkbox" name="checkboxArray[]" class="checkBoxes"> <?php //echo $post_id ;?></td>
                    <?php 
                    echo "<td> {$post_id }  </td>";
                    echo "<td> {$post_author}  </td>";
                    echo "<td> {$post_title} </td>";



                $query="SELECT * FROM categories WHERE cat_id ={$post_category_id}";
                $select_category_query= mysqli_query($connection ,$query) ;

                while ($row =mysqli_fetch_assoc($select_category_query)) 
                {
                    $cat_title=  $row['CAT_TITLE'] ; 
                    $cat_id=$row['CAT_ID'] ;

                    
                  
                    echo "<td> {$cat_title }  </td>";
                   
                }





                    //echo "<td> {$post_category_id}</td>";







                    echo "<td> {$post_status} </td>";
                    echo "<td> <img width='100' src='../images/$post_image' alt='image'</td>";
                    echo "<td> {$post_tags} </td>";
                    echo "<td> {$post_comment_count}</td>";
                    echo "<td> {$post_date} </td>";


                    echo "<td> <a href='../post.php?p_id={$post_id }'> View </a> </td>";
                    echo "<td> <a href='posts.php?delete={$post_id }'> Delete </a> </td>";
                    echo "<td> <a href='posts.php?source=edit_post&p_id={$post_id }'> Edit </a> </td>";
                    echo "<td>  <a href='posts.php?reset={$post_id }'> {$post_views_count} </a> </td>";
                    
                    echo "</tr>";
                }



?>


                              
                                  
                                </tbody>
            
                            </table>

                    </form>

<?php

if (isset($_GET['delete'])) {
    # code...

    $delete_post_id =$_GET['delete'] ;
    $query="DELETE FROM posts WHERE post_id = {$delete_post_id}" ;

    $delete_post_query=mysqli_query($connection,$query) ;

}


if (isset($_GET['reset'])) {
    # code...

    $reset_post_count_id =$_GET['reset'] ;
    $query="UPDATE posts SET post_views_count=0 WHERE post_id = {$reset_post_count_id}" ;

    $reset_post_count_query=mysqli_query($connection,$query) ;

}


?>