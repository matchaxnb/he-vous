<?php
include('bootstrap.php');

?><!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="Favicon_Ouimob.ico">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?= $SETTINGS['title'] ?></title>
    <meta name="description" content="<?php echo $SETTINGS['description']; ?>">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Global site tag (gtag.js) - Google Analytics -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo ANALYTICS_ID; ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '<?php echo ANALYTICS_ID ; ?>');
    </script>
  </head>
  <body>
    <header class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light bg-light"></nav>

      <div id="hero-text">
        <div class="container">
          <h2><?php echo $SETTINGS['hero_text'] ?></h2>
         </div>
      </div>
    </header>

    <section class="gallery">
        <div style="text-align:center">
            <h3 style="margin:auto"><?php echo $SETTINGS['targeted_demographics']; ?></h3>
        </div>
      <div class="row">
          <div class="fw mix-container home-gallery">
            <?php

            $sql = "SELECT * FROM targeted_demographics";
            $result = $sqlite->query($sql);

            while($row = $result->fetchArray()) {
                $prenom = $row["firstname"];
                $nom = $row["name"];
                $id = $row["twitter"];
                $twitter = '@'.$row["twitter"];
                $tweet_to_send = urlencode(sprintf($SETTINGS['tweet_format'], $twitter, SITE_CREDIT));
                $photo = SITE_BASE_URL.'/assets/'.$id.'.jpg';

                  echo '<div class="mix landscape product">
                     <a class="twitter-share-button thumb-a" href="https://twitter.com/intent/tweet?text='.$tweet_to_send.'">
                        <div class="item-hover">
                          <div class="hover-text"><h3>'. $prenom . ' ' . $nom .'</h3></div>
                        </div>
                        <div class="item-img">
                          <img src="' . $photo . '" title="'. $prenom . ' ' . $nom . '">
                        </div>
                     </a>
                  </div>';
            }
            ?>
          </div>
        </div>

        <br><br>

           <div class="row">
          <div class="fw mix-container home-gallery custom-text">
            <?php echo $SETTINGS['custom_text']; ?>
          </div>
        </div>
    </section>
<div class="footer-info">
<iframe width="540" height="429" src="https://my.sendinblue.com/users/subscribe/js_id/wr4/id/4" frameborder="0" scrolling="auto" allowfullscreen style="display: block;margin-left: auto;margin-right: auto;max-width: 100%;"></iframe><footer>
      <div class="container-fluid">
            <div class="footer-info">
              <div class="footer-title">
                <p>Propulsé par he-vous.fr</p>
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
