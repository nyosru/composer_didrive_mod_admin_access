<?php

// echo '<br/>'.__FILE__.' ['.__LINE__.']';

if (isset($_POST['add_login'])) {

    $in = [];
    $in['login'] = (string) trim($_POST['add_login']['login']);
    $in['pass5'] = md5($_POST['add_login']['pass']);
    //$in['folder'] = (string) $vv['folder'];

    if (isset($_POST['add_login']['mail']{3}))
        $in['mail'] = (string) $_POST['add_login']['mail'];

    $res = \Nyos\Mod\Lk::addUser($db, $in, $vv['folder'] . '_di', 'didrive');

    if (isset($res{0}) && is_numeric($res)) {
        $vv['warn'] = 'Доступ добавлен, логин - [' . $in['login'] . ']';
    }
} elseif (isset($_POST['set_new_pass']{0})) {

    if (!empty($_POST['id']) && !empty($_POST['s']) && \Nyos\Nyos::checkSecret($_POST['s'], $_POST['id']) !== false) {

        $in = ['pass' => $_POST['pass']];

        \Nyos\Mod\Lk::editAccount($db, $_POST['id'], $in);

//        echo '<div style="padding-left: 150px; padding-top: 150px;" >';
//        \f\pa($res,'','$res');
//        echo '</div>';
//        if (isset($res{0}) && is_numeric($res)) {
        $vv['warn'] = 'Пароль изменён';
//        }
    } else {
        $vv['warn'] = 'Что то пошло не так, ошибка #' . __LINE__;
    }
}


// \f\pa($_POST);

$vv['krohi'] = [];
$vv['krohi'][1] = array(
    'text' => $vv['now_level']['name'],
    'uri' => $vv['now_level']['cfg.level']
);


//echo dir_mods_mod_vers_didrive_tpl;
//echo '<br/>';
//echo dir_site_module_nowlev_tpldidr;
//echo '<br/>';
$vv['tpl_body'] = \f\like_tpl('body', dir_mods_mod_vers_didrive_tpl, dir_site_module_nowlev_tpldidr, DR);



