<?php get_header(); ?>

<?php
    $i = 0;
    $image = get_field('photo_intervenant');?>

<div class="speaker_content">
  <div class="speaker_img" style="background-image: url('<?echo $image['url'];?>');" title='<?echo $image['alt'];?>'></div>
  <div class="speaker_text">
    <h1><?echo the_title()?></h1>
    <h3><?echo the_field('specialite')?></h3>
    <p><? echo the_field('description_intervenant')?></p>
    
 
    <div class="speaker_links">
<?  if( have_rows('lien_externe') ):
    while ( have_rows('lien_externe') ) : the_row();?>
        <a href='<?echo the_sub_field('lien'); ?>'><?echo the_sub_field('texte');?></a>
    <?endwhile;
    else :
    endif;?>
    </div>
  </div>
</div>

<?$posts = get_field('evenements');

if( $posts ): ?>
    
    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
      <?php 
      
      $termsType = get_terms( array('taxonomy' => 'type_event') );
      $typeEvent = $termsType[$i]->slug;  //Affichage des jours pour le trie
      
      if( $typeEvent == "event-fr" || $typeEvent == "event-en" ):
      ?>
       <div class="speaker_planning_container">
        
          

          <?php $image = get_field('image_evenement'); ?>

          <div class="event_box">
          <a class="event_link" href="<? echo the_permalink();?>">
         <div class="event_img" style="background-image:url('<?echo $image['url']?>')" title="<?echo $image['alt']?>"></div>
         <div class="event_info">
         <h5 class="event_title"><? echo the_title()?></h5>
         <p class="event_date"><img class='date-svg'src='<?echo (IMAGES_URL . '/Calendar.svg')?>'><?php the_field('date_evenement'); ?></p>
         <p class="event_hours"><img class='hour-svg'src='<?echo (IMAGES_URL . '/Clock.svg')?>'><? echo the_field('heure_evenement'); ?></p>
         <p><img class='location-svg'src='<?echo (IMAGES_URL . '/Location.svg')?>'><?php the_field('lieu_evenement'); ?></p>
         </div>
        </a>
        </div>
          
             <?$i +=1; ?>
             </div>
        
      <?php elseif($typeEvent == "atelier-fr" || $typeEvent == "atelier-en"): ?>
        <div class="speaker_planning_container">
            
            <?php $image = get_field('image_evenement'); ?>
            <div class="event_box">
          <a class="event_link" href="<? echo the_permalink();?>">
         <div class="event_img" style="background-image:url('<?echo $image['url']?>')" title="<?echo $image['alt']?>"></div>
         <div class="event_info">
         <h5 class="event_title"><? echo the_title()?></h5>
         <p class="event_date"> <img class='date-svg'src='<?echo (IMAGES_URL . '/Calendar.svg')?>'><?php the_field('date_evenement'); ?></p>
         <p class="event_hours"><img class='hour-svg'src='<?echo (IMAGES_URL . '/Clock.svg')?>'><? echo the_field('heure_evenement'); ?></p>
         <p class='event_location'><img class='location-svg'src='<?echo (IMAGES_URL . '/Location.svg')?>'><?php the_field('lieu_evenement'); ?></p>
        </div>
        </a>
        </div>
            
            <?$i +=1; ?>
      </div>
      
      <?php endif; ?>
    <?php endforeach; ?>
    
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif;  ?>

<?php get_footer(); ?>