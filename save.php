<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/17
 * Time: 15:52
 */
    define('BASEDIR',__DIR__);
    include BASEDIR.'/App/Loader.php';
    spl_autoload_register('\\App\\Loader::autoload');

    $type = $_GET['type'];
    switch($type){
        case 'save':
            $save = new \App\Save();
            $save->saveFile($_FILES['file']);
            break;
        case 'read':
            $read = new \App\Read();
            $read->readFile($_GET);
            break;
        case 'del':
            $del = new \App\Del();
            $del->delFile($_GET);
            break;
        case 'all':
            $read = new \App\Read();
            $read->readAllFiles();
            break;
    }

