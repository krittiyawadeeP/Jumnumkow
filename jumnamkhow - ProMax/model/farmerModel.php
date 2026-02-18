<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class Farmer {
    public $idfarmer;
    public $firstName;
    public $lastName;
    public $address;

    public $subdistrictId;
    public $districtId;
    public $provinceId;

    public $subdistrictName;
    public $districtName;
    public $provinceName;

    public $idBank;
    public $name;
    public $account_number;
    public $limitPledge;
    public $password;

    public $idPledge;

    // Constructor
    public function __construct($idfarmer, $firstName,$lastName, $address, $subdistrictId,$districtId, $provinceId,$subdistrictName,$districtName, $provinceName, $idBank,$name, $account_number, $limitPledge, $password,$idPledge) {
        $this->idfarmer = $idfarmer;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address = $address;
        $this->subdistrictId = $subdistrictId;
        $this->districtId = $districtId;
        $this->provinceId = $provinceId;

        $this->subdistrictName = $subdistrictName;
        $this->districtName = $districtName;
        $this->provinceName = $provinceName;

        $this->idBank = $idBank;
        $this->name = $name;
        $this->account_number = $account_number;
        $this->limitPledge = $limitPledge;
        $this->password = $password;

        $this->idPledge = $idPledge;
    }

    public static function getEndoserSameaddress($idfarmer) {
        $farmerList = [];
        require("connection_connect.php");
        //$sql = "SELECT * FROM farmer WHERE farmer.subdistrictId = (SELECT farmer.subdistrictId FROM farmer WHERE farmer.idfarmer ='$idfarmer' ) and farmer.idfarmer not in(SELECT endorsement.farmer_id FROM endorsement WHERE endorsement.endorser_id = '$idfarmer' ) AND farmer.idfarmer!= '$idfarmer';";
        $sql="SELECT * FROM farmer WHERE farmer.subdistrictId = (SELECT farmer.subdistrictId FROM farmer WHERE farmer.idfarmer ='$idfarmer' ) and farmer.idfarmer not in(SELECT endorsement.farmer_id FROM endorsement WHERE endorsement.endorser_id = '$idfarmer' ) AND farmer.idfarmer!= '$idfarmer' AND farmer.idfarmer not in (SELECT  endorsement.farmer_id  FROM endorsement GROUP BY endorsement.farmer_id having COUNT(farmer_id) = 5);";
        $result = $conn->query($sql);

      while ($row = $result->fetch_assoc()) {
    $farmerList[] = new Farmer(
        $row['idfarmer'],
        $row['firstName'],
        $row['lastName'],
        $row['address'],
        $row['subdistrictId'],
        $row['districtId'],
        $row['provinceId'],
        null, // subdistrictName
            null, // districtName
            null, // provinceName
            null, // idBank
            null, // name
            null, // account_number
            null, // limitPledge
            null, // password
            null  // idPledge
        );
    }
        require("connection_close.php");
        return $farmerList;  // ต้อง return
    }

    public static function getAll() {
        $farmerList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM farmer NATURAL JOIN province INNER JOIN district on district.districtId = farmer.districtId INNER JOIN subdistrict on subdistrict.subdistrictId= farmer.subdistrictId NATURAL JOIN Bank;";
        $result = $conn->query($sql);

      while ($row = $result->fetch_assoc()) {
    $farmerList[] = new Farmer(
        $row['idfarmer'],
        $row['firstName'],
        $row['lastName'],
        $row['address'],
        $row['subdistrictId'],
        $row['districtId'],
        $row['provinceId'],
        $row['subdistrictName'],
        $row['districtName'],
        $row['provinceName'],
        $row['idBank'],
        $row['name'],
        $row['account_number'],
        $row['limitPledge'],
        $row['password'],
        $idPledge=null
        );
    }
        require("connection_close.php");
        return $farmerList;  // ต้อง return
    }

    
        public static function search($key1,$key2,$key3) {
        //farmerList = [];
        require("connection_connect.php");
        //$sql = "SELECT * FROM farmer NATURAL JOIN province INNER JOIN district on district.districtId = farmer.districtId INNER JOIN subdistrict on subdistrict.subdistrictId= farmer.subdistrictId where farmer.password='$key3' and farmer.firstName='$key1' and farmer.lastName='$key2'; ";
        $sql = "SELECT * FROM farmer INNER JOIN Bank ON Bank.idBank=farmer.idBank INNER JOIN province on farmer.provinceId=province.provinceId INNER JOIN district on district.districtId = farmer.districtId INNER JOIN subdistrict on subdistrict.subdistrictId = farmer.subdistrictId left JOIN pledge on pledge.farmer_idfarmer= farmer.idfarmer where farmer.password='$key3' and farmer.lastName='$key2' and farmer.firstName='$key1'; ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc(); 
        require("connection_close.php");
        
         if (!$row) {
        return null;
        }
        
        return new Farmer(
        $row['idfarmer'],
        $row['firstName'],
        $row['lastName'],
        $row['address'],
        $row['subdistrictId'],
        $row['districtId'],
        $row['provinceId'],
        $row['subdistrictName'],
        $row['districtName'],
        $row['provinceName'],
        $row['idBank'],
        $row['name'],
        $row['account_number'],
        $row['limitPledge'],
        $row['password'],
        //$idPledge
        $row['idPledge']
            );
    }


    public static function add($password, $firstName, $lastName, $address, $provinceId, $districtId, $subdistrictId,$limitPledge,$idBank,$account_number) {
         require("connection_connect.php");

        $sql = "INSERT INTO farmer (password,firstName, lastName, address, 
                provinceId, districtId, subdistrictId,limitPledge,idBank,account_number) 
                VALUES ('$password', '$firstName', '$lastName', '$address', 
                $provinceId, $districtId, '$subdistrictId',$limitPledge,$idBank,$account_number)";

        $conn->query($sql);
        $last_id = $conn->insert_id;

       // $last_id = $conn->insert_id;
        require("connection_close.php");
        return  $last_id;
    }

    public static function get($idfarmer) {
        require("connection_connect.php");
        $sql = "SELECT * FROM farmer NATURAL JOIN Bank NATURAL JOIN province INNER JOIN district on district.districtId = farmer.districtId INNER JOIN subdistrict on subdistrict.subdistrictId= farmer.subdistrictId where farmer.idfarmer = '$idfarmer';";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        require("connection_close.php");

        return new Farmer(
            $row['idfarmer'],
            $row['firstName'],
            $row['lastName'],
            $row['address'],
            $row['subdistrictId'],
            $row['districtId'],
            $row['provinceId'],
            $row['subdistrictName'],
            $row['districtName'],
            $row['provinceName'],
            $row['idBank'],
            $row['name'],
            $row['account_number'],
            $row['limitPledge'],
            $row['password'],
            $idPledge=null
        );
    }

       public static function delete($idfarmer) {
        require("connection_connect.php");
        $sql = "DELETE FROM farmer WHERE idfarmer='$idfarmer'";
        $conn->query($sql);
        require("connection_close.php");
    }

    public static function update($idfarmer, $firstName, $lastName, $address) {
        require("connection_connect.php");
        $sql = "UPDATE farmer SET firstName='$firstName', lastName='$lastName', address='$address' WHERE idfarmer='$idfarmer'";
        $conn->query($sql);
        require("connection_close.php");
    }

 
    public static function user_search($key) {
        $farmerList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM farmer NATURAL JOIN 
        province INNER JOIN district on 
        district.districtId = farmer.districtId 
        INNER JOIN subdistrict on subdistrict.subdistrictId= farmer.subdistrictId 
        NATURAL JOIN Bank where farmer.firstName LIKE '%$key%' 
               OR farmer.lastName LIKE '%$key%'
               OR subdistrictName LIKE '%$key%'
               OR districtName LIKE '%$key%'
               OR provinceName LIKE '%$key%';";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $farmerList[] = new Farmer(
                    $row['idfarmer'],
                    $row['firstName'],
                    $row['lastName'],
                    $row['address'],
                    $row['subdistrictId'],
                    $row['districtId'],
                    $row['provinceId'],
                    $row['subdistrictName'],
                    $row['districtName'],
                    $row['provinceName'],
                    $row['idBank'],
                    $row['name'],
                    $row['account_number'],
                    $row['limitPledge'],
                    $row['password'],
                    $idPledge=null
            );
        }
        require("connection_close.php");
        return $farmerList;  // ต้อง return
    }



 

}
?>
