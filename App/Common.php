<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/17
 * Time: 16:40
 */

namespace App;
class Common {

    public $conn;
    public $db;
    public $collection;
    public $config = array('host' => '127.0.0.1:27017','db' => 'photos');

    public function __construct(){
        $this->conn = new \Mongo();
    }

    public function db(){
        if(!$this->db){
            $db = $this->config['db'];
            $this->db = $this->conn->$db;
        }
        return $this->db;
    }

    public function collection(){
        if(!$this->collection){
            $this->db = $this->db();
            $this->collection = $this->db->getGridFS();
        }
        return $this->collection;
    }
} 