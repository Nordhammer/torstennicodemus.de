<?php
if (isset($_POST['about_me'])) {
    $err = false;
    $_SESSION['hint'] = '';
    $_SESSION['msg'] = '';
    $firstname = '';
    $lastname = '';
    $street = '';
    $nr = '';
    $code = '';
    $city = '';
    $country = '';
    $phone = '';
    $mail = '';
    $content = '';
    $firstname = inputTrim($_POST['firstname']);
    $lastname = inputTrim($_POST['lastname']);
    $street = inputTrim($_POST['street']);
    $nr = inputTrim($_POST['nr']);
    $code = inputTrim($_POST['code']);
    $city = inputTrim($_POST['city']);
    $country = inputTrim($_POST['country']);
    $phone = inputTrim($_POST['phone']);
    $mail = inputTrim($_POST['mail']);
    $content = inputTrim($_POST['content']);
    if (empty($firstname)) $err = true;
    if (empty($lastname)) $err = true;
    if (empty($street)) $err = true;
    if (empty($nr)) $err = true;
    if (empty($code)) $err = true;
    if (empty($city)) $err = true;
    if (empty($country)) $err = true;
    if (empty($phone)) $err = true;
    if (empty($mail)) $err = true;
    if (empty($content)) $err = true;
    if ($err === true) {
        $_SESSION['hint'] = 'warning';
        $_SESSION['msg'] = 'Alle Felder müssen ausgefüllt werden';
    }
    if ($err === false) {
        DB::exe("UPDATE cms_about_me SET firstname = :firstname,
                                         lastname = :lastname,
                                         street = :street,
                                         nr = :nr,
                                         code = :code,
                                         city = :city,
                                         country = :country,
                                         phone = :phone,
                                         mail = :mail,
                                         content = :content,
                                         ip = :ip,
                                         edit = :edit WHERE id = :id",array('id'=>1,
                                                                            'firstname'=>clearContent($firstname),
                                                                            'lastname'=>clearContent($lastname),
                                                                            'street'=>clearContent($street),
                                                                            'nr'=>clearContent($nr),
                                                                            'code'=>clearContent($code),
                                                                            'city'=>clearContent($city),
                                                                            'country'=>clearContent($country),
                                                                            'phone'=>clearContent($phone),
                                                                            'mail'=>clearContent($mail),
                                                                            'content'=>clearContent(makeUp($content)),
                                                                            'ip'=>$_SERVER['REMOTE_ADDR'],
                                                                            'edit'=>time()));                
        $_SESSION['hint'] = 'success';
        $_SESSION['msg'] = 'Über mich erfolgreich bearbeitet';
    } else {
        $_SESSION['hint'] = 'danger';
        $_SESSION['msg'] = 'Es ist ein Fehler aufgetreten';
    }
}
// ausgabe in der resource/views/fe/start/index.php