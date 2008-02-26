<?php
function b_cubeUtils_login_show($options) {
    global $xoopsUser, $xoopsConfig;
    if (!$xoopsUser) {
        $config_handler =& xoops_gethandler('config');
        $xoopsConfigUser =& $config_handler->getConfigsByDirname('user');
        $block = array();
        $block['lang_username'] = _USERNAME;
        $block['unamevalue'] = "";
        if (isset($_COOKIE[$xoopsConfig['usercookie']])) {
            $block['unamevalue'] = $_COOKIE[$xoopsConfig['usercookie']];
        }
        $block['allow_register'] = $xoopsConfigUser['allow_register'];
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
