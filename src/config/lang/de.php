<?php

return [


    /*---------------------------------------------------------------------------------
    | Login Messages
    |----------------------------------------------------------------------------------
     */
    'user_not_found_message'    => 'Bitte überprüfen Sie Ihre E-Mail-Adresse und Ihr Passwort.',
    'login_notifier'            => 'Bitte loggen Sie sich ein, um diese Seite zuzugreifen.',


    /*---------------------------------------------------------------------------------
    | Password Messages
    |----------------------------------------------------------------------------------
     */
    'password_min_err'            => 'Das Passwort muss mindestens 8 alphanumerische Zeichen enthalten.',
    'password_has_number_err'     => 'Das Passwort muss mindestens eine Zahl enthalten.',
    'password_has_special_err'    => 'Das Passwort muss mindestens ein Sonderzeichen enthalten.',
    'password_up_low_err'         => 'Das Passwort muss mindestens einen Groß- und einen Kleinbuchstaben enthalten.',
    'password_db_not_match'       => 'Das alte Passwort entspricht nicht unseren Aufzeichnungen.',
    'password_success'            => 'Ihr Passwort wurde erfolgreich geändert',
    'password_new_pass_and_re'    => 'Das neue Passwort und die Wiederholung des neuen Passworts stimmen nicht überein.',
    'password_reset_req_success'  => 'Sie haben erfolgreich einen Passwort-Reset veranlasst, der Benutzer wird per E-Mail benachrichtigt. Es bleiben ' . Config::get('admin-laravel::general.password_settings.reset_session_hours') . ' Stunden, um das Passwort zu ändern. <br><br>Währenddessen kann ein temporäres Passwort verwendet werden, schauen Sie unten.<br><br><p style="font-size:15px;"><b>Neues Passwort: </b> {password}</p>',
    'password_forgot_req_success' => 'Sie haben erfolgreich einen Passwort-Reset veranlasst, eine E-Mail wurde gesendet. Sie haben ' . Config::get('admin-laravel::general.password_settings.reset_session_hours') . ' Stunden, um Ihr Passwort zu ändern.',
    'password_nouser_forgot_req'  => 'E-Mail-Adresse nicht gefunden, bitte erneut probieren.',

    /*---------------------------------------------------------------------------------
    | Users
    |----------------------------------------------------------------------------------
     */
    'user_add_err_msg'          => 'E-Mail-Adresse existiert bereits.',
    'user_add_info_msg'         => 'Sie haben erfolgreich einen neuen Account hinzugefügt',
    'user_changed_info_msg'     => 'Sie haben dieses Profil erfolgreich geändert.',


    /*---------------------------------------------------------------------------------
    | Roles
    |----------------------------------------------------------------------------------
     */
    'role_saved'                => 'Sie haben erfolgreich eine Rolle zugewiesen.',
    'role_deleted'              => 'Sie haben erfolgreich eine zugewiesene Rolle entfernt.',
    'role_edit_info_msg'        => 'Sie haben erfolgreich den Namen der Rolle geändert.',
    'role_add_err_msg'          => 'Bitte geben Sie einen Rollen-Namen ein',
    'role_add_info_msg'         => 'Sie haben erfolgreich eine neue Rolle hinzugefügt',
    'role_add_space_err_msg'    => 'Eine Rolle darf keine Leerzeichen enthalten',
    'role_not_found'            => 'Keine Rollen gefunden.',
];