<?php
/*
Template Name: Ateliers
*/

?> 

<?php get_header(); ?>

    <div class='about_description'><?the_field('texte_page');?></div>

<?php 

$termsType = get_terms( array(
'taxonomy' => 'type_event',
'orderby' => 'ID',
'order' => 'ASC') );?>

<div class="main_planning"> 

<?$termsJour = get_terms( array(
'taxonomy' => 'jour',
'orderby' => 'ID',
'order' => 'ASC') );?>
  
<div class="planning_container"> 
<?for ($i = 0; $i < sizeof($termsJour); $i++){?><!-- Query events from the type being currently iterated -->
<?$my_query = new WP_Query(array(
    'post_type' => 'evenement',
    'posts_per_page' => -1,
    'orderby' => 'meta_value',
    'meta_key' => 'debut_event',
    'meta_type' => 'TIME',
    'order'	=> 'ASC',
    'tax_query' => array(
        array(
            'taxonomy' => 'type_event',
            'field' => 'slug',
            'terms' => array('workshop','atelier')
        ),
        array(
            'taxonomy' => 'jour',
            'field' => 'slug',
            'terms' => $termsJour[$i]->slug,
        )
    )
  )
        );?>
       
       <?if($my_query->have_posts()) : while ($my_query->have_posts() ) : $my_query->the_post(); // iterate through events and displays them

$image = get_field('image_evenement');
$id = get_the_ID();
$jourSlug = get_the_terms($id, 'jour');
$jour = $jourSlug[0]->slug;
$lieuSlug = get_the_terms($id, 'lieu');
$lieu = $lieuSlug[0]->slug;
$typeSlug = get_the_terms($id, 'type_event');
$type = $typeSlug[0]->slug;?>

          <div class="event_box">
          <a class="event_link" href="<? echo the_permalink();?>">
         <div class="event_img" style="background-image:url('<?echo $image['url']?>')" title="<?echo $image['alt']?>"></div>
         <div class="event_info">
         <h4 class="event_title"><? echo the_title()?></h5>
         <p class="event_date"><img class='date-svg'src='<?echo (IMAGES_URL . '/Calendar.svg')?>'><?php the_field('date_evenement'); ?></p>
         <p class="event_hours"><img class='hour-svg'src='<?echo (IMAGES_URL . '/Clock.svg')?>'><? echo the_field('debut_event'); ?> - <? echo the_field('fin_event'); ?></p>
         <p class="event_location"><img class='location-svg'src='<?echo (IMAGES_URL . '/Location.svg')?>'><?php the_field('lieu_evenement'); ?></p>
         </div>
        </a>
        </div>
        <?wp_reset_postdata(); 
          endwhile;
         endif;?>
         <?}?>
             </div>
      </div>
      
      
    
    
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>





<?php get_footer(); ?>