<?php
define('PATH_ROOT', dirname(__FILE__));
define('SITE_BASE_URL', '//'.$_SERVER['HTTP_HOST']);

const ANALYTICS_ID = 'not-set';
const PARC_EXTRAORDENER = "extraordener";
const CHARTE_PARTICIPATION = "charte-18encommun";

const SITE_CREDIT = "[Appel propulsé par he-vous.fr]";
// todo: move this to an external json or something.

/*
tweet format: %1$s is the name of the tweet target
              %2$s is the credit for the tweet. please mention us!
*/
$site_settings_list = json_decode(file_get_contents(PATH_ROOT.'/data/config.json'), true);

// reformatting the settings from a list to an associative array.
// we use lists because they can be represented as a json schema easily
$site_settings = array_combine(array_map(function($x) { return $x['url_slug']; }, $site_settings_list),
                               array_map(function($x) { return $x['settings']; }, $site_settings_list)
);
// resolve on which event we are

$valid_cause_name = '/^[a-zA-Z0-9_-]{3,}$/';
$req_cause = strtok(explode('/', $_SERVER['REQUEST_URI'], 3)[1], '?');
if (!in_array($req_cause, array_keys($site_settings))) {
    die('unknown cause '.$req_cause);
}
if (preg_match($valid_cause_name, $req_cause)==0) {
    die('bad cause '.$req_cause);
}


define('CAUSE', $req_cause);
$SETTINGS = $site_settings[CAUSE];
$sqlite_path = PATH_ROOT.'/.data/'.CAUSE.'.sqlite';
define('CAUSE_URL', SITE_BASE_URL.'/'.CAUSE);


$sqlite = new SQLite3($sqlite_path, SQLITE3_OPEN_READONLY);

if ($sqlite->lastErrorCode() != 0) {
    die(':( (' . $sqlite->lastErrorMsg() . ') '
            . $sqlite->lastErrorCode());
}
