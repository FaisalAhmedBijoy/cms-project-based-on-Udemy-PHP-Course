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
        $game_id=$_GET['game_id'];
        $vol_name=$_GET['game_name'];
        $vol_email=$_GET['version'];


        $query="INSERT INTO player(game_id,game_name,version) VALUES('$game_id','$game_name','$version')";
        $insert_vol_query=mysqli_query($connection,$query);
        if($insert_game_query){
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