<?php
// ตั้งค่าการแสดงข้อผิดพลาด (แนะนำให้ลบออกเมื่อขึ้น Production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Pledge
{
    public $idPledge;
    public $farmer_idfarmer;
    public $Mill_idMill;
    public $rice_idrice;
    public $TotalWeight;
    public $MoistureContent;
    public $Impurity;
    public $DepositDate;
    public $DepositEndDate;

    public function __construct(
        $idPledge,
        $farmer_idfarmer,
        $Mill_idMill,
        $rice_idrice,
        $TotalWeight,
        $MoistureContent,
        $Impurity,
        $DepositDate,
        $DepositEndDate
    )
    {
        $this->idPledge = $idPledge;
        $this->farmer_idfarmer = $farmer_idfarmer;
        $this->Mill_idMill = $Mill_idMill;
        $this->rice_idrice = $rice_idrice;
        $this->TotalWeight = $TotalWeight;
        $this->MoistureContent = $MoistureContent;
        $this->Impurity = $Impurity;
        $this->DepositDate = $DepositDate;
        $this->DepositEndDate = $DepositEndDate;
    }

    public static function getAll()
    {
        
        require("connection_connect.php");
        $pledgeList = [];
      
        $sql = "SELECT * FROM pledge";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pledgeList[] = new Pledge(
                    $row['idPledge'],
                    $row['farmer_idfarmer'],
                    $row['Mill_idMill'],
                    $row['rice_idrice'],
                    $row['TotalWeight'],
                    $row['MoistureContent'],
                    $row['Impurity'],
                    $row['DepositDate'],
                    $row['DepositEndDate']
                );
            }
        }

        require("connection_close.php");
        return $pledgeList;
    }
}