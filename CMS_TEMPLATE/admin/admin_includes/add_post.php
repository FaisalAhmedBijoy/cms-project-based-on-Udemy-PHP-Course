




<?php

if (isset($_POST['create_add_post'])) {

	
                 
                    $post_author= escape ($_POST['post_author'] );
                    $post_title= escape( $_POST['post_title']);
                    $post_category_id=escape( $_POST['post_category_id']);
                    $post_status=$_POST['post_status'];
                    
                    $post_image=$_FILES['image']['name'];
                    $post_image_temp=$_FILES['image']['tmp_name'];
                    // echo $post_image;
                    // echo $post_image_temp;

                    $post_tags=$_POST['post_tags'];
                    $post_content=$_POST['post_content'] ;


                   // $post_comment_count=4;
                    $post_date=date('d-m-y');

                    move_uploaded_file($post_image_temp, "../images/{$post_image}") ;

                    $query="INSERT INTO posts (post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status)VALUES ({$post_category_id} ,'{$post_title}','{$post_author}',now(),'{$post_image}',
                    '{$post_content}','{$post_tags}','{$post_status}')" ;

                    $create_post_query=mysqli_query($connection,$query);

                    confirmQuery($create_post_query) ;

                    // if (!$create_post_query) {

                    // 	die("QUERY FAILED ".mysqli_error($connection)) ;
                    // 	# code...
                    // }


}

?>


<form method="post" action="" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Post Title</label>
		<input class="form-control" type="text" name="post_title">

	</div>


	<div class="form-group">
		<label for="title">Post Author</label>
		<input class="form-control" type="text" name="post_author">

	</div>

	<!-- <div class="form-group">
		<label for="post_category_id">Post Category Id</label>
		<input class="form-control" type="text" name="post_category_id">

	</div> -->

	<div class="form-group">
		<label for="post_status">Post Status</label>
		<input class="form-control" type="text" name="post_status">

	</div>

	   <div class="form-group">

       <!--  
        <label for="post_category_id">Post Category Id</label>
        <input class="form-control" type="text" name="post_category_id" value="<?php //echo $post_category_id;?>"> -->
        <label for="post_category_id"> Category </label>
        <br>
        <select id="" name="post_category_id">

 <?php

                   $query="SELECT * FROM categories";
                   $select_category_query= mysqli_query($connection ,$query) ;

                 while ($row =mysqli_fetch_assoc($select_category_query)) 
               {
                    $cat_title=  $row['CAT_TITLE'] ; 
                    $cat_id=$row['CAT_ID'] ;

                    echo "<option value='$cat_id'>{$cat_title} </option>";
                }
    ?>
            

        </select>

    </div>


	<div class="form-group">
		<label for="image">Post Image</label>
		<input class="form-control" type="file" name="image">

	</div>

	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input class="form-control" type="text" name="post_tags">

	</div>

	<div class="form-group">
		<label for="post_content">Post Content</label>
	<!-- 	<input class="form-control" type="text" name="post_content"> -->
		<textarea class="form-control" id="body" cols="30" rows="10" name="post_content"></textarea>

	</div>

	<div class="form-group">
		
		<input class="btn btn-primary" type="submit" name="create_add_post" value="Add Post">

	</div>
	

</form>