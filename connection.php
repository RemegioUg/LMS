<?php
 $dbhost = "localhost";
 $dbuser ="root";
 $dbpass ="";
 $dbname = "limn";

 if(!$con = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname))
 {
     die("failed to connect!");
 }