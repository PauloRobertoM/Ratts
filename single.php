<?php get_header(); ?>

<?php
   $data =
   array(
      'titulo' => 'Novidades',
      'breadcrumb' => array(
         array('content' => 'Home', 'href' => site_url()),
         array('content' => 'Novidades', 'href' => '')
      )
   );
?>

<?php $Bootstrap::template('components/page', $data); ?>

<div class="pt100 pb100">
<div class="container">
      
   <div class="row">
      <div class="col-md-8">
         <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
         <article class="cpost">
            <header>
               <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail('crop_blog'); ?>
               <?php endif; ?>
               
               <h1><?php the_title(); ?></h1>

               <div class="info">
                  <?php $mes = ucfirst(get_the_date('F')); ?>
                  <?php $dia = get_the_date('d'); ?>
                  <?php $ano = get_the_date('Y'); ?>
                  <date class="date"><?php echo "{$mes} {$dia}, {$ano}"; ?></date> /
                  <span class="comentarios"><?php echo get_comments_number(); ?> <?php echo (get_comments_number() != 1) ? 'comentários' : 'comentário'; ?></span> /
                  <?php $categories = get_the_category(); ?>

                  <?php $count = 1; foreach ($categories as $categorie) : ?>
                     <span class="cat"><?php echo $categorie->name; ?><?php echo ($count < count($categories)) ? ', ' : null; ?></span>
                  <?php $count++; endforeach; ?>
               </div><!-- end info -->
            </header>

            <div class="body">
               <?php the_content(); ?>
            </div><!-- end body -->

            <section class="compartilhe">
               <div class="row">
                  <div class="col-sm-6">
                     <h1>COMPARTILHE</h1>
                  </div><!-- end col-sm-6 -->

                  <div class="col-sm-6">
                     <div class="social">
                        <a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&title=<?php the_title(); ?>" class="facebook" target="_blank"></a>
                        <a href="http://twitter.com/home?status=<?php the_title(); ?>+<?php the_permalink(); ?>" class="twitter" target="_blank"></a>
                        <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="google" target="_blank"></a>
                     </div><!-- end social -->
                  </div><!-- end col-sm-6 -->
               </div><!-- end row -->
            </section><!-- end compartihle -->

         </article><!-- end post -->
         <?php endwhile; else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
         <?php endif; ?>

         <?php comments_template(); ?>
      </div><!-- end col-md-8 -->

      <div class="col-md-4">
         <aside>

            <h2 class="sidebar_title">RECENTES</h2>

            <?php
            $args = array (
               'post_status'            => 'publish',
               'posts_per_page'         => '5',
               'post__not_in'           => array($post->ID),
            );

            $posts = new WP_Query( $args );
            ?>

            <?php if ( $posts->have_posts() ) : ?>

            <section id="postsRecentes">
               <div class="content owl-carousel">
                  <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
                  <article class="recente">
                     <a href="<?php the_permalink(); ?>">

                        <figure>
                           <?php if ( has_post_thumbnail() ) : ?>
                              <?php the_post_thumbnail('crop_blog_recente'); ?>
                           <?php endif; ?>
                           <button class="prev"></button>
                           <button class="next"></button>
                        </figure>

                        <h1><?php the_title(); ?></h1>
                     </a>
                  </article><!-- end recente -->
                   <?php endwhile; ?>
               </div><!-- end content -->

            </section><!-- end postsRecentes -->
            <?php endif; wp_reset_postdata(); ?>
   
            <h2 class="sidebar_title">CATEGORIAS</h2>

            <?php 

            $args = array(
               'type'                     => 'post',
               'child_of'                 => 0,
               'parent'                   => '',
               'orderby'                  => 'name',
               'order'                    => 'ASC',
               'hide_empty'               => 1,
               'hierarchical'             => 1,
               'exclude'                  => '',
               'include'                  => '',
               'number'                   => '',
               'taxonomy'                 => 'category',
               'pad_counts'               => false 

            ); 

            ?>

            <?php $categories = get_categories( $args ); ?> 

            <ol class="categorias">
               <?php foreach ($categories as $categorie) : ?>
               <li>
                  <a href="<?php echo get_category_link($categorie->term_id); ?>"><?php echo $categorie->name; ?> <span class="count"><?php echo $categorie->count; ?></span></a>
               </li>
               <?php endforeach; ?>
            </ol><!-- end categorias -->



         </aside>
      </div><!-- end col-md-4 -->
   </div><!-- end row -->

</div><!-- end container -->
</div>
  
<?php get_footer(); ?>