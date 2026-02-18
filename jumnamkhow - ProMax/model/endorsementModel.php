<?php #checked
class Endorsement {
    public $endorsement_id;
    public $farmer_id;
    public $endorser_id;
    public $firstName;
    public $lastName;

    public function __construct($endorsement_id, $farmer_id, $endorser_id, $firstName, $lastName)
{
    $this->endorsement_id = $endorsement_id;
    $this->farmer_id = $farmer_id;
    $this->endorser_id = $endorser_id;
    $this->firstName = $firstName;
    $this->lastName = $lastName;
}

        public static function getEndoser($eid) {
        $farmendorser_List = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM endorsement INNER JOIN farmer on farmer.idfarmer=endorsement.endorser_id  where endorsement.farmer_id = '$eid'";
        $result = $conn->query($sql);

         while ($row = $result->fetch_assoc()) {
            $farmendorser_List[] = new Endorsement(
        $row['endorsement_id'],
        $row['farmer_id'],
        $row['endorser_id'],
        $row['firstName'],
        $row['lastName']
            );
        }

        require("connection_close.php");
        return $farmendorser_List;
    }


     public static function getEndosed($eid) {
        require("connection_connect.php");
        //$sql = "SELECT count(endorsement.farmer_id) as amount  FROM endorsement WHERE endorsement.farmer_id= '$eid';";
        $sql ="SELECT count(*) as amount  FROM endorsement WHERE endorsement.endorser_id= '$eid';";
        $result = $conn->query($sql);

        $row = $result->fetch_assoc();
        $farmendorsered = $row['amount'];
        
        require("connection_close.php");
        return $farmendorsered;
    }


     public static function add($idfarmer, $idfarmerEndose) {
         require("connection_connect.php");

        $sql = "INSERT INTO endorsement (endorsement.endorser_id,endorsement.farmer_id)  VALUES ('$idfarmer','$idfarmerEndose');";
        $result = $conn->query($sql);
        
        require("connection_close.php");
        return $result; 
    }



    


    public static function getAll()
    {
        $branchList = [];
        require("connection_connect.php");

        $sql = "SELECT * FROM branch";
        $result = $conn->query($sql);

        while ($my_row = $result->fetch_assoc()) {
            $bid = $my_row['bid'];
            $bname = $my_row['bname'];
            $branchList[] = new Branch($bid, $bname);
        }

        require("connection_close.php");
        return $branchList;
    }
}
?>
