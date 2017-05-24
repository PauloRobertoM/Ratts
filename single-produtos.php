<?php get_header(); ?>

<?php
   array(
      'titulo' => 'Produtos',
      'breadcrumb' => array(
         array('content' => 'Home', 'href' => site_url()),
         array('content' => 'Produtos', 'href' => site_url('produtos')),
         array('content' => get_the_title(), 'href' => null),
      )
   );
?>

<header class="head-interna">
      <div class="logo">
         <a href="<?php echo site_url(''); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png">
         </a>
      </div><!-- logo -->

      <?php get_template_part('components/menu'); ?>
   </header><!-- end topo -->

<section id="contentProduto">
   <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="container page-interna">
         <h1><?php the_title(); ?></h1>
         <p><?php the_content(); ?></p>

         <div class="fotorama" data-nav="thumbs">
            <?php $internas = rwmb_meta('produtos_internas', array('type' => 'image_advanced', 'size' => 'thumb_produtos_full')); ?>
            <?php $primeiraInterna = (!empty($internas)) ? current($internas) : null; ?>

            <?php foreach ($internas as $indice => $interna) : ?>
               <img src="<?php echo $interna['url']; ?>" alt="<?php echo $interna['title']; ?>">
            <?php endforeach; ?>
         </div><!-- end fotorama -->
      </div><!-- end container -->
   <?php endwhile; endif; ?>
</section><!-- end contentProduto -->

<?php /*
<section class="outros-produtos page-interna">
   <div class="container">
      <h1>Outros Projetos</h1>
      <?php
      $args = array (
         'post_type'              => 'produtos',
         'post_status'            => 'publish',
         'posts_per_page'         => '100',
         'post__not_in'           => array($post->ID),
      );

      $produtos = new WP_Query( $args );

      if ( $produtos->have_posts() ) : ?>
         <?php while ( $produtos->have_posts() ) : $produtos->the_post(); ?>
            <?php $fotos = rwmb_meta('produtos_fotos', array('type' => 'plupload_image', 'size' => 'thumb_produtos')); ?>
            <?php $primeiraFoto = (!empty($fotos)) ? current($fotos) : null; ?>
            <article class="produto">
               <a href="<?php the_permalink(); ?>" class="produtoThumb">
                  <h4><?php the_title(); ?></h4>
                  <?php if ($primeiraFoto) : ?>
                     <img src="<?php echo $primeiraFoto['url']; ?>" alt="<?php the_title(); ?>">
                  <?php endif; ?>
               </a><!-- end thumb -->
            </article><!-- end produto -->
         <?php endwhile; wp_reset_postdata(); ?>
      <?php endif; ?>
   </div>
</section>
*/ ?>

<?php get_footer(); ?>