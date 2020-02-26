<?php
require_once('bootstrap.php');
if ( isset($_GET['id']) ) {

    $target = $sqlite->query("SELECT * FROM targeted_demographics WHERE twitter = ".intval($_GET['id']));

    if ( $target->numRows < 1 ) {
        exit;
    }
    $row = $target->fetchArray();
    $target = $row;
} else {
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php $SETTINGS['title']; ?></title>
    <meta name="description" content="<?php $SETTINGS['description']; ?>">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <meta name="twitter:card" content="summary_large_image" />
    <meta property="og:url" content="<?php echo CAUSE_URL; ?>/target.php?id=<?php echo $target['twitter']; ?>" />
    <meta property="og:title" content="<?php echo $target['firstname']; ?> <?php echo $target['name']; ?> - <?= $website_title ?>" />
    <meta property="og:description" content="Contre Airbnb à Paris" />
    <meta property="og:image" content="http://stopairbnb.ouimob.org/target.php?id=<?php echo $_GET['id']; ?>" />
    <script type="text/javascript">
    function delayRedirect() { window.location = "<?php echo $SETTINGS['redirect_uri']; ?>"; }
    </script>
  </head>
  <body onload="setTimeout('delayRedirect()', 10)">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="js/custom.js"></script>
    </script>
  </body>
</html>
