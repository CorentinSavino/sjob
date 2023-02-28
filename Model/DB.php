<?php 
namespace App\Model;
use \PDO;

class DB{

    private $host="localhost";
    private $dbname="sjob";
    private $port="3306";
    private $dbh;

    function __construct()
    {  $dsn= "mysql:host=".$this->host.";dbname=".$this->dbname.";port=".$this->port.";charset=UTF8";
        $this->dbh= new PDO($dsn, "root", "");
    }

    public function getDbh(){
        return $this->dbh;
    }
}

?>