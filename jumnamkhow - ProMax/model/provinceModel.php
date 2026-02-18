<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Province {
    public $provinceId;
    public $provinceName;

    public function __construct($provinceId, $provinceName) {
        $this->provinceId = $provinceId;
        $this->provinceName = $provinceName;
    }

    public static function getAll() {
        $provinceList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM province";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $provinceList[] = new Province(
                $row['provinceId'],
                $row['provinceName']
            );
        }

        require("connection_close.php");
        return $provinceList;  // ต้อง return
    }
 }
?>
