<?php get_header(); ?>

<?php $image = get_field('photo_groupe');?>


<div class="speaker_content">
  <div class="speaker_img" style="background-image: url('<?echo $image['url'];?>');" title='<?echo $image['alt'];?>'></div>
  <div class="speaker_text">
    <h1><?echo the_title()?></h1>
    <p><? echo the_field('description_groupe')?></p>
  </div>
</div>

<?php 

$posts = get_field('intervenants');

if( $posts ): ?>

    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <div class="speaker_photo"style="background-image:url('<?echo get_field('photo_intervenant')['url'];?>')"title='<?echo get_field('photo_intervenant')['alt'];?>'>
    <?php endforeach; ?>

    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>



<?php get_footer(); ?>