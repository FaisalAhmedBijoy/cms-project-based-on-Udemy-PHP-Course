<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gamecontest";
// Create connection
$connection =  mysqli_connect($servername, $username, $password,$dbname);

if($connection){
    echo "Connection success ";

    if(isset($_GET['submit']))
    {
        echo "submit button";
        $vol_id=$_GET['vol_id'];
        $vol_name=$_GET['vol_name'];
        $vol_email=$_GET['email'];
        $role=$_GET['role'];
        $mobile=$_GET['mobile'];

        $query="INSERT INTO player(vol_id,vol_name,email,role,mobile) VALUES('$vol_id','$playername','$playeremail','$mobilenumber','$playeraddress')";
        $insert_vol_query=mysqli_query($connection,$query);
        if($insert_vol_query){
            echo "No problem ";
        }
        else{
            echo "No Problem ";
        }

    }
    else{
        echo "Not press submit";
    }


}
else{
    echo "Connection Error";
}

?>