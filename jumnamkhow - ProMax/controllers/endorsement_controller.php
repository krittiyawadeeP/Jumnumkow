
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//require_once('models/farmerModel.php');
#checked
 class EndorsementController
 {


       public function toEndorsementPage()
    {
        //จาก <a href="?controller=redemption&action=toRedemPage" class="btn btn-primary" role="button">
        $idfarmer = $_GET['idfarmer'] ?? null; //ไม่แน่ใจ
        $remain = $this->youCanEndosTo($idfarmer); // จำนวนที่เหลือแสดงเลย

        $farmerListinSameadress = [];
        if($remain > 0)
        {
            $farmerListinSameadress = Farmer::getEndoserSameaddress($idfarmer);   
        }
        require("views/endosement/endosePage.php");
        
    }



    public function addEndosement()//=======================
    { 
        //$idBank = $_POST['Bank_idBank'];
        // $idfarmer = $_GET['idfarmer']; 
        $idfarmer = $_POST['farmer_idfarmer'] ?? null;           // ถ้าส่งมาจากลิงก์ก่อนหน้า
        $idfarmerEndose = $_POST['idfarmerEndose'] ?? null; // รับจากปุ่มลิงก์
    
        $success = Endorsement::add($idfarmer, $idfarmerEndose);
            
        if ($success) {
        echo "<script>
                alert('บันทึกสำเร็จ ✅');
                window.location.href='?controller=endorsement&action=toEndorsementPage&idfarmer=$idfarmer';
              </script>";
    }
    }//============================

 
    

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

    public function youCanEndosTo($idfarmer)
    {
        //$idfarmer = $_POST['idfarmer'];
        $endosed = $this->endosed($idfarmer);
        $remain=5-$endosed;
        return $remain;
            
    }//=======================ต่อรับค่าจะถอน

    public function endosed($idfarmer)
    {
        $endosed = Endorsement::getEndosed($idfarmer);
        return $endosed;
    }
 }
 ?>