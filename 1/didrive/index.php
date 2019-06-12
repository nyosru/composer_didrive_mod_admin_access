<?php


    if (isset($_POST['add_login'])) {

        $in = [];
        $in['login'] = (string) trim($_POST['add_login']['login']);
        $in['pass5'] = md5($_POST['add_login']['pass']);
        //$in['folder'] = (string) $vv['folder'];

        if (isset($_POST['add_login']['mail']{3}))
            $in['mail'] = (string) $_POST['add_login']['mail'];

        $res = \Nyos\Mod\Lk::addUser($db, $in, $vv['folder'] . '_di', 'didrive' );

        if (isset($res{0}) && is_numeric($res)) {
            $vv['warn'] = 'Доступ добавлен, логин - [' . $in['login'] . ']';
        }
    }


// \f\pa($_POST);

$vv['krohi'] = [];
$vv['krohi'][1] = array(
    'text' => $vv['now_level']['name'],
    'uri' => $vv['now_level']['cfg.level']
);

$vv['list_user'] = \Nyos\mod\lk::getUsers($db, $vv['folder'] . '_di');

//echo dir_mods_mod_vers_didrive_tpl;
//echo '<br/>';
//echo dir_site_module_nowlev_tpldidr;
//echo '<br/>';
$vv['tpl_body'] = \f\like_tpl('body', dir_mods_mod_vers_didrive_tpl, dir_site_module_nowlev_tpldidr, DR);



