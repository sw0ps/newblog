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
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                if (is_int($val)) {
                    $type = PDO::PARAM_INT;
                } else {
                    $type = PDO::PARAM_STR;
                }
                $statement->bindValue(':'.$key, $val, $type);
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

    public function lastInsertId() {
        return $this->db->lastInsertId();
    }
}