<?php
// Enter your host name, database username, password, and database name.
// If you have not set database password on localhost then set empty.
$con = mysqli_connect("localhost", "root", "", "academia_login");
// $con = mysqli_connect("localhost", "root", "", "academia_tubes");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//Database Connection Info (DNMembership)
$serverName = "172.16.109.52,1433";
$connectionInfo = array( 
    "Database"=>"DNMembership", 
    "UID"=>"DragonNest", 
    "PWD"=>"uZBfDg7e6LZxZfM"
);
$conn = sqlsrv_connect( $serverName, $connectionInfo);  
    if( $conn === false )  
    die( FormatErrors( sqlsrv_errors() ) ); 
    
//Database Connection Info (DNWorld)
$connectionInfo = array( 
    "Database"=>"DNWorld", 
    "UID"=>"DragonNest", 
    "PWD"=>"uZBfDg7e6LZxZfM"
);
$connn = sqlsrv_connect( $serverName, $connectionInfo);  
    if( $connn === false )  
    die( FormatErrors( sqlsrv_errors() ) ); 