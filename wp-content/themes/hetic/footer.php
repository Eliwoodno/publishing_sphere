        <footer id="footer" style="background-color :<?php the_field('couleur_footer', 'options'); ?>; color:<?php the_field('couleur_texte_footer', 'options'); ?>; ">
          
      <?php wp_footer();  

       if(get_bloginfo('language') == "fr-FR") : 
          
           $a_propos = get_field('a_propos', 'options'); 
           echo($a_propos['titre']);
           echo($a_propos['texte']);
           echo($a_propos['lien']); 
           echo($a_propos['texte_lien']); 
          
      else :
          
           $about_us = get_field('about_us', 'options'); 
           echo($about_us['titre']);
           echo($about_us['texte']);
           echo($about_us['lien']); 
           echo($about_us['texte_lien']); 

      endif; 


       wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); 


        
        if( have_rows('reseaux_sociaux', 'options') ):
          while ( have_rows('reseaux_sociaux', 'options') ) : the_row();

            $logo_reseau_social = get_sub_field('logo_reseau_social');
            $lien_reseau_social = get_sub_field('lien_reseau_social');
            echo($logo_reseau_social);
            echo($lien_reseau_social);

          endwhile;
        else :

        endif; ?>
       </footer>
    </body>
</html>