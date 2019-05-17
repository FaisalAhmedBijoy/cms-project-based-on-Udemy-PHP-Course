<?php include "admin_includes/admin_header.php" ?>
        <!-- Navigation -->
       

<?php include "admin_includes/admin_navigation.php" ?>


        <div id="page-wrapper">



            <?php
          


            ?>

            <?php

                if ($connection) {
                    # code...
                   // echo "connection ok";
                }
            ?>

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To

                          
                          <small> <?php //echo  $_SESSION['username'] ; ?></small>

                           
                        </h1>
                       
                    </div>
                </div>





       
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                  <div class='huge'>


            
        <?php

                    $query="SELECT * FROM posts ";
                    $select_all_post_query=mysqli_query($connection,$query);

                   $post_count= mysqli_num_rows($select_all_post_query) ;
                   echo $post_count;
        ?>


              </div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <div class='huge'>
                         
             <?php

                    $query="SELECT * FROM comments ";
                    $select_all_comment_query=mysqli_query($connection,$query);

                   $comment_count= mysqli_num_rows($select_all_comment_query) ;
                   echo $comment_count;
            ?>
                     </div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class='huge'>
                        
             <?php

                    $query="SELECT * FROM users ";
                    $select_all_user_query=mysqli_query($connection,$query);

                   $user_count= mysqli_num_rows($select_all_user_query) ;
                   echo $user_count;
            ?>
                    </div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class='huge'>
                            

                                  <?php

                    $query="SELECT * FROM categories ";
                    $select_all_categories_query=mysqli_query($connection,$query);

                   $categories_count= mysqli_num_rows($select_all_categories_query) ;
                   echo $categories_count;
                  ?>

                        </div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="admin_categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->


                <!-- /.row -->



<?php

$query="SELECT * FROM posts WHERE post_status = 'draft' ";
$select_draft_post_query=mysqli_query($connection,$query);        
$draft_post_count= mysqli_num_rows($select_draft_post_query) ;            


$query="SELECT * FROM comments WHERE comment_status = 'Unapprove' ";
$select_unapprove_comment_query=mysqli_query($connection,$query);        
$unapprove_comment_count= mysqli_num_rows($select_unapprove_comment_query) ;            


$query="SELECT * FROM users WHERE user_role = 'subscriber' ";
$select_all_subscriber_query=mysqli_query($connection,$query);        
$subscriber_count= mysqli_num_rows($select_all_subscriber_query) ;            



?>

                <div class="row">
                     <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],

    <?php

        $element_text=['Active Post ','Draft post','Comments ','Pending Comments','User ','Subsciber','Categories'] ;
        $element_count=[$post_count,$draft_post_count,$comment_count,$unapprove_comment_count,$user_count,$subscriber_count,$categories_count] ;

        for($i=0 ;$i<7;$i++){

            echo "['{$element_text[$i]}' ".","."{$element_count[$i]} ], ";
        }
    ?>
     
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

     <div id="columnchart_material" style="width: auto; height: 500px;"></div
                    
                </div>



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->






<?php include "admin_includes/admin_footer.php" ?>