<?php
include('config.php');

if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
?><!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="Favicon_Ouimob.ico">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php $website_footer = 'Témoignage chrétien'; ?>
    <?php $website_title = 'Interdiction de Airbnb à Paris'; ?>
    <title><?= $website_title ?></title>
    <meta name="description" content="La plateforme citoyenne d'interpellation des député·e·s propulsée par ouimob.">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Global site tag (gtag.js) - Google Analytics -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-128666295-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-128666295-1');
    </script>
  </head>
  <body>
    <header class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light bg-light"></nav>

      <div id="hero-text">
        <div class="container">
          <h2>Nous demandons l'interdiction de Airbnb à Paris, interpellons publiquement les candidats en cliquant sur leur photo.</h2>
         </div>
      </div>
    </header>

    <section class="gallery">
        <div style="text-align:center">
            <h3 style="margin:auto">Candidats à la mairie de Paris</h3>
        </div>
      <div class="row">
          <div class="fw mix-container home-gallery">
            <?php 

            $sql = "SELECT * FROM candidats";
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $prenom = $row["firstname"];
                    $nom = $row["name"];
                    $id = $row["twitter"];
                    $twitter = $row["twitter"];

                    $phrase_perso = '%23StopAirbnb%0A15000%20Parisiens%20et%20Parisiennes%20demandent%20l%C2%B4interdiction%20de%20Airbnb%20%C3%A0%20Paris%2E%0A';
                    $phrase_perso2 = '%2C%20que%20ferez%2Dvous%20si%20vous%20%C3%AAtes%20Maire%20de%20Paris%20%3F%0AInterpellez%20les%20candidats%20sur%20http://stopairbnb.ouimob.org/%0A';
                    $ouimob = 'Cet%20appel%20est%20propuls%C3%A9%20par%20@Ouimob%0A%23Municipales2020';

                    // verify current url
                    $url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
                    $url .= ( $_SERVER["SERVER_PORT"] !== 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
                    $url .= $_SERVER["REQUEST_URI"];


                    if($url == 'http://localhost:80/HD/raiz/stopairbnb/index.php') {
                    
                      $photo = 'http://localhost/HD/raiz/stopairbnb/candidat/' . $id . '.jpg';
                    } else  {
                      $photo = 'http://stopairbnb.ouimob.org/candidat/' . $id . '.jpg';
                    }
                   
                      echo '<div class="mix landscape product">
                         <a class="twitter-share-button thumb-a" href="https://twitter.com/intent/tweet?text='.$phrase_perso.'@'. $twitter .'' . $phrase_perso2 . '' . $ouimob .'">
                            <div class="item-hover">
                              <div class="hover-text"><h3>'. $prenom . ' ' . $nom .'</h3></div>
                            </div>
                            <div class="item-img">
                              <img src="' . $photo . '" title="'. $prenom . ' ' . $nom . '">
                            </div>
                         </a>
                      </div>';
                }
            }
            ?>
          </div>
        </div>

        <br><br>

           <div class="row">
          <div class="fw mix-container home-gallery custom-text">
            <p>Officiellement, Airbnb propose à la location plus de 60 000 logements à Paris qui sont ainsi soustraits au parc classique de la location longue durée et entraînent une concurrence jugée déloyale par les professionnels de l’hôtellerie.<br>
            Parmi ces logements, <span>plus de 30 000 sont loués toute l'année sur Airbnb</span>.<br>
            <span>Ainsi, plus d’un logement sur deux qui se libère à Paris, est vampirisé par Airbnb</span>.<br>
            Ces locations touristiques ont fait perdre à Paris autant de logements existants qu’elle n’a gagné de logements construits ces 5 dernières années, maintenant ainsi une crise permanente d’accès au logement pour des milliers de familles parisiennes.</p>
            <div style="margin-right:5px"><a href="https://stopairbnb.wesign.it/fr" target="_blank" rel="noopener">Signez la pétition</a></div>
            <div><a href="">Partagez la campagne sur FB</a></div>
            <div><a href="https://www.helloasso.com/associations/wsi-pour-la-participation-citoyenne/formulaires/1" target="_blank" rel="noopener">Soutenez OuiMob</a></div>
          </div>
        </div>
    </section>
<div class="footer-info">
<iframe width="540" height="429" src="https://my.sendinblue.com/users/subscribe/js_id/wr4/id/4" frameborder="0" scrolling="auto" allowfullscreen style="display: block;margin-left: auto;margin-right: auto;max-width: 100%;"></iframe><footer>
      <div class="container-fluid">
            <div class="footer-info">
              <div class="footer-title">
                <p>Propulsé par Ouimob, le syndicat citoyen</p>
              </div>
              <div class="footer-social">
                 <a rel="noopener" href="https://www.facebook.com/WeSignIt/" target="_blank"><i class="fab fa-facebook"></i></a>
                <a rel="noopener" href="https://twitter.com/WeSignit" target="_blank"><i class="fab fa-twitter"></i></a>
              </div>
            </div>
      </div>
    </footer>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
        var containerEl = document.querySelector('.mix-container');

        var mixer = mixitup(containerEl, {
            animation: {
                effects: 'fade scale stagger(50ms)' // Set a 'stagger' effect for the loading animation
            }
        });
    </script>
  </body>
</html>