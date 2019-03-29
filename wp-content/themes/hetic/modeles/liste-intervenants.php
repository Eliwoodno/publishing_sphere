<?php
/*
Template Name: Liste des intervenants
*/

?> 

<?php get_header(); ?>


<?php $args = array('post_type' => 'intervenant');
  
$my_query = new WP_Query($args);?> 
<h4>Speakers</h4>
<div class="speakers_container">

<?if($my_query->have_posts()) : while ($my_query->have_posts() ) : $my_query->the_post();
    $image = get_field('photo_intervenant');?>
    
    <div class="speaker_box">
        <a href="<?the_permalink()?>">
        <div class="speaker_img" style="background-image:url('<?echo $image['url']; ?>')" title='<?echo $image['alt']; ?>'></div>
        <div><?the_title();?></div>
        <div><?the_field('specialite');?></div>
        </a>
    </div>

	<?wp_reset_postdata();

endwhile;
endif; ?>
</div>




<?php get_footer(); ?>