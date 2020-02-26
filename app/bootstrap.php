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
$site_settings = array(
    PARC_EXTRAORDENER => array(
        "title" => "Nous voulons un parc pour le 18e !",
        "description" => "collectif pour un parc extraordener",
        "tags" => "#ecologie #paris18 #fricheordener",
        "cause_name" => PARC_EXTRAORDENER,
        "tweet_format" => '%1$s Les quartiers populaires aussi ont le droit de respirer ! Le 18ème réclame son grand parc central, en pleine terre et accessible à tout.e.s. #UnParcExtraOrdener #UnParcPourLe18ème https://unparcextraordener.wesign.it/fr',
        "targeted_demographics" => "Candidats à la Mairie de Paris",
        "hero_text" => "Nous demandons un parc pour le 18ème !",
        "redirect_uri" => "https://unparcextraordener.wesign.it/fr",
        "call_to_action_text" => "Cliquez sur une image pour interpeller un des candidats à la Mairie de Paris sur Twitter",
        "custom_text" => nl2br('<h1>Pour un parc Extra-Ordener dans le 18ème</h1>
<p>Dans le 18e arrondissement de Paris friche SNCF va faire place à un massif plan de bétonisation avec un jardinet semi-privé pour faire bonne mesure. Ce projet est contraire aux besoins de notre quartier populaire et à rebours de l\'urgence écologique.
Ce quartier est le moins pourvu en espace vert de tout Paris : 1% d’espace vert par habitant, 10 fois moins que ce que préconise l’OMS.

Interpellons les candidats à l’élection municipales pour qu’ils mettent un terme à ce projet et nous propose un vertitable plan de verdissement de Paris !

Pour un Paris qui respire ! <a href="https://unparcextraordener.wesign.it/fr">Signez notre pétition</a>'),
    ),
    CHARTE_PARTICIPATION => array(
        "title" => "Nous voulons de vraies mesures pour la démocratie participative !",
        "description" => "Le 18 en Commun propose la charte de la participation inclusive",
        "tags" => "#municipalisme #democratieparticipative #paris18",
        "cause_name" => CHARTE_PARTICIPATION,
        "tweet_format" => '#DemocratiePourParis Nous voulons de vraies mesures pour la #DémocratieParticipative ! %1$s signez la charte de participation citoyenne et communiquez votre désir d’améliorer la vie démocratique de votre ville #Municipales2020 https://charteparticipationcitoyenneinclusive.wesign.it/fr',
        "targeted_demographics" => "Candidats à la Mairie de Paris",
        "hero_text" => "Nous voulons de vraies mesures pour la démocratie participative !",
        "redirect_uri" => "https://charteparticipationcitoyenneinclusive.wesign.it/fr",
        "call_to_action_text" => "Cliquez sur une image pour interpeller un des candidats à la Mairie de Paris sur Twitter",
        "custom_text" => nl2br('La démocratie participative est brandie par les candidats et maires en exercice depuis de nombreuses années comme étendard de leur politique publique. Cependant, des conseils de quartier jusqu’aux consultations locales, peu de moyens sont mis à disposition, l’information fait défaut, et les groupes de travail sont socialement homogènes. Des villes comme Barcelone, Madrid, ou Saillans dans la drôme font bien mieux et regorgent d’inventivité. En conséquence, les villes s’en retrouvent transformées. Ne faisons pas de la démocratie Participative un simple concept marketing !

Le mouvement “18 en commun”, apartisan et inclusif propose une charte de la participation citoyenne. Cette charte n’est pas exhaustive, mais permet d’engager les candidats dans un effort qui sera surveillé par les citoyens et les administrés.

Interpellons les candidats à la mairie de Paris à s’engager à signer la charte de participation citoyenne, et montrons notre soutiens à ces mesures afin que leur engagement ne soit pas ignoré.

<a href="https://charteparticipationcitoyenneinclusive.wesign.it/fr">Signez la pétition pour la Charte de la participation citoyenne inclusive !</a>
'),
        "cause_name" => CHARTE_PARTICIPATION,
    ),

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
