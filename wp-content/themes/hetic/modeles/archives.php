<?php
/*
Template Name: Archives
*/

?> 
<?php get_header(); ?>
<div class='archive_wrapper'>
   <h4 class='dark_filet'>Archives</h4>
<?php 


if( have_rows('archives') ):

 	// loop through the rows of data
    while ( have_rows('archives') ) : the_row();

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

else :

the_field('texte_information');

endif;

?>
</div>
<?php get_footer(); ?>