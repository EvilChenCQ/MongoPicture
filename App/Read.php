<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/17
 * Time: 18:41
 */

namespace App;
//use App\Thumb;
class Read extends Common{
    public $collection;

    public function __construct(){
        parent::__construct();
        $this->collection = $this->collection();
    }

    public function readFile($data = array()){
        if(empty($data)){
            return false;
        }

        if(isset($data['md5'])){
            $md5 = $data['md5'];
            //索引图片文件
            $image = $this->collection->findOne(array('md5' => $md5));
            // 设定文档类型，显示图片
            $img_bytes = $image->getBytes();
            header('Content-type: image/png'); // 输出图片头
            echo $img_bytes;
        }
    }

    public function readAllFiles(){
        $cursor = $this->collection->find();
        foreach ($cursor as $obj) :
            echo '<p><a href="?type=read&md5=' . $obj->file['md5'] . '&w=800"><img src="?type=read&md5=' . $obj->file['md5'] . '" border="0" /></a><a href="?type=del&md5=' . $obj->file['md5'] . '">删除</a></p>';
        endforeach;
    }
} 