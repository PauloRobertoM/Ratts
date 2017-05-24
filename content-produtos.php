<?php
   $args = array(
      'posts_per_page'   => 8,
      'post_type'        => 'produtos',
   );

   $produtos = get_posts($args);
?>

<section class="portfolio geral">
   <div class="row no-gutter">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <ul>
            <?php foreach ($produtos as $produto) : ?>
               <li>
                  <div class="no-gutter">
                     <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                        <a class="" href="<?php the_permalink($produto->ID); ?>">
                           <?php
                              $medias = rwmb_meta('produtos_fotos', 'type=plupload_image', $produto->ID);
                              foreach ( $medias as $media ) {
                                 echo "<img class='img-portfolio' src='{$media['url']}' alt='{$media['alt']}' />";
                              }
                           ?>
                        </a>
                     </div><!-- col-lg-4 -->
                  </div><!-- no-gutter -->
               </li>
            <?php endforeach; ?>
         </ul>
      </div><!-- col-lg-12 -->
   </div><!-- no-gutter -->
</section><!-- portfolio -->