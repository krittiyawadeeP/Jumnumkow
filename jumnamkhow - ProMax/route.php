
<?php
#checked 
 //$controllers = array('pages'=>['home','error'], 'farmer'=>['index','newFarmmer','addFarmer','updateForm','update','deleteConfirm','delete']);
 $controllers = array('pages'=>['home','error'], 'farmer'=>['index','newFarmer','addFarmer','getsubDistrict','search','searchPage','deleteConfirm','delete','updateForm','update','userSearch'],
                           'redemption'=>['toRedemPage','addRedemption'],'endorsement'=>['toEndorsementPage','addEndosement']);
 function call ($controller,$action)
 {
    require("controllers/".$controller."_controller.php");
    switch($controller)
    {
         case "pages": $controller_obj = new PagesController();
               break;
         case "farmer": 
            require_once("model/provinceModel.php");
            require_once("model/districtModel.php");
            require_once("model/farmerModel.php");
            require_once("model/endorsementModel.php");
            require_once("model/bankModel.php");
            $controller_obj= new FarmerController();
            break;
         case "redemption": 
            require_once("model/redemptionModel.php");
            require_once("model/bankModel.php");
            require_once("model/pledgeModel.php");
            require_once("model/farmerModel.php");
            $controller_obj= new RedemptionController();
            break;
          case "endorsement":
            require_once("model/farmerModel.php");
            require_once("model/endorsementModel.php");
            $controller_obj= new EndorsementController();

         
    }
    $controller_obj ->{$action}();
 }

 if(array_key_exists($controller,$controllers))
 {
    if(in_array($action,$controllers[$controller]))
    {
        call($controller,$action);
    }
    else
    {
        call('pages','error');
    }

 }
 else{
    call('pages','error');
 }
 ?>