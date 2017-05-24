<?php get_header(); ?>

	<?php
		$page = 'home';
	?>

	<header>
      <?php get_template_part('components/menu'); ?>

      <div class="logo">
         <a href="<?php echo site_url(''); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png">
         </a>
      </div><!-- logo -->

      <div class="video-hero jquery-background-video-wrapper demo-video-wrapper">
         <video class="jquery-background-video" autoplay muted loop poster="https://d3k5xyayaartr5.cloudfront.net/_assets/home-video/beach-waves-loop.jpg">
            <source src="<?php echo get_template_directory_uri(); ?>/assets/video/Vida_Pipa_Aprovacao_c_um.mp4" type="video/mp4">
         </video>
         <div class="video-overlay"></div>
         <div class="page-width">
            <div class="video-hero--content">
               <div class="container">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ratts.png" alt="">
               </div><!-- container -->
            </div><!-- video-hero-content -->
         </div><!-- page-width -->
      </div><!-- video-hero -->
   </header><!-- end topo -->

   <div id="projeto"></div>

   <?php get_template_part('content', 'produtos'); ?>

   <div id="contato"></div>

   <?php get_template_part('content', 'servicos'); ?>

   <section class="online geral">
      <div class="row no-gutter">
         <div class="col-lg-10 col-md-10 col-sm-10">
            <div class="no-gutter">
               <div class="col-lg-4 col-md-4 col-sm-4">
                  <a class="" href="">
                     <img class='img-portfolio' src='<?php echo get_template_directory_uri(); ?>/assets/images/serv1.png' alt='' />
                     
                     <div class="content-dois">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/call.png" alt="">
                        <h2>Propaganda & <span>CRIAÇÃO</span></h2>

                        <p>Mídia Exterior/Interior.<br />
                        Mídia Impressa.<br />
                        Identidade Visual.<br />
                        Branding.<br />
                        Imagens.<br />
                        Brindes.<br />
                        Apresentações.</p>
                     </div>
                  </a>
               </div><!-- col-lg-4 -->
               <div class="col-lg-4 col-md-4 col-sm-4">
                  <a class="" href="">
                     <img class='img-portfolio' src='<?php echo get_template_directory_uri(); ?>/assets/images/serv2.png' alt='' />
                     
                     <div class="content-dois">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/call.png" alt="">
                        <h2>Comunicação & <span>ATENDIMENTO</span></h2>

                        <p>Plano de Mídia.<br />
                        Plano de Comunicação.<br />
                        Posicionamento de Mercado.<br />
                        Planejamento de Marketing.<br />
                        Consultoria.<br />
                        Atendimento.<br />
                        Visita Técnica.<br />
                        Diagnóstico de marca/produto.</p>
                     </div>
                  </a>
               </div><!-- col-lg-4 -->
               <div class="col-lg-4 col-md-4 col-sm-4">
                  <a class="" href="">
                     <img class='img-portfolio' src='<?php echo get_template_directory_uri(); ?>/assets/images/serv1.png' alt='' />
                     
                     <div class="content-dois">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/call.png" alt="">
                        <h2>Inteligência & <span>DIGITAL</span></h2>

                        <p>Redes Sociais.<br />
                        Mídia Online.<br />
                        Marketing Digital.<br />
                        Websites.<br />
                        Apps.<br />
                        Desenvolvimento Web.<br />
                        Ferramentas Digitais.<br />
                        Business Inteligence.</p>
                     </div>
                  </a>
               </div><!-- col-lg-4 -->
            </div><!-- no-gutter -->
         </div><!-- col-lg-10 -->

         <div class="col-lg-2 col-md-2 col-sm-2">
            <div class="item">
               <div class="content">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ratts_online.png" alt=""><br />
                  <h4>WHATSAPP<br />84 99991-1617</h4>
               </div><!-- content -->
               <img class="back img-portfolio hidden-sm" src="<?php echo get_template_directory_uri(); ?>/assets/images/back.png" alt="">
               <img class="back img-portfolio hidden-xs hidden-md hidden-lg" src="<?php echo get_template_directory_uri(); ?>/assets/images/back-mobile.png" alt="">
            </div><!-- item -->
         </div><!-- col-lg-2 -->
      </div><!-- no-gutter -->

      <div id="sec-online"></div>

      <?php /* <div class="video">
         <div id="quemsomos" class="bgParallax" data-speed="15">
            <article>
               <a href="">
                  <h1>ASSISTA AO VÍDEO EXPLICATIVO AQUI</h1>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/play2.png" alt="">
               </a>
            </article>
         </div><!-- #quemsomos -->
      </div><!-- video --> */ ?>
   </section><!-- online -->

   <section class="depoimentos" id="depoimento">
      <div class="container content-depo">
         <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
               <div class="item active">
                  <h1>Lula Vasconcelos</h1>
                  <p>VidaPipa e Pipa Natureza</p>

                  <img class="foto-depo" src="<?php echo get_template_directory_uri(); ?>/assets/images/depo1.png" alt="">

                  <img class="um" src="<?php echo get_template_directory_uri(); ?>/assets/images/aspas.png" alt="">
                  <p>A Ratts Ratis pensa de forma estratégica, pensa no conjunto, ela vê o business como um todo. O projeto VidaPipa é um exemplo disso. É a agência mais completa do mercado</p>
                  <img class="dois" src="<?php echo get_template_directory_uri(); ?>/assets/images/aspas2.png" alt="">
               </div><!-- item -->
               <div class="item">
                  <h1>Daniel Cabral</h1>
                  <p>Diretor do Sistema Opinião</p>

                  <img class="foto-depo" src="<?php echo get_template_directory_uri(); ?>/assets/images/depo2.png" alt="">

                  <img class="um" src="<?php echo get_template_directory_uri(); ?>/assets/images/aspas.png" alt="">
                  <p>A Ratts Ratis é uma agência de grandes projetos. E é muito forte no digital, foi a primeira a entender a nova onda de integração. O Sistema Opinião vai levar a Ratts pra vários estados. Pedro e Enrique são dois grandes profissionais</p>
                  <img class="dois" src="<?php echo get_template_directory_uri(); ?>/assets/images/aspas2.png" alt="">
               </div><!-- item -->
            </div><!-- carousel-inner -->

            <!-- Indicators -->
            <ol class="carousel-indicators">
               <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
               <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            </ol>
         </div><!-- carousel-example-generic -->
      </div><!-- container content-depo -->
   </section><!-- depoimentos -->
   
<?php get_footer(); ?>