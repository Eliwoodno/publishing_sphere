<?php get_header(); ?>

<?php 

    the_title(); //Titre = nom
    the_field('specialite'); // Spécialité
    $image = get_field('photo_intervenant'); // Image
    echo $image['alt']; 
    echo $image['url']; 
    the_field('description intervenant');

    if( have_rows('lien_externe') ):
    while ( have_rows('lien_externe') ) : the_row();

        the_sub_field('texte');
        the_sub_field('lien');

    endwhile;
    else :
    endif;
 ?>

<?php get_footer(); ?>