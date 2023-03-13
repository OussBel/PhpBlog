<?php

namespace Core;
use App\Config;
use PDO;

class DatabaseConnection {

    /**
     * Connect to the database if it is not already connected
     *
     * @return PDO database object
     */

    protected  ? PDO $db = null;

    public function __construct() {

        $db = new PDO('mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';
            charset=utf8', Config::DB_USER, Config::DB_PASSWORD);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->db = $db;
    }

}