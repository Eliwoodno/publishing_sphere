<?php get_header(); ?>
<style type="text/css">

.error{
    font-size:20px;
    font-family: Gotham-Book;
    text-align:center;
    margin-bottom:20px;
}
.big_404{
    font-size:20vw;
    font-family: Gotham-Medium;
    text-align:center;
}
.error_message{
    font-size:20px;
    font-family: Gotham-Light;
    text-align:center;
    margin-bottom:40px;
}

</style>
<?$currLang = get_bloginfo('language');?>
<? if($currLang == "en-US" ||  $currLang == "en-GB"){?>
<div class='error'>Error</div>
<div class='big_404'>404</div>
<div class='error_message'>This page could not be found. Click <a href=<?echo home_url()?>>here</a> to go back to the home page</div>
<?}?>
<? if($currLang == "fr-FR"){?>
<div class='error'>Erreur</div>
<div class='big_404'>404</div>
<div class='error_message'>Cette page n'existe pas. Cliquez <a href=<?echo home_url()?>>ici</a> pour revenir à la page d'accueil</div>
<?}?>
<?php get_footer(); ?>