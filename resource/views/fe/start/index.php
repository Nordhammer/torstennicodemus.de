<?php
// datei für das login laden
include_once RESOURCE_PATH.'anmeldung/index.php';
// dateien für die administration laden
if (isAdmin() == true) {
    include_once RESOURCE_PATH_ADMIN.'about_me.php';
    include_once RESOURCE_PATH_ADMIN.'projects.php';
}
$template = new Template(TEMPLATE_PATH.'start/index.blade.php');
// menu
$template->assign('config.publisher',getConfig('publisher'));
$template->assign('menu.ueber_mich',getLang('menu.ueber_mich'));
$template->assign('menu.projekte',getLang('menu.projekte'));
$template->assign('menu.bildung',getLang('menu.bildung'));
$template->assign('menu.faehigkeiten',getLang('menu.faehigkeiten'));
$template->assign('menu.interessen',getLang('menu.interessen'));
$template->assign('menu.kontakt',getLang('menu.kontakt'));
// anmeldung
$$log = '';
if (isset($_SESSION['id'])) {
    // angemeldet
    $tpl = new Template(TEMPLATE_PATH.'anmeldung/login.blade.php');
    $tpl->assign('login.path','/abmelden');
    $tpl->assign('login.abmelden',getLang('login.abmelden'));
    $log .= $tpl->show();
} else {
    // abgemeldet
    $tpl = new Template(TEMPLATE_PATH.'anmeldung/logout.blade.php');
    $tpl->assign('logout.name',getLang('logout.name'));
    $tpl->assign('logout.kennwort',getLang('logout.kennwort'));
    $tpl->assign('logout.anmelden',getLang('logout.anmelden'));
    $log .= $tpl->show();
}
$template->assign('tpl.anmeldung',$log);
// about me
$edit_about_me = '';
$db = DB::exe("SELECT * FROM cms_about_me WHERE id = :id",array('id'=>1));
if (isset($db)) {
    foreach ($db as $r) {
        $template->assign('about.firstname',$r['firstname']);
        $template->assign('about.lastname',$r['lastname']);
        $template->assign('about.street',$r['street']);
        $template->assign('about.nr',$r['nr']);
        $template->assign('about.code',$r['code']);
        $template->assign('about.city',$r['city']);
        $template->assign('about.country',$r['country']);
        $template->assign('about.phone',$r['phone']);
        $template->assign('about.mail',$r['mail']);
        $template->assign('about.content',makeUp($r['content']));
    }
}
if (isAdmin() == true) {
    $edit_about_me = '<a class="float-right" href="" title="'.getLang('about_me.edit_about_me').'" data-toggle="modal" data-target="#edit_about_me"><i class="far fa-edit"></i></a>';
}
$template->assign('btn_edit_about_me',$edit_about_me);
// projects
$write_project = '';
$edit_project = '';
$delete_project = '';
$db = DB::exe("SELECT * FROM cms_projects WHERE active = :active ORDER BY order_by DESC",array('active'=>1));
if (isset($db)) {
    $pro ='';
    foreach ($db as $r) {
        $tpl = new Template(TEMPLATE_PATH.'start/projekte.blade.php');
        $tpl->assign('project.proID',$r['id']);
        $tpl->assign('project.topic',$r['topic']);
        $tpl->assign('project.path',getExternPath($r['id']));
        $tpl->assign('project.url',getExternLink($r['id']));
        $tpl->assign('project.content',$r['content']);
        $tpl->assign('project.version',getLang('projekte.aktuelle_version').' '.$r['version']);
        $tpl->assign('project.end',getProjectEnd($r['id']));
        $tpl->assign('project.created',getDateMonthYear($r['created']));
        if (isAdmin() == true) {
            $write_project = '<a class="float-right" href="" title="'.getLang('project.write_new_project').'" data-toggle="modal" data-target="#write_project"><i class="fas fa-pen"></i></a>';
            $edit_project = '<a class="float-right" href="" title="'.getLang('project.edit_project').'" data-toggle="modal" data-target="#edit_project"><i class="far fa-edit"></i></a>';
            $delete_project = '<a class="float-right" href="" title="'.getLang('project.delete_project').'" data-toggle="modal" data-target="#delete_project"><i class="fas fa-trash-alt"></i></a>';
        }
        $pro .= $tpl->show();
    }
}
$template->assign('tpl.projekte',$pro);
$template->assign('btn_write_project',$write_project);
$template->assign('btn_edit_project',$edit_project);
$template->assign('btn_delete_project',$delete_project);
































// edit
$ueber_mich = '';
$projekte = '';
$skills = '';
$interessen = '';
$kontakt = '';
if (isAdmin() == true) {
    $ueber_mich = '<a class="float-right" href="" title="Sektion bearbeiten ..." data-toggle="modal" data-target="#about_modal"><i class="far fa-edit"></i></a>';
    $write_project = '<a class="float-right" href="" title="###" data-toggle="modal" data-target="#projekte_modal"><i class="far fa-edit"></i></a>';
    $skills = '<a class="float-right" href="" title="###" data-toggle="modal" data-target="#skills_modal"><i class="far fa-edit"></i></a>';
    $interessen = '<a class="float-right" href="" title="###" data-toggle="modal" data-target="#interessen_modal"><i class="far fa-edit"></i></a>';
    $kontakt = '<a class="float-right" href="" title="###" data-toggle="modal" data-target="#kontakt_modal"><i class="far fa-edit"></i></a>';
}


$template->assign('login.btn_edit_ueber_mich',$ueber_mich);
$template->assign('login.btn_edit_skills',$skills);
$template->assign('login.btn_edit_interessen',$interessen);
$template->assign('login.btn_edit_kontakt',$kontakt);






// fähigkeiten
$template->assign('faehigkeiten.programm_tools',getLang('skills.programm_tools'));
$db = DB::exe("SELECT * FROM cms_skills_icons WHERE active = :active ORDER BY order_by ASC",array('active'=>1));
if (isset($db)) {
    $ico = '';
    foreach ($db as $r) {
        $tpl = new Template(TEMPLATE_PATH.'start/skills_icons.blade.php');
        $tpl->assign('skills.icon',$r['icon']);
        $ico .= $tpl->show();
    }
}
$template->assign('tpl.skills_icons',$ico);
$template->assign('faehigkeiten.arbeitsweise',getLang('skills.arbeitsweise'));
$db = DB::exe("SELECT * FROM cms_skills_working WHERE active = :active ORDER BY order_by ASC",array('active'=>1));
if (isset($db)) {
    $wor = '';
    foreach ($db as $r) {
        $tpl = new Template(TEMPLATE_PATH.'start/skills_working.blade.php');
        $tpl->assign('skills.work',getLang($r['working']));
        $wor .= $tpl->show();
    }
}
$template->assign('tpl.skills_working',$wor);

// interessen
$template->assign('content.interessen',getInterests('1'));

echo $template->show();