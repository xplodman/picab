<?php
    $con = mysqli_connect("localhost", "root", "root", "picabref");
    //Check connection
    if(mysqli_connect_errno()){
        echo "Failed to connect:".mysqli_connect_errno();
    }
			$arabicsql= 'SET CHARACTER SET utf8'; 
		mysqli_query($con,$arabicsql); 

?>
