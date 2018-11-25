    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <span class="d-block d-lg-none">{CONFIG.PUBLISHER}</span>
            <span class="d-none d-lg-block">
                <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="/img/profile.png" alt="">
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item mb-2">
                    {TPL.ANMELDUNG}
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#about">
                        {MENU.UEBER_MICH}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#projekte">
                        {MENU.PROJEKTE}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#skills">
                        {MENU.FAEHIGKEITEN}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#interessen">
                        {MENU.INTERESSEN}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#kontakt">
                        {MENU.KONTAKT}
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid p-0">

        <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
            <div class="my-auto">
                {BTN_EDIT_ABOUT_ME}
                <div class="modal fade" id="edit_about_me">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{MENU.UEBER_MICH}</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                            <form role="form" action="/start" method="post" accept-charset="UTF-8">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">Vorname</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="firstname" id="firstname" value="{ABOUT.FIRSTNAME}" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="lastname">Nachname</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="lastname" id="lastname" value="{ABOUT.LASTNAME}" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-9 col-sm-9 col-md-10">
                                        <div class="form-group">
                                            <label for="street">Strasse</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="street" id="street" value="{ABOUT.STREET}" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3 col-sm-3 col-md-2">
                                        <div class="form-group">
                                            <label for="nr">Nr.</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="nr" id="nr" value="{ABOUT.NR}" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3 col-sm-3 col-md-2">
                                        <div class="form-group">
                                            <label for="code">PLZ</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="code" id="code" value="{ABOUT.CODE}" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-9 col-sm-9 col-md-10">
                                        <div class="form-group">
                                            <label for="city">Stadt</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="city" id="city" value="{ABOUT.CITY}" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-12">
                                	    <select class="form-control" name="country">
                                            <option value="0">Land auswählen</option>
                                            <option value="1" selected="selected">Deutschland</option>
                                            <option value="2">Österreich</option>
                                            <option value="3">Tschechische Republik</option>
                                            <option value="4">Frankreich</option>
                                            <option value="5">Großbritannien</option>
                                            <option value="6">Polen</option>
                                            <option value="7">Niederlande</option>
                                            <option value="8">Ungarn</option>
                                            <option value="9">Russland</option>
                                        </select>
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="content">Profiltext</label>
                                            <textarea class="form-control" name="content" cols="50" rows="10">{ABOUT.CONTENT}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Telefon</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="phone" id="phone" value="{ABOUT.PHONE}" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label for="mail">Email-Adresse</label>
                                            <div class="input-group">
                                                <input type="email" class="form-control" name="mail" id="mail" value="{ABOUT.MAIL}" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary btn-md float-right" name="about_me">Speichern</button>
                            </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <h1 class="mb-0">{ABOUT.FIRSTNAME}
                    <span class="text-primary">{ABOUT.LASTNAME}</span>
                </h1>
                <div class="subheading mb-5">{ABOUT.STREET} {ABOUT.NR} · {ABOUT.CODE} {ABOUT.CITY} · {ABOUT.PHONE} ·
                    <a href="mailto:{ABOUT.MAIL}">{ABOUT.MAIL}</a>
                </div>
                <p class="lead mb-5">{ABOUT.CONTENT}</p>
            </div>
        </section>

        <hr class="m-0">

        <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="projekte">
            <div class="my-auto">
                {BTN_WRITE_PROJECT}





                <div class="modal fade" id="write_project">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Neues Projekt eintragen</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form role="form" action="/start" method="post" accept-charset="UTF-8">
                                    <div class="row mb-3">
                                        <div class="col-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="topic">Name</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="topic" id="topic" value="" placeholder="Titel des Projektes" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="url">URL/Domain</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="url" id="url" value="" placeholder="Bitte ohne www." required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="version">Version</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="version" id="version" value="" placeholder="z.B. pre-alpha 1.0.0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="content">Beschreibung</label>
                                                <textarea class="form-control" name="content" cols="50" rows="10"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12">
                                            <label for="active">Eintrag sichtbar?</label>
                                            <select class="form-control" name="active">
                                                <option value="0">Nein</option>
                                                <option value="1" selected="selected">Ja</option>
                                            </select>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary btn-md float-right" name="write_project">Speichern</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>





                <div class="modal fade" id="edit_project">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Projekt bearbeiten</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="/start" methode="post" accept-charset="UTF-8">
                                    <div class="row mb-3">
                                        <div class="col-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="topic">Name</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="topic" id="topic" value="{PROJECT.TOPIC}" placeholder="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="url">URL/Domain</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="url" id="url" value="{PROJECT.URL}" placeholder="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label for="version">Version</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="version" id="version" value="{PROJECT.VERSION}" placeholder="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="content">Beschreibung</label>
                                                <textarea class="form-control" name="content" cols="50" rows="10">{PROJECT.CONTENT}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6">
                                            <label for="content">Eintrag sichtbar?</label>
                                            <select class="form-control" name="active">
                                                <option value="0">Nein</option>
                                                <option value="1" selected="selected">Ja</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6">
                                            <label for="content">Sortierung</label>
                                            <select class="form-control" name="order_by">
                                                <option value="1" selected="selected">1</option>
                                            </select>
                                        </div>

                                    </div>
                                    <input type="hidden" name="edit_pro" id="edit_pro" value="{PROJECT.PROID}">
                                    <button type="submit" class="btn btn-primary btn-md float-right" name="edit_project">Speichern</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>





                <div class="modal fade" id="delete_project">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Projekt löschen</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="/start" methode="post" accept-charset="UTF-8">
                                    <h3>Willst den Eintrag wirklich löschen?</h3>
                                    <button type="submit" class="btn btn-danger btn-md float-right" name="delete_project">Löschen</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>





                <h2 class="mb-5">{MENU.PROJEKTE}</h2>
                {TPL.PROJEKTE}
            </div>
        </section>

        <hr class="m-0">

        <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="skills">
            <div class="my-auto">
                {LOGIN.BTN_EDIT_SKILLS}
                <div class="modal fade" id="skills_modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{MENU.FAEHIGKEITEN}</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                Modal body..
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <h2 class="mb-5">{MENU.FAEHIGKEITEN}</h2>

                <div class="subheading mb-3">{FAEHIGKEITEN.PROGRAMM_TOOLS}</div>
                    <ul class="list-inline dev-icons">
                        {TPL.SKILLS_ICONS}
                    </ul>
                <div class="subheading mb-3">{FAEHIGKEITEN.ARBEITSWEISE}</div>
                    <ul class="fa-ul mb-0">
                        {TPL.SKILLS_WORKING}
                    </ul>
                </div>
            </div>
        </section>

        <hr class="m-0">

        <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="interessen">
            <div class="my-auto">
                {LOGIN.BTN_EDIT_INTERESSEN}
                <div class="modal fade" id="interessen_modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{MENU.INTERESSEN}</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="/start">
                                    <div class="form-group">
                                        <label for="firstname">Vorname</label>
                                        <input type="text" class="form-control" id="firstname" name="firstname">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Nachname</label>
                                        <input type="text" class="form-control" id="lastname" name="lastname">
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="submit">Senden</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <h2 class="mb-5">{MENU.INTERESSEN}</h2>
                <p>{CONTENT.INTERESSEN}</p>
            </div>
        </section>

        <hr class="m-0">

        <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="kontakt">
            <div class="my-auto">
                {LOGIN.BTN_EDIT_KONTAKT}
                <div class="modal fade" id="kontakt_modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{MENU.KONTAKT}</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                Modal body..
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <h2 class="mb-5">{MENU.KONTAKT}</h2>
                    <ul class="fa-ul mb-0">
                        <li>
                          <i class="fas fa-download text-danger"></i>
                            Keine Kontakt
                        </li>
                    </ul>
            </div>
        </section>

    </div>