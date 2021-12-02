<?php
//namespace Lmm\Database;
//
//use PDO;
//use PDOException;

define("DB_HOST", "localhost");
define("DB_NAME", "lebolma");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");

class Database
{
    private $db;

    /**
     * @return PDO
     */
    public function getDb(): PDO
    {
        return $this->db;
    }

    public function __construct()
    {
        try
        {
            $this->db = new PDO("mysql:host=".DB_HOST.";dbname=" .DB_NAME, DB_USERNAME, DB_PASSWORD);
            $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
}