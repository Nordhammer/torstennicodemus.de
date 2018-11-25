<?php

/* TEMPLATE PATH */
define('TEMPLATE_PATH','../template/views/fe/');
define('RESOURCE_PATH','../resource/views/fe/');
define('TEMPLATE_PATH_ADMIN','../template/views/admin/');
define('RESOURCE_PATH_ADMIN','../resource/views/admin/');
define('CONFIG_PATH','../config/');

/* RANKS */
define('BLOCKED_RANK','gesperrt');
define('BANNED_RANK','gebannt');
define('USER_RANK','user');
define('MOD_RANK','moderator');
define('ADMIN_RANK','administrator');

/* CONFIG */
define('NATIVE_LANGUAGE','de');
include_once 'config/database.php';
include_once 'config/password.php';

/* CLASS */
include_once 'class/database.php';
include_once 'class/template.php';
include_once 'class/breadcrumb.php';
include_once 'class/pagination.php';
include_once 'class/thumbnail.php';

/* FUNCTION */
include_once 'function/global.php';
include_once 'function/function.php';

/* ROUTES */
include_once 'routes/web.php';