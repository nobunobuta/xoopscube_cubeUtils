<?php
function b_cubeUtils_login_show($options) {
    global $xoopsUser;
    if (!$xoopsUser) {
        $config_handler =& xoops_gethandler('config');
        $moduleConfigUser =& $config_handler->getConfigsByDirname('user');
        $block = array();
        $block['lang_username'] = _USERNAME;
        $block['unamevalue'] = "";
        if (isset($_COOKIE[$moduleConfigUser['usercookie']])) {
            $block['unamevalue'] = $_COOKIE[$moduleConfigUser['usercookie']];
        }
        $block['allow_register'] = $moduleConfigUser['allow_register'];
        $block['lang_password'] = _PASSWORD;
        $block['lang_login'] = _LOGIN;
        $block['lang_lostpass'] = _MB_CUBE_UTILS_LPASS;
        $block['lang_registernow'] = _MB_CUBE_UTILS_RNOW;
        $block['lang_rememberme'] = _MB_CUBE_UTILS_REMEMBERME;
        return $block;
    }
    return false;
}
?>
