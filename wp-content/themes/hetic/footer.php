        <footer id="footer" style="background-color :<?php the_field('couleur_footer', 'options'); ?>; color:<?php the_field('couleur_texte_footer', 'options'); ?>; ">
          
      <?php wp_footer();?> 
      <div class="flex-container">
      <div class="about">
       <?if(get_bloginfo('language') == "fr-FR") : 
          
           $a_propos = get_field('a_propos', 'options'); ?>
           <h5><?echo($a_propos['titre']);?></h5>
           <p><?echo($a_propos['texte']);?></p>
           <a href='<?echo($a_propos['lien']); ?>'><?echo($a_propos['texte_lien']);?></a>
           
          
      <?else :
          
          $about_us = get_field('about_us', 'options'); ?>
          <h5><?echo($about_us['titre']);?></h5>
          <p><?echo($about_us['texte']);?></p>
          <a href='<?echo($about_us['lien']); ?>'><?echo($about_us['texte_lien']);?></a> 

      <?endif;?>
      </div>

      <?wp_nav_menu( array( 'theme_location' => 'footer-menu' ) );?>
      <div class="wrapper">
      <div class="social_media">
       <?if( have_rows('reseaux_sociaux', 'options') ):
          if(get_bloginfo('language') == "fr-FR") {
            echo ("<h5>Nous Suivre</h5>");
          }else{
            echo ("<h5>Follow Us</h5>");
          }
          while ( have_rows('reseaux_sociaux', 'options') ) : the_row();

            $logo_reseau_social = get_sub_field('logo_reseau_social');
            $lien_reseau_social = get_sub_field('lien_reseau_social');?>
            <a href='<?echo($lien_reseau_social);?>'><img src='<?echo($logo_reseau_social);?>'></a>
            
          <?endwhile;
        else :
        endif; ?>
        </div>
        <div class="contact">
         <?if(get_bloginfo('language') == "fr-FR") : 
          
          $contact = get_field('contact_fr', 'options');?>
          <h5><?echo($contact['titre_contact']);?></h5>
          <a><?echo($contact['email']);?></a>
          
      <?else :
          
           $contact = get_field('contact_en', 'options');?>
           <h5><?echo($contact['titre_contact']);?></h5>
           <a><?echo($contact['email']);?></a>

      <?endif;?>
      </div>
      </div>
      </div>
       </footer>
    </body>
</html>