<?php
// 
function getInterests($id) {
    $db = DB::exe("SELECT * FROM cms_interests WHERE active = :active",array('active'=>$id));
    if (isset($db)) {
        foreach ($db as $r) {
            return $r['content'];
        }
    } else {
        return null;
    }
}
// getData('cms_education','eduID',1);
function getData($table,$id,$active) {
    $db = DB::exe("SELECT * FROM $table WHERE active = :active ORDER BY $id DESC",array('active'=>$active));
    if (isset($db)) {
        foreach ($db as $r) {
            return $str;
        }
    } else {
        return null;
    }
}
//
function getProjectEnd($id) {
    $db = DB::exe("SELECT * FROM cms_projects WHERE id = :id AND active = :active ORDER BY proID DESC",array('id'=>$id,'active'=>'1'));
    if (isset($db)) {
        foreach ($db as $r) {
            if (!empty($r['end'])) {
                return $str = '<strong>'.getDateMonthYear($r['end']).'</strong>';
            } else {
                return $str = '<strong>aktuell</strong>';
            }
        }
    } else {
        return null;
    }
}
//
function getExternPath($id) {
    $db = DB::exe("SELECT * FROM cms_projects WHERE id = :id AND active = :active",array('id'=>$id,'active'=>'1'));
    if (isset($db)) {
        foreach ($db as $r) {
            if (empty($r['end'])) {
                $str = '<i class="fas fa-external-link-alt text-info"></i>';
            } else {
                $str = '<i class="fas fa-times text-warning"></i>';
            }
            return $str;
        }
    } else {
        return null;
    }
}
//
function getExternLink($id) {
    $db = DB::exe("SELECT * FROM cms_projects WHERE id = :id AND active = :active",array('id'=>$id,'active'=>'1'));
    if (isset($db)) {
        foreach ($db as $r) {
            if (empty($r['end'])) {
                $str = '<a href="'.$r['url'].'" target="_blank">'.$r['url'].'</a>';
            } else {
                $str = '<span>'.$r['url'].'</span>';
            }
            return $str;
        }
    } else {
        return null;
    }
}