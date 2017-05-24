<?php
// WP_Query arguments
$args = array (
   'post_status'            => 'publish',
   'pagination'             => false,
   'posts_per_page'         => '3',
);

// The Query
$posts = new WP_Query( $args );
?>

<?php if ( $posts->have_posts() ) : ?>
<section id="novidades">
   <div id="posts">
      <h1 class="titulo">
         <span>Novidades</span>
      </h1><!-- end titulo -->
      
      <div class="only_desktop">
         <div class="row no_margin">

            <?php $count = 1; while ( $posts->have_posts() ) : $posts->the_post(); ?>
            <div class="col-md-4 no_padding">
               <article class="post">

                  <?php if ($count != 2) : ?>

                     <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>" class="thumb border">
                           <?php the_post_thumbnail('crop_blog_mini'); ?> 
                        </a><!-- end thumb -->
                     <?php endif; ?>

                     <div class="content">
                        <div class="info">
                           <h1><?php the_title(); ?></h1>
                           
                           <p class="p1"><?php echo excerpt(145, get_the_excerpt()); ?></p>
                           <!--
                           <p class="p1">Escadas feitas em mármore, silestones, granito, arenito e uma infinidade de variações de tipos e cores. Fornecemos as pedras e fazemos o acompanhamento da obra...</p>
                        -->

                           <p class="p2"><?php echo excerpt(70, get_the_excerpt()); ?></p>
                           <a href="<?php the_permalink(); ?>">VEJA MAIS</a>
                        </div><!-- end info -->
                     </div><!-- end info -->

                  <?php else : ?>

                     <div class="content">
                        <div class="info">
                           <h1><?php the_title(); ?></h1>

                           <p class="p1"><?php echo excerpt(145, get_the_excerpt()); ?></p>

                           <p class="p2"><?php echo excerpt(70, get_the_excerpt()); ?></p>
                           <a href="<?php the_permalink(); ?>">VEJA MAIS</a>
                        </div><!-- end info -->
                     </div><!-- end info -->

                     <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>" class="thumb border">
                           <?php the_post_thumbnail('crop_blog_mini'); ?> 
                        </a><!-- end thumb -->
                     <?php endif; ?>

                  <?php endif; ?>

               </article><!-- end post -->
            </div><!-- end col-md-4 -->
            <?php $count++; endwhile; ?>

            <?php /*
            <div class="col-md-4 no_padding">
               <article class="post">

                  <div class="content">
                     <div class="info">
                        <h1>Escadas</h1>
                        <p class="p1">Escadas feitas em mármore, silestones, granito, arenito e uma infinidade de variações de tipos e cores. Fornecemos as pedras e fazemos o acompanhamento da obra...</p>

                        <p class="p2">Escadas feitas em mármore, silestones, granito, arenito e uma infinidade...</p>
                        <a href="">VEJA MAIS</a>
                     </div><!-- end info -->
                  </div><!-- end info -->

                  <a href="" class="thumb">
                     <img src="http://www.mundowhatsapp.com/wp-content/uploads/2015/04/im_eng2.jpg" alt="..." width="100%">
                  </a><!-- end thumb -->


               </article><!-- end post -->
            </div><!-- end col-md-4 -->

            <div class="col-md-4 no_padding">
               <article class="post">

                  <a href="" class="thumb">
                     <img src="http://www.mundowhatsapp.com/wp-content/uploads/2015/04/im_eng2.jpg" alt="..." width="100%">
                  </a><!-- end thumb -->

                  <div class="content">
                     <div class="info">
                        <h1>Escadas</h1>

                        <p class="p1">Escadas feitas em mármore, silestones, granito, arenito e uma infinidade de variações de tipos e cores. Fornecemos as pedras e fazemos o acompanhamento da obra...</p>

                        <p class="p2">Escadas feitas em mármore, silestones, granito, arenito e uma infinidade...</p>

                        <a href="">VEJA MAIS</a>
                     </div><!-- end info -->
                  </div><!-- end info -->

               </article><!-- end post -->
            </div><!-- end col-md-4 -->
            */ ?>

         </div><!-- row -->
      </div> <!-- ONLY DESKTOP -->

      <div class="only_celular">
         <div class="row no_margin">
            <div class="col-md-4 no_padding">
               <article class="post">
                  <?php if ( has_post_thumbnail() ) : ?>
                     <a href="<?php the_permalink(); ?>" class="thumb border">
                        <?php the_post_thumbnail('crop_blog_mini'); ?> 
                     </a><!-- end thumb -->
                  <?php endif; ?>

                  <div class="content">
                     <div class="info">
                        <h1><?php the_title(); ?></h1>
                        <p class="p1"><?php echo excerpt(145, get_the_excerpt()); ?></p>
                        <p class="p2"><?php echo excerpt(70, get_the_excerpt()); ?></p>
                        <a href="<?php the_permalink(); ?>">VEJA MAIS</a>
                     </div><!-- end info -->
                  </div><!-- end info -->
               </article><!-- end post -->
            </div><!-- end col-md-4 -->
         </div><!-- row -->
      </div> <!-- ONLY CELULAR -->

   </div><!-- end posts -->
</section><!-- end novidades -->
<?php endif; ?>