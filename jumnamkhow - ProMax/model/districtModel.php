<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class District {
    public $provinceId;
    public $districtId;
    public $districtName;

    public function __construct($provinceId, $districtId,$districtName) {
        $this->provinceId = $provinceId;
        $this->districtId = $districtId;
        $this->districtName = $districtName;
    }

    
    public static function getByProvinceId($provinceId) {
        $getByProvinceIdList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM district where provinceId = '$provinceId'";
        $result = $conn->query($sql);        

              while ($row = $result->fetch_assoc()) {
            $getByProvinceIdList[] = new District(
                $row['provinceId'],
                $row['districtId'],
                $row['districtName']
            );
        }

        require("connection_close.php");
        return $getByProvinceIdList; 
    }
}
?>
