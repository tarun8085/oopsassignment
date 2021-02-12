<?php
namespace Config;

/*
MySQL database confguration class. If any DB configuration changes required, do it here.
*/

class Dbconfig {
    protected $dbhost;
    protected $dbuser;
    protected $dbpass;
    protected $dbname;
    protected $charset;

    public function __construct() {
        $this->dbhost = 'localhost';
        $this->dbuser = 'root';
        $this->dbpass = '';
        $this->dbname = 'airline_db';
        $this->charset = 'utf8';
    }
}
?>