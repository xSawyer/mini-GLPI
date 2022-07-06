<!DOCTYPE html>
<html style="font-size: 16px;" lang="fr"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Member Login">
    <meta name="description" content="">
    <title>Accueil</title>
    <link rel="stylesheet" href="../styles/nicepage_login.css" media="screen">
<link rel="stylesheet" href="../styles/Accueil_login.css" media="screen">
    <script class="u-script" type="text/javascript" src="../script/jquery_login.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="../script/nicepage_login.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.13.4, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/default-logo.png"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Accueil">
    <meta property="og:type" content="website">
  </head>
  <body data-home-page="Accueil.html" data-home-page-title="Accueil" class="u-body u-xl-mode">
 
</header>
    <section class="u-clearfix u-gradient u-section-1" id="carousel_5666">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-align-center u-container-style u-group u-shape-rectangle u-group-1">
          <div class="u-container-layout u-valign-middle u-container-layout-1"><span class="u-file-icon u-icon u-text-white u-icon-1"><img src="../images/747376.png" alt=""></span>
            <h2 class="u-text u-text-body-alt-color u-text-default u-text-1">Mini-GLPI Login</h2>
            <div class="u-form u-login-control u-form-1">
              <form action="auth.php" method="POST" class="u-clearfix u-form-custom-backend u-form-spacing-10 u-form-vertical u-inner-form" source="custom" name="form" style="padding: 0px;">
                <div class="u-form-group u-form-name">
                  <label for="username" class="u-label u-text-grey-5 u-label-1">Adresse mail :</label>
                  <input type="text" placeholder="Entrer votre adresse mail" id="username" name="username" class="u-border-2 u-border-grey-10 u-grey-10 u-input u-input-rectangle u-input-1" required>
                </div>
                <div class="u-form-group u-form-password">
                  <label for="password" class="u-label u-text-grey-5 u-label-2">Mot de passe :</label>
                  <input type="password" placeholder="Entre votre mot de passe" id="password" name="password" class="u-border-2 u-border-grey-10 u-grey-10 u-input u-input-rectangle u-input-2" required>
                </div>
             
                <div class="u-align-left u-form-group u-form-submit">
                  <a href="#" class="u-active-palette-2-light-2 u-border-none u-btn u-btn-submit u-button-style u-hover-palette-2-light-2 u-palette-4-base u-text-active-palette-2-base u-text-body-alt-color u-text-hover-palette-2-base u-btn-1">Se connecter</a>
                  <input type="submit" id='submit' value="LOGIN" class="u-form-control-hidden">
                </div>
                <?php



                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
                <input type="hidden" value="" name="recaptchaResponse">
              </form>
            </div>
            <a href="" class="u-border-1 u-border-active-grey-10 u-border-hover-grey-10 u-btn u-button-style u-login-control u-login-create-account u-none u-text-body-alt-color u-btn-2">Mot de passe oublié ?</a>
            <a href="" class="u-border-1 u-border-active-grey-10 u-border-hover-grey-10 u-btn u-button-style u-login-control u-login-create-account u-none u-text-body-alt-color u-btn-3">Vous n'avez pas de compte ?</a>
          </div>
        </div>
      </div>
  
</body></html>


