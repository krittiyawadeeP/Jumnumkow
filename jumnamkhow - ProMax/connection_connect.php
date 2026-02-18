
 <?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


     $servername = "localhost";
     $username = "db25_049";
     $password = "db25_049";
     $dbname = "db25_049_ricePledging_07";
          
//forXAMPP
    // $servername = "158.108.207.4";
    //  $username = "db25_049";
    //  $password = "db25_049";
    //  $dbname = "db25_049_ricePledging_07";
    //  $port = 5738;

    //$conn = new mysqli($servername,$username,$password,$dbname, $port);
    $conn = new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error){
        die("connect Fail".$conn->connect_error);}
    if(!$conn->select_db($dbname))
    {die("connect Fail".$conn->connect_error);}

    $conn->set_charset("utf8");
    //echo "Connected successfully";
    #$conn ->select_db($dbname);
    #$sql = "select * from Sailors";
    #$result = $conn->query($sql);
          
?>
