<?php
class Bank
{
    public $idBank;
    public $name;

    public function __construct($idBank, $name)
    {
        $this->idBank = $idBank;
        $this->name = $name;
    }

    public static function getAll()
    {
        $bankList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM Bank";
        $result = mysqli_query($conn, $sql);

        while ($my_row = $result->fetch_assoc()) {
            $idBank = $my_row['idBank'];
            $name = $my_row['name'];
            $bankList[] = new Bank($idBank, $name);
        }
        require("connection_close.php");
        return $bankList;
    }
}
?>
