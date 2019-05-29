<?php

require_once dir_serv_module . 'lk/class.php';

//\f\pa($_POST);

if (isset($_POST['add_login'])) {

    $in = [];
    $in['login'] = (string) trim($_POST['add_login']['login']);
    $in['pass5'] = md5($_POST['add_login']['pass']);
    //$in['folder'] = (string) $vv['folder'];

    if( isset($_POST['add_login']['mail']{3}) )
    $in['mail'] = (string) $_POST['add_login']['mail'];

//  'login', 'pass', 'pass5',
//            'folder', 'mail',
//            'name', 'soname', 'family',
//            'phone',
//            'avatar', 'adres', 'about', 'soc_web',
//            'soc_web_id', 'soc_web_link', 'ip', 'city',
//            'city_name', 'points', 'country', 'recovery',
//            'recovery_dt', 'dt'    

    $res = \Nyos\Mod\Lk::addUser($db, $in, $vv['folder'].'_di');
    
    if( isset($res{0}) && is_numeric($res) ){
        $vv['warn'] = 'Доступ добавлен, логин - ['.$in['login'].']';
    }
}




// $vv['tpl_body'] = didr_tpl . 'body.htm';
$vv['tpl_body'] = dir_serv_mod_ver_didr_tpl . 'body.htm';
