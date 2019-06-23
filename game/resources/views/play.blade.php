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
            $playerid=$_GET['playerid'];
            $playername=$_GET['playername'];
            $playeremail=$_GET['playeremail'];
            $mobilenumber=$_GET['mobilenumber'];
            $playeraddress=$_GET['playeraddress'];

            $query="INSERT INTO player(player_id,player_name,email,mobile,p_address) VALUES('$playerid','$playername','$playeremail','$mobilenumber','$playeraddress')";
            $insert_player_query=mysqli_query($connection,$query);
            if($insert_player_query){
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