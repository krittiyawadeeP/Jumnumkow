<?php

     require("connection_connect.php");
      error_reporting( error_reporting() & ~E_NOTICE );

  if (isset($_POST['function']) && $_POST['function'] == 'province') {
  	$id = $_POST['id'];
   //$id = $_POST['provinceId'];
  	$sql = "SELECT * FROM district WHERE provinceId='$id'";
  	$query = mysqli_query($conn, $sql);
  	echo '<option value="" selected disabled>-กรุณาเลือกอำเภอ-</option>';
  	foreach ($query as $value) {
  		echo '<option value="'.$value['districtId'].'">'.$value['districtName'].'</option>';
  		
  	}
  }


if (isset($_POST['function']) && $_POST['function'] == 'district') 
{
    $id = $_POST['id'];
    $sql = "SELECT * FROM subdistrict WHERE districtId='$id'";
    //$sql = "SELECT * FROM subdistrict WHERE districtId='$id'";
    $query = mysqli_query($conn, $sql);
    echo '<option value="" selected disabled>-กรุณาเลือกตำบล-</option>';
    foreach ($query as $value2) {
      echo '<option value="'.$value2['subdistrictId'].'">'.$value2['subdistrictName'].'</option>';
      
    }
}
?>