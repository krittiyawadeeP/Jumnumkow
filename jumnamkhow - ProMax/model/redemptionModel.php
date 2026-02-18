<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Redemption{
public $idRedemption;
public $farmer_idfarmer;
public $Bank_idBank;
public $Pledge_idPledge;
public $RedemptionDate;
public $ApprovedDate;
public $quantityKg;

 public function __construct(
    $idRedemption,
    $farmer_idfarmer,
    $Bank_idBank,
    $Pledge_idPledge,
    $RedemptionDate,
    $ApprovedDate,
    $quantityKg
)
{
    $this->idRedemption = $idRedemption;
    $this->farmer_idfarmer = $farmer_idfarmer;
    $this->Bank_idBank = $Bank_idBank;
    $this->Pledge_idPledge = $Pledge_idPledge;
    $this->RedemptionDate = $RedemptionDate;
    $this->ApprovedDate = $ApprovedDate;
    $this->quantityKg = $quantityKg;
}

  public static function add($farmerId, $idBank, $idPledge, $quantityKg)
    {
        require("connection_connect.php");

        $date = date("Y-m-d");
        $sql = "INSERT INTO redemption (farmer_idfarmer, Bank_idBank, Pledge_idPledge,RedemptionDate,quantityKg)
                VALUES  ('$farmerId', '$idBank', '$idPledge', '$date', '$quantityKg')";
        $result = $conn->query($sql);
        require("connection_close.php");
        return 1;
    }

    public static function getHistory($idfarmer)
    {
        require("connection_connect.php");
        $sql = "SELECT * from redemption WHERE redemption.farmer_idfarmer ='$idfarmer';";
        $result = $conn->query($sql);
        $historyList = []; 
        

        while ($row = $result->fetch_assoc()) {
    $historyList[] = new Redemption(
        $row['idRedemption'],
        $row['farmer_idfarmer'],
        $row['Bank_idBank'],
        $row['Pledge_idPledge'],
        $row['RedemptionDate'],
         $row['ApprovedDate'],
        $row['quantityKg']

        );
    }
    require("connection_close.php");
        return $historyList;  // ต้อง return

}
}

?>