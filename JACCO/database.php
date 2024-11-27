<?php
class database {
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "uasb7";
    
    public function connect() {
        return new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
    }
}
?>

