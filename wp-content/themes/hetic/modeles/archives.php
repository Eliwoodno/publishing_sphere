<?php
/*
Template Name: Archives
*/

?> 
<div style='display:flex;flex-direction:column;min-height: 100vh;'class='site_wrapper'>
<?php get_header(); ?>
<div style='flex:1;'class='archive_wrapper'>
   
<?php 


if( have_rows('archives') ):?>

   <h4 class='dark_filet'>Archives</h4> 

   <? while ( have_rows('archives') ) : the_row();

      $type_archive = get_sub_field('type_archive'); 
  
      if($type_archive == 'archive_texte'):?>
         <div class= text_archive>
         <?$contenu1 = get_sub_field('archive_texte');?>
         <h5><?echo $contenu1['titre'];?></h5>
         <?echo $contenu1['contenu'];?>
         <p><a href='<?echo $contenu1['url_lien'];?>'><?echo $contenu1['texte_lien'];?></a></p>
         </div>
      

      <?elseif($type_archive == 'archive_video'):?>
         <div class= video_archive>
         <?$contenu2 = get_sub_field('archive_video');?>
         <h5><?echo $contenu2['titre'];?></h5>
         <?echo $contenu2['description'];?>
         <?echo $contenu2['url_video'];?>
         </div>

      <?elseif($type_archive == 'archive_photo'):?>
         <div class= photo_archive>
         <?$contenu3 = get_sub_field('archive_photo');?>
         <h5><?echo $contenu3['titre'];?></h5>
         <?echo $contenu3['description_image'];?>
         <img src='<? echo $contenu3['image']['url'];?>' alt='<? echo $contenu3['image']['alt'];?>'>
         </div>

      <?endif;
?><?php 


    endwhile;

else :?>
   <style type="text/css">

.error{
    font-size:28px;
    font-family: Gotham-Book;
    text-align:center;
    margin-bottom:20px;
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
   <div class='error'>Page unavailable</div>
<?}?>
<? if($currLang == "fr-FR"){?>
   <div class='error'>Page indisponible</div>
<?}?>

   <div class='error_message'><? echo the_field('texte_information');?></div>


<?endif;

?>
</div>
<?php get_footer(); ?>
</div>