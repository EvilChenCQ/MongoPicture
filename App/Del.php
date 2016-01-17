<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/17
 * Time: 19:02
 */

namespace App;


class Del extends Common{

    public $collection;

    public function __construct(){
        parent::__construct();
        $this->collection = $this->collection();
    }

    public function delFile($data = array()){
        if(empty($data)){
            return false;
        }
        $this->collection->remove(array('md5' => $data['md5']));
    }
} 