<?php
$template = new Template(TEMPLATE_PATH.'layout/header.blade.php');
// sprache der webseite
$template->assign('NATIVE_LANGUAGE',NATIVE_LANGUAGE);
// metadaten
$template->assign('author',getConfig('author'));
$template->assign('publisher',getConfig('publisher'));
$template->assign('copyright',getConfig('copyright'));
$template->assign('robots',getConfig('robots'));
$template->assign('domain',getConfig('domain'));
$template->assign('keywords',getConfig('keywords'));
$template->assign('description',getConfig('description'));
$template->assign('webtitle',getConfig('webtitle'));
echo $template->show();