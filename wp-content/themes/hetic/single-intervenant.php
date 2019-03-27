<?php get_header(); ?>

<?php 
    
    $i = 0;
    the_title(); //Titre = nom
    the_field('specialite'); // Spécialité
    $image = get_field('photo_intervenant'); // Image
    echo $image['alt']; 
    echo $image['url']; 
    the_field('description_intervenant');

    if( have_rows('lien_externe') ):
    while ( have_rows('lien_externe') ) : the_row();

        the_sub_field('texte');
        the_sub_field('lien');

    endwhile;
    else :
    endif;

$posts = get_field('evenements');

if( $posts ): ?>
    <ul>
    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
      <?php 
      
      $termsType = get_terms( array('taxonomy' => 'type_event') );
      $typeEvent = $termsType[$i]->slug;  //Affichage des jours pour le trie
      
      if( $typeEvent == "event-fr" || $typeEvent == "event-en" ):
      ?>
        <li>
          Event
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <span><?php the_field('heure_evenement'); ?></span>
            <span><?php the_field('date_evenement'); ?></span>
            <span><?php the_field('lieu_evenement'); ?></span>
            <?php $image = get_field('image_evenement'); 
            echo $image['alt']; //Alt de l'image de l'evenement
            echo $image['url']; // Url de l'image de l'évenement 
             $i +=1; ?>
        </li>
      <?php elseif($typeEvent == "atelier-fr" || $typeEvent == "atelier-en"): ?>
        <li>
            Atelier
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <span><?php the_field('heure_evenement'); ?></span>
            <span><?php the_field('date_evenement'); ?></span>
            <span><?php the_field('lieu_evenement'); ?></span>
            <?php $image = get_field('image_evenement'); 
            echo $image['alt']; //Alt de l'image de l'evenement
            echo $image['url']; // Url de l'image de l'évenement 
            $i +=1; ?>
        </li>
      
      <?php endif; ?>
    <?php endforeach; ?>
    </ul>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif;  ?>

<?php get_footer(); ?>