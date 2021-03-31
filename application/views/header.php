<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php if(!empty($title)){echo $title;}?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />  
    <meta itemprop="description"  name="description"  content="<?php if(!empty($title)){echo $title;}?>" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css?id=".date('s').""); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/font-awesome.css"); ?>" /> 
    <link rel="stylesheet" href="<?php echo base_url("assets/css/font-awesome.min.css"); ?>" /> 
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url("assets/src/apple-icon-57x57.png"); ?>" />
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url("assets/src/apple-icon-60x60.png"); ?>" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url("assets/src/apple-icon-72x72.png"); ?>" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url("assets/src/apple-icon-76x76.png"); ?>" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url("assets/src/apple-icon-114x114.png"); ?>" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url("assets/src/apple-icon-120x120.png"); ?>" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url("assets/src/apple-icon-144x144.png"); ?>" />
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url("assets/src/apple-icon-152x152.png"); ?>" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url("assets/src/apple-icon-180x180.png"); ?>" />
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url("assets/src/android-icon-192x192.png"); ?>" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url("assets/src/favicon-32x32.png"); ?>" />
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url("assets/src/favicon-96x96.png"); ?>" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url("assets/src/favicon-16x16.png"); ?>" />
    <link rel="manifest" href="<?php echo base_url("assets/src/manifest.json"); ?>" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="<?php echo base_url("assets/src/ms-icon-144x144.png"); ?>" />
    <meta name="theme-color" content="#ffffff" />
    <!--Facebook Meta Tags-->
    <meta property="og:locale" content="fr_FR" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?=site_url($url);?>" />
    <meta property="og:title" content="<?php if(!empty($title)){echo $title;}?>" />
    <meta property="og:description" content="<?php if(!empty($title)){echo $title;}?>" /> 
    <meta property="og:image" content="<?php echo base_url($image); ?>" />
    <meta property="og:site_name" content="Wazaa immo" />
    <!--End Facebook Meta Tags-->
</head>
<body>

<header>
   <!--
        header

    -->   

       <!--  barre du menu
    -->
    <nav class="navbar navbar-expand-lg navbar-perso bg-perso">
            <!--bouton sur mobile-->
            <a class="nav-brand navbar-text" href="<?=site_url("/");?>"> <img src="<?php echo base_url("assets/src/wazaa_logo.png"); ?>"  class="img-fluid" alt="Wazaa immo" title="Wazaa immo"  width="60"></a>
              <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url("index.php");?>">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url("annonces/liste");?>">Nos Annonces</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url("contact");?>">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url("about");?>">A propos</a>
                </li>
                <?php 
              

                if (empty($user['email'])) {
                    echo '<li class="nav-item ">
                    <a class="nav-link" href="'.site_url('users/connexion').'">Mon compte</a>
                    </li>';
                    
                }else{
                    echo '<li class="nav-item dropdown  bg-perso">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    '.$user['nom'].' '.$user['prenom'].'
                    </a>
                    <div class="dropdown-menu bg-perso" aria-labelledby="navbarDropdown">
                    <a class="nav-link" href="account.php">Mon compte</a>
                            <a class="nav-link" href="'.site_url("users/deconnexion").'">Déconnexion</a>
                    </div>
                  </li>';
                }
                    ?>
            </ul>
            <!--
                barre de recherche dans la nav bar
            -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <form class="form-inline ml-auto">
                  <div class="md-form my-0">
                    <input class="form-control" id="search"  name="search" type="text" placeholder="Rechercher un bien" aria-label="Search">
                  </div>
                  <button class="btn btn-bg-perso btn-outline-perso btn-md my-0 ml-sm-2" type="submit">Rechercher</button>
                </form>
            
              </div>
        </div>
    </nav>
    </header> 