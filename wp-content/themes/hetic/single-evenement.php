<?php get_header(); ?>

<?php 

    $image = get_field('image_evenement'); // Image
    echo $image['alt']; 
    echo $image['url'];

    the_field('heure_evenement');
    the_field('date_evenement');
    the_field('lieu_evenement');
    the_field('presentation_evenement');

?>




<?php get_footer(); ?>