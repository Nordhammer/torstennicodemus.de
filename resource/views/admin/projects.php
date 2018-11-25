<?php
if (isset($_POST['write_project'])) {
    $err = false;
    $_SESSION['hint'] = '';
    $_SESSION['msg'] = '';
    $topic = '';
    $url = '';
    $content = '';
    $version = '';
    $active = '';
    $topic = inputTrim($_POST['topic']);
    $url = inputTrim($_POST['url']);
    $content = inputTrim($_POST['content']);
    $version = inputTrim($_POST['version']);
    $active = inputTrim($_POST['active']);
    if (empty($topic)) $err = true;
    if (empty($url)) $err = true;
    if (empty($content)) $err = true;
    if (empty($version)) $err = true;
    if (empty($active)) $err = true;
    if ($err === true) {
        $_SESSION['hint'] = 'warning';
        $_SESSION['msg'] = 'Alle Felder müssen ausgefüllt werden';
    }
    if ($err === false) {
        DB::exe('INSERT INTO `cms_projects` (`topic`,`url`,`content`,`version`,`active`,`userID`,`userIP`,`created`) values (:topic,:url,:content,:version,:active,:userID,:userIP,:created);',
        array('topic'=>$topic,'url'=>$url,'content'=>$content,'version'=>$version,'active'=>$active,'userID'=>$_SESSION['id'],'userIP'=>$_SERVER['REMOTE_ADDR'],'created'=>time()));
    }
}
if (isset($_POST['edit_project'])) {
    $err = false;
    $_SESSION['hint'] = '';
    $_SESSION['msg'] = '';
    $topic = '';
    $url = '';
    $content = '';
    $version = '';
    $active = '';
    $end = '';
    $order_by = '';
    $topic = inputTrim($_POST['topic']);
    $url = inputTrim($_POST['url']);
    $content = inputTrim($_POST['content']);
    $version = inputTrim($_POST['version']);
    $active = inputTrim($_POST['active']);
    $end = inputTrim($_POST['end']);
    $order_by = inputTrim($_POST['order_by']);
    if (empty($topic)) $err = true;
    if (empty($url)) $err = true;
    if (empty($content)) $err = true;
    if (empty($version)) $err = true;
    if (empty($active)) $err = true;
    if (empty($end)) $err = true;
    if (empty($order_by)) $err = true;
    if ($err === true) {
        $_SESSION['hint'] = 'warning';
        $_SESSION['msg'] = 'Alle Felder müssen ausgefüllt werden';
    }
    if ($err === false) {
        DB::exe("UPDATE cms_projects SET topic = :topic,
                                         url = :url,
                                         content = :content,
                                         version = :version,
                                         active = :active,
                                         end = :end,
                                         order_by = :order_by,
                                         ip = :ip,
                                         edit = :edit WHERE id = :id",array('id'=>$_SESSION['edit_pro'],
                                                                            'topic'=>clearContent($topic),
                                                                            'url'=>clearContent($url),
                                                                            'content'=>clearContent($content),
                                                                            'version'=>clearContent($version),
                                                                            'active'=>clearContent($active),
                                                                            'end'=>clearContent($end),
                                                                            'order_by'=>clearContent($order_by),
                                                                            'ip'=>$_SERVER['REMOTE_ADDR'],
                                                                            'edit'=>time()));                
        $_SESSION['hint'] = 'success';
        $_SESSION['msg'] = 'Projekte erfolgreich bearbeitet';
    } else {
        $_SESSION['hint'] = 'danger';
        $_SESSION['msg'] = 'Es ist ein Fehler aufgetreten';
    }
}
if (isset($_POST['delete_project'])) {
    DB::exe("DELETE FROM cms_projects WHERE proID = :id",array('id'=>$_POST['proID']));
    $_SESSION['hint'] = 'success';
    $_SESSION['msg'] = 'Projekte erfolgreich gelöscht';
}