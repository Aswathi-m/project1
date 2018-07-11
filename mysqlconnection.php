<?php
class mysqlconnection
{
    private $servername;
    private $username;
    private $password;
    private $database;
    public  $mysqli;

    public function __construct()
    {
        $this->mysqlconnect();
    }
    private function mysqlconnect()
    {
        $this->servername="localhost";
        $this->username="root";
        $this->password="root";
        $this->database="student";
        $this->connectionstring =new mysqli($this->servername,$this->username,$this->password,$this->database);
        return $this->connectionstring;
     }
    function selectdata($sql)
    {
        $result=$this->connectionstring->query($sql);
        return $result;
    }
    function modify($sql)
    {
        $success=$this->connectionstring->query($sql);
        return $success;
    }
}
?>
