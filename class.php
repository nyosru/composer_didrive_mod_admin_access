<?php

/**
  класс модуля
 * */

namespace Nyos\mod;

if (!defined('IN_NYOS_PROJECT'))
    throw new \Exception('Сработала защита от розовых ха+1керов, обратитесь к администрратору');

class AdminAccess {

    //public static $dir_img_server = false;

    public static function setModerAccess($db, string $folder, int $user, $module_list = []) {

        $ff = $db->prepare('DELETE FROM `gm_user_di_mod` WHERE `folder` = :folder AND `user_id` = :user ');
        $ff->execute(array(':folder' => $folder, ':user' => $user));

        $rows = [];

        foreach ($module_list as $k => $v) {
            $rows[] = array('module' => $k);
        }

        \f\db\sql_insert_mnogo($db, 'gm_user_di_mod', $rows, array('folder' => $folder, 'user_id' => $user, 'mode' => 'moder'));
    }

    public static function getModerAccess($db, $folder = null, $user = null) {

        if ($folder === null)
            $folder = \Nyos\Nyos::$folder_now;

        if (empty($user)) {

            $ff = $db->prepare('SELECT * FROM `gm_user_di_mod` WHERE `folder` = :folder ');
            $ff->execute(array(':folder' => $folder ) );
            $e = $ff->fetchAll();

            $return = [];

            foreach ($e as $k => $v) {
                if (isset($v['module'])) {
                    $return[$v['user_id']][$v['module']] = $v;
                }
            }
            
        } else {

            $ff = $db->prepare('SELECT * FROM `gm_user_di_mod` WHERE `folder` = :folder AND `user_id` = :user ');
            $ff->execute(array(':folder' => $folder, ':user' => $user));
            $e = $ff->fetchAll();

            $return = [];

            foreach ($e as $k => $v) {
                if (isset($v['module'])) {
                    $return[$v['module']] = $v;
                }
            }

        }
        //\f\pa($_SESSION);

        return $return;
    }

//    
//    public static function putInLog($db, $folder, $domain, $from, $to, $head, $message, $vars = array()) {
//
//        \f\db\db2_insert($db, 'gm_mail', array(
//            'folder' => $folder,
//            'domain' => $domain,
//            'from' => $from,
//            'to' => $to,
//            'head' => $head,
//            'message' => $messsage,
//            'array_var' => serialize($vars),
//            'd' => 'NOW',
//            't' => 'NOW'
//        ));
//        
//        
//        
//    }
//    
}
