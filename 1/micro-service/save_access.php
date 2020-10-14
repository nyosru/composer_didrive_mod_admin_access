<?php

if (isset($skip_start) && $skip_start === true) {
    
} else {
    require_once '0start.php';
}

// table
// s = $in['table'] . '-' . $in['pole'] . '-' . $in['item_id'] . '-' . $in['value']

try {

    $in = $_REQUEST;
    // \f\end2('234', false, $in);

    if (\Nyos\Nyos::checkSecret($in['s'], $in['id']) !== false) {

        // \Nyos\mod\AdminAccess::setModerAccess($db, \Nyos\Nyos::$folder_now , $in['id'], $in['mod']);
        \Nyos\mod\AdminAccess::setModerAccess($db, $in['id'], $in['mod']);
        \f\end2('ранее имеющиеся доступы удалены и добавлены отмеченные, специалист может заходить');

        \f\end2('сохранено', true, $in);
    } else {

        \f\end2('что то не так', false, $in);
    }


} catch (\PDOException $exc) {

    \f\end2('не окей', false, $exc);
    
} catch (\Exception $exc) {

    \f\end2('не окей', false, $exc);
}

\f\end2('что то пошло не так #' . __LINE__, false, $in);
