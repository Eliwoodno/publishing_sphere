<?php get_header(); ?>

<?$pageActu = get_the_title();

$image = get_field('image_evenement');


?><div class="banner_wrapper">
    <div class="event_banner" style="background-image: url(' <? echo $image['url']?>');" title="<?echo $image['alt']?>" >
      
    </div>
    <div class="banner_text">
    <h1><? echo the_title(); ?></h1>
      <p class="event_hours"><? echo the_field('debut_event'); ?> - <? echo the_field('fin_event'); ?></p>
      <p><?echo the_field('date_evenement');?><p>
      
    </div>
  </div>
<?php   
  ?>
  <div class="event_content">
  <div class="event_introduction"><?echo the_field('presentation_evenement');?> </div>
  <div class="event_speakers">

    <?$typeSlug = get_the_terms($id, 'type_event'); // Type de l'event
    $type = $typeSlug[0]->slug;
    //echo($type);

    $args = array('post_type' => 'intervenant'); //Boucle sur les intervenants
    $my_query = new WP_Query($args); 

    if($my_query->have_posts()) : while ($my_query->have_posts() ) : $my_query->the_post();?>

      <?$postsEvent = get_field('evenements'); //Recupere le champ Relation
           $title = get_the_title();
           $permalink = get_permalink();
           $image = get_field('photo_intervenant');

          if( $postsEvent ):
            $incre = 0; ?>
   
            <?php foreach( $postsEvent as $post): ?>
            <?php 
                if( get_the_title() == $pageActu ):
        
                  $incre += 1;
                else:
                  $incre += 0;
                endif;
              endforeach; ?>
    <?php endif;

  if($incre == 1):?>
    <div class="event_speaker">
    <a href='<?echo ($permalink)?>'>
    <div class="speaker_photo"style="background-image:url('<?echo $image['url'];?>')"title='<?echo $image['alt'];?>'></div>
    <p><?echo($title);?></p>
    </a>
  </div>
  <?endif; ?>
  

<?endwhile;
endif; 

?>
</div>
</div>

 <?get_footer(); ?> 