
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//require_once('models/farmerModel.php');
#checked
 class RedemptionController
 {
    public function addRedemption()//=======================
    { 
        //$idBank = $_POST['Bank_idBank'];
        
        $farmerId = $_POST['farmer_idfarmer'];
        $idPledge = $_POST['Pledge_idPledge'];
        $quantityKg = $_POST['quantityKg'];

        $farmer = Farmer::get($farmerId);
        $idBank= $farmer->idBank;
        $success = Redemption::add($farmerId, $idBank, $idPledge, $quantityKg);
        
         if ($success) {
         //อยู่หน้าเดิมหลังบันทึก
         //header("Location: ?controller=redemption&action=toRedemPage&idfarmer=$farmerId");
            header("Location: " . $_SERVER['HTTP_REFERER']);
         // if (isset($_SERVER['HTTP_REFERER'])) {
            //     header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        echo "บันทึกไม่สำเร็จ!"; //+++++++++++++++++++++++++++++++++++++++++ถอนได้แต่ขึ้นว่าไม่สำเร็จ
    }
    
        //ไปหน้าเดิมอะแหละ

    }//============================

    public function toRedemPage()
    {
        //จาก <a href="?controller=redemption&action=toRedemPage" class="btn btn-primary" role="button">
        $idfarmer = $_GET['idfarmer'] ?? null; //ไม่แน่ใจ
        $idpledge = $_GET['idpledge'] ?? null;
        echo "idpledge".$idpledge;
        $remain = $this->wantRedeem($idfarmer); // จำนวนที่เหลือแสดงเลย

        $bank_list = Bank::getAll();
        $pledge_list = Pledge::getAll();//================
        $history_list = Redemption::getHistory($idfarmer);
        require("views/redemption/redemPage.php");
    }
    

    public function getAllRedeemed1($idfarmer)
    {
        require("connection_connect.php");
        $sql = "select sum(redemption.quantityKg) as sum from redemption where farmer_idfarmer = '$idfarmer' GROUP by farmer_idfarmer,Pledge_idPledge ";
        $result = $conn->query($sql);

        $redeem = 0; // เผื่อกรณีไม่มีข้อมูล
        if ($result && $row = $result->fetch_assoc()) {
            $redeem = $row['sum'];
        }

        require("connection_close.php");
        return $redeem;
    }

    public function getLimitRedem($idfarmer)
    {
        require("connection_connect.php");
        $sql = "select TotalWeight from pledge where farmer_idfarmer = '$idfarmer' ";
        $result = $conn->query($sql);

        $limitRedeem = 0;
        if ($result && $row = $result->fetch_assoc()) {
            $limitRedeem = $row['TotalWeight'];
        }

        require("connection_close.php");
        return $limitRedeem;
    }

    public function wantRedeem($idfarmer)
    {
        //$idfarmer = $_POST['idfarmer'];
        $limitRedeem = $this->getLimitRedem($idfarmer);
        $redeem = $this->getAllRedeemed1($idfarmer);
        $remain = $limitRedeem-$redeem;

        if ($remain<=0) {
            return 0;
        }
        else
            return $remain;
    }//=======================ต่อรับค่าจะถอน
 }
 ?>