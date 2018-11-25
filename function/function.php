<?php
// prüft ob user berechtigung für seite hat z.B. bouncer(isAdmin());
function bouncer($data) {
    if ($data == false) {
        return header('Location: http://'.getConfig('DOMAIN').'/');
    }
}
//
function isAdmin() {
    if ((!isset($_SESSION['group']))) {
        return false;
    } else if ($_SESSION['group'] == ADMIN_RANK) {
        return true;
    }
    return false;
}
// prüft den url_pfad auf richtigkeit
function params($params) {
    if (isset($params) && (int)$params > 0) {
        return $params = (int)$params;
    } else {
        return $params = '';
    }
}
// erzeugt zeilenumbrüche
function makeUp($str) {
    return nl2br($str);
}
// entfernt unerwünschte einträge wie scriptcodes
function clearContent($str) {
    return htmlspecialchars($str);
}
// wandelt den pfad um
function removeUglyChars4url($phrase) {
    // ersetzen durch
      $phrase = str_replace(array(' ', ':', '.', ';', ',', '(', ')', '[', ']', '?', '!', '`', '*', '§', ' - ', "'", '+', '!', ',', '#', '€', '@', '`'), "-",
      str_replace(array('&', '²', '³', 'ü', 'ä', 'ö', 'á', 'é'),
      array('und', '2', '3', 'ue', 'ae', 'oe', 'a', 'e'),$phrase));
    // ersetze alle Zeichen durch ...
    while (strpos($phrase, "__") !== false) $phrase = str_replace("__", "-", $phrase);
    while (strpos($phrase, "_-_") !== false) $phrase = str_replace("_-_", "-", $phrase);
    while (strpos($phrase, "--") !== false) $phrase = str_replace("--", "-", $phrase);
    $phrase = strtolower($phrase);
    return trim($phrase);
}
// string kürzen
// $str => der zu kürzende string
// $start => ab welchem zeichen gezählt wird,zB. 0
// $length => wieviele zeichen am ende abgezogen werden, zB. -2 = (, )
// strCutter($str,0,-2);
function strCutter($str,$sta,$len) {
    return substr($str,$sta,$len);
}
// 
function contentCuts($str,$sta,$len) {
    if (strlen($str) > $len) {
      return substr($str,(int)$sta,(int)$len).' ...';
    } else {
        return null;
    }
}

// gibt das geschlecht des users aus
function getUserGender($id) {
    $db = DB::exe("SELECT gender FROM cms_user WHERE userID = :id",array('id'=>$id));
    if (isset($db)) {
        foreach ($db as $r) {
            switch ($r['gender']) {
                case '0':
                $str = getLang('global.unknown');
                break;
                case '1':
                $str = getLang('global.female');
                break;
                case '2':
                $str = getLang('global.male');
                break;
                default:
                break;
            }
        }
    }
    return $str;
}
//
function getLang($data) {
    return @(include 'resource/lang/'.($_SESSION['lang'] ?? 'de').'/'.explode('.', $data)[0].'.php')[explode('.', $data)[1]] ?? '';
}
// gibt das Datum mit Tag, Monat, Jahr aus
function getDateDayMonthYear($created) {
    $months = array(1=>getLang('global.month_januar'),
                    2=>getLang('global.month_februar'),
                    3=>getLang('global.month_march'),
                    4=>getLang('global.month_april'),
                    5=>getLang('global.month_may'),
                    6=>getLang('global.month_june'),
                    7=>getLang('global.month_july'),
                    8=>getLang('global.month_august'),
                    9=>getLang('global.month_september'),
                    10=>getLang('global.month_october'),
                    11=>getLang('global.month_november'),
                    12=>getLang('global.month_december')
    );
    return date('d',$created).". ".$months[date('n',$created)]." ".date('Y',$created);
}
// gibt das Datum mit Monat und Jahr aus
function getDateMonthYear($created) {
    $months = array(1=>getLang('global.month_januar'),
                    2=>getLang('global.month_februar'),
                    3=>getLang('global.month_march'),
                    4=>getLang('global.month_april'),
                    5=>getLang('global.month_may'),
                    6=>getLang('global.month_june'),
                    7=>getLang('global.month_july'),
                    8=>getLang('global.month_august'),
                    9=>getLang('global.month_september'),
                    10=>getLang('global.month_october'),
                    11=>getLang('global.month_november'),
                    12=>getLang('global.month_december')
    );
    return $months[date('n',$created)]." ".date('Y',$created);
}
// bearbeitet das zeitformat
function editTimeFromDB($created) {
    return date('H:i',$created);
}
// kleinschreibung erzwingen
function lowercase($str) {
    return strtolower($str);
}
// leerzeichen vor- und hinter dem string entfernen
function inputTrim($str) {
    return trim(rtrim($str));
}
// einstellungen aus der db laden
function getConfig($alias) {
    $db = DB::exe("SELECT alias,value FROM wcp_config WHERE alias = :alias",array('alias'=>strtoupper($alias)));
    if (isset($db)) {
        foreach ($db as $r) {
            return $r['value'];
        }
    } else {
        return null;
    }
}
//
function recProjects($id) {
    //
}
//
function getProjects($id) {
    //$db = DB::exe("SELECT * FROM cms_projects WHERE alias = :alias",array('alias'=>strtoupper($alias)));
    if (isset($db)) {
        foreach ($db as $r) {
            return $r['value'];
        }
    } else {
        return null;
    }
}
//
function delProjects($id) {
    //
}
//
function editProjects($id) {
    //
}
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
    $db = DB::exe("SELECT * FROM cms_projects WHERE id = :id AND active = :active ORDER BY id DESC",array('id'=>$id,'active'=>'1'));
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
                $str = '<a href="http://'.$r['url'].'" target="_blank">http://'.$r['url'].'</a>';
            } else {
                $str = '<span>'.$r['url'].'</span>';
            }
            return $str;
        }
    } else {
        return null;
    }
}