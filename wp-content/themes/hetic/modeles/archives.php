<?php
/*
Template Name: Archives
*/

?> 
<?php get_header(); ?>
<?php 


if( have_rows('archives') ):

 	// loop through the rows of data
    while ( have_rows('archives') ) : the_row();

      $type_archive = get_sub_field('type_archive'); 
  
      if($type_archive == 'archive_texte'):

         $contenu = get_sub_field('archive_texte');
         echo $contenu['titre'];
         echo $contenu['contenu'];
         echo $contenu['texte_lien'];
         echo $contenu['url_lien'];
      

      elseif($type_archive == 'archive_video'):

         $contenu = get_sub_field('archive_video');
         echo $contenu['titre'];
         echo $contenu['description'];
         echo $contenu['url_video'];

      elseif($type_archive == 'archive_photo'):

         $contenu = get_sub_field('archive_photo');
         echo $contenu['titre'];
         echo $contenu['description_image'];
         echo $contenu['image']['url'];
         echo $contenu['image']['alt'];

      endif;
?> </br></br> <?php 


    endwhile;

else :

the_field('texte_information');

endif;

?>

<?php get_footer(); ?>