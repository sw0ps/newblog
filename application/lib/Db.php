<?php

namespace Application\Lib;

use \PDO;

class Db
{
    protected $db;

    public function __construct() {
        $config = require "application/config/db.php";
        $this->db = new PDO("{$config['db']}:host={$config['host']};dbname={$config['dbname']}", $config["user"], $config["password"]);
    }

    public function query($sql, $params = []) {
        $statement = $this->db->prepare($sql);
        if(!empty($params) ) {
            foreach ($params as $key => $value) {
                $statement->bindValue(":{$key}", $value);
            }
        }
        $statement->execute();
        return $statement;
    }

    public function row($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }
}