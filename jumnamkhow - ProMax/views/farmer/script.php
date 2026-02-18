<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
  $('#province').change(function() {
    var id_province = $(this).val();

      $.ajax({
      type: "POST",
      url: "ajax_db.php",
      //url: "index.php?controller=farmer&action=getsubDistrict",
      data: {id:id_province,function:'province'},
      success: function(data){
          $('#district').html(data); 
          $('#subdistrict').html(' '); 
          $('#subdistrict').val(' ');  
          // $('#zip_code').val(' '); 
      }
    });
  });

  $('#district').change(function() {
    var id_district = $(this).val();

      $.ajax({
      type: "POST",
       url: "ajax_db.php",
      //url: "index.php?controller=farmer&action=getsubDistrict",
      data: {id:id_district,function:'district'},
      success: function(data){
          $('#subdistrict').html(data);  
      }
    });
  });

  //  $('#subdistrict').change(function() {
  //   var id_subdistrict= $(this).val();

  //     $.ajax({
  //     type: "POST",
  //     url: "ajax_db.php",
  //     data: {id:id_subdistrict,function:'subdistrict'},
  //     success: function(data){
  //         $('#zip_code').val(data)
  //     }
  //   });
  
  // });
</script>