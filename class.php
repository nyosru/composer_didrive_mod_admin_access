<?php

/**
  класс модуля
 * */

namespace Nyos\mod;

//if (!defined('IN_NYOS_PROJECT'))
//    throw new \Exception('Сработала защита от розовых ха+1керов, обратитесь к администрратору');

class AdminAccess {

    //public static $dir_img_server = false;

    public static function setModerAccess($db, int $user, $module_list = []) {
        
        $folder = \Nyos\nyos::$folder_now;
        
        $sql = 'DELETE FROM `gm_user_di_mod` WHERE `folder` = :folder AND `user_id` = :user ';
        // \f\pa($sql);
        $ff = $db->prepare($sql);
        $i = array(':folder' => $folder, ':user' => $user);
        // \f\pa($i);
        $ff->execute($i);
        
        $rows = [];

        foreach ($module_list as $k => $v) {
            $rows[] = array('module' => $k);
        }

        \f\db\sql_insert_mnogo($db, 'gm_user_di_mod', $rows, array( 'folder' => $folder, 'user_id' => $user, 'mode' => 'moder', 'status' => 'yes' ) );
        
    }

    public static function getModerAccess($db, string $folder, int $user) {

        $ff = $db->prepare('SELECT * FROM `gm_user_di_mod` WHERE `folder` = :folder AND `user_id` = :user ');
        $ff->execute(array(':folder' => $folder, ':user' => $user));
        return $ff->fetch();

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
