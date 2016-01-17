<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/17
 * Time: 16:40
 */
namespace App;
class Save extends Common{

    public $collection;

    public function __construct(){
        parent::__construct();
        $this->collection = $this->collection();
    }

    public function saveFile($file = array()){
        if(empty($file)){
            return false;
        }
        $size = $file['size'];
        $md5 = md5_file($file['tmp_name']);
        $exists = $this->collection->findOne(array('md5' => $md5,'length' => $size),array('md5'));
        if(empty($exists)){
            $file_name = $file['name'];
            $file_type = $file['type'];
            $file_path = file_get_contents($file['tmp_name']);
            $this->collection->storeBytes($file_path,array('md5' => $md5,'length' => $size,'filename' => $file_name,'filetype' => $file_type));
        }else{
            unlink($file['tmp_name']);
        }
        echo "<font color=red>http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}?type=read&md5={$md5}</font>";
    }
} 