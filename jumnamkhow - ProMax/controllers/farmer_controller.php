
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

#checked
 class FarmerController
 {
    public function index()
    {
        $farmer_list = Farmer::getAll();
        require_once('views/farmer/index_farmer.php');
    }
    
    public function newFarmer()
    { 
        //$branch_list = Branch::getAll();
        $province_list = Province::getAll();
        //$district_list = District::getAllif();
       // $subdistrict_list = Subdistrict::getAllif();
       $bank_list = Bank::getAll();
    require_once('views/farmer/newFarmer.php');
    }


       public function addFarmer()
    { 
        $password = $_POST['password'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $address = $_POST['address'];
        $provinceId = $_POST['Ref_prov_id'];
        $districtId = $_POST['Ref_dist_id'];
        $subdistrictId = $_POST['Ref_subdist_id'];
        $limitPledge = $_POST['limitPledge'];
        $idBank = $_POST['idBank'];
        $account_number = $_POST['account_number'];

       // $idfarmer = Farmer::add($password, $firstName, $lastName, $address, $provinceId, $districtId, $subdistrictId);
         $idfarmer = Farmer::add($password, $firstName, $lastName, $address, $provinceId, $districtId, $subdistrictId,$limitPledge,$idBank,$account_number);
    //     echo "$idfarmer";
    //     //$idfarmer = $suseccFaermer->idfarmer;
    //    $endoser_list  = Endorsement::getEndoser($idfarmer);
    //    $farmer_list = Farmer::get($idfarmer);
        //require_once('views/farmer/infoFarmer.php'); 
        require_once('views/farmer/login.php');

    }

    public function search()
    {
        $key1 = $_POST['key1'];
        $key2 = $_POST['key2'];
        $key3 = $_POST['key3'];
        $farmer_list = Farmer::search($key1,$key2,$key3);

           // if (empty($farmer_list) || count($farmer_list) === 0) {
            if (is_null($farmer_list)) {
        // reload หน้า searchPage
            header("Location: index.php?controller=farmer&action=searchPage");
            exit();
        }
        //require_once('views/farmer/index_farmer.php'); //แก้เป็นinfoFarmer.php
        $idfarmer = $farmer_list->idfarmer;
        $endoser_list  = Endorsement::getEndoser($idfarmer);
        require_once('views/farmer/infoFarmer.php'); //================================
    }


    public function searchPage()
    {
        require_once('views/farmer/login.php');
    }


      public function deleteConfirm()
    {
        $idfarmer = $_GET['idfarmer'];
        $farmer = Farmer::get($idfarmer);   
        require_once('views/farmer/deleteConfirm.php');
    }

    public function delete()
    {
    $idfarmer = $_POST['idfarmer'];
    Farmer::delete($idfarmer);
    FarmerController::index();
    }

    public function updateForm()
    {
        echo "00";
        $idfarmer = $_GET['idfarmer'];
        $farmer = Farmer::get($idfarmer);
        echo "11";
       // $branch_list = Branch::getAll();
        require_once('views/farmer/updateForm.php');
        echo "12";

    }
    public function update()
    {
        $idfarmer=$_POST['idfarmer'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $address =$_POST['address'];
        Farmer::update($idfarmer, $firstName, $lastName, $address);
        FarmerController::index();    
    }

    public function userSearch()
    {
        $key = $_POST['key'];
        $farmer_list = Farmer::user_search($key);
        require_once('views/farmer/index_farmer.php');
    }
  
 }
 ?>