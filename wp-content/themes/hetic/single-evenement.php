<?php get_header(); ?>

<?php 

    $pageActu = get_the_title();

    $image = get_field('image_evenement'); // Image
    echo $image['alt']; 
    echo $image['url'];

    the_field('heure_evenement');
    the_field('date_evenement');
    the_field('lieu_evenement');
    the_field('presentation_evenement');

    $args = array('post_type' => 'intervenant'); //Boucle sur les intervenants
    $my_query = new WP_Query($args); 

    if($my_query->have_posts()) : while ($my_query->have_posts() ) : $my_query->the_post();


      $postsEvent = get_field('evenements'); //Recupere le champ Relation
           $title = get_the_title();
           $permalink = get_permalink();
           $image = get_field('photo_intervenant');

          if( $postsEvent ):
            $test = 0; ?>
   
            <?php foreach( $postsEvent as $post): ?>
            <?php 
                if( get_the_title() == $pageActu ):
        
                  $test += 1;
                else:
                  $test += 0;
                endif;
              endforeach; ?>
    <?php endif;

  if($test == 1):
    
  echo($title);
  echo($permalink);
  echo $image['alt'];
  echo $image['url']; 

  endif; 

endwhile;
endif; 

 get_footer(); ?> 