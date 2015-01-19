	<!DOCTYPE html>

	<head>

		<title><?php wp_title('|',1,'right'); ?> <?php bloginfo('name'); ?></title>

		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php bloginfo('description'); ?>">

		<meta http-equiv="X-UA-Compatible" content="IE=edge" />

		<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700,400italic' rel='stylesheet' type='text/css'>

        <link href='http://fonts.googleapis.com/css?family=Marvel:400,700' rel='stylesheet' type='text/css'>

		<link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">        

		<link href="<?php bloginfo('stylesheet_url');?>?1" rel="stylesheet">



		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>

		  <script src="<?php bloginfo('template_url');?>/lib/html5shiv/html5shiv.js"></script>

		  <script src="<?php bloginfo('template_url');?>/lib/respond/respond.min.js"></script>

		<![endif]-->

		

		



		<script src="<?php bloginfo('template_url');?>/lib/bootstrap/js/jquery.js"></script>

		<?php wp_head(); ?>

		<script src="<?php bloginfo('template_url');?>/lib/bootstrap/js/flexie.js"></script>		

        

		<script>

			var $ = jQuery;

			jQuery(document).ready(function($) {

				

				$("#special-base").mouseenter(function(){

					$("#special-container").addClass("grover");

					$("#small-play").css("visibility", "visible");

					$("#hit-equipe").hide();					

				});

					

				$("#special-container").mouseleave(function(){

					$(this).removeClass("grover");					

					$("#small-play").css("visibility", "hidden");

					$("#hit-equipe").show();								

				});				

					

				$("#menu-item-special").click(function(e){

					e.preventDefault();

				});

			

				$("#hit-equipe").click(function(){

					document.location.href = "/notre-equipe/";

				});

			

				$("#hit-donateurs").click(function(){

					document.location.href = "/nos-donateurs/";

				});			

			

				$("#special-base").click(function(e){

					e.preventDefault();

					//window.open("https://www.canadahelps.org/CharityProfilePage_sec.aspx?CharityID=s37926", '_blank');
          window.open("https://www.canadahelps.org/fr/organismesdebienfaisance/le-piolet/", '_blank');

					window.focus();					

				});			

				

			});

		</script>			

	</head>

	<body>

		<div id="content">

		<header>

				<div class="navbar navbar-inverse">

					<div class="container relative">

                    	<div class="custom_iconhome">

                        	<a href="/"><img src="<? bloginfo('template_url') ?>/images/icon-home<?=is_front_page() ? "_hover" : ""?>.png" class="<?=is_front_page() ? "home-static-hover" : ""?>" /></a>

                        </div>

						<div class="navbar-header">

							<span class="hidden-desktop top-page-title"><? echo get_mobile_page_title(); ?></span>						

							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">

								<span class="icon-bar"></span>

								<span class="icon-bar"></span>

								<span class="icon-bar"></span>

							</button>													

						</div>



						<!-- start top nav -->

						

						<div class="navbar-collapse main-nav collapse">

							<ul id="menu-top-menu" class="nav navbar-nav">

								<li class="menu-item <?=(the_slug()=="a-propos-du-piolet") ? "active" : "";?>"><a href="/a-propos-du-piolet/">À propos</a></li>

								<li class="menu-item <?=(the_slug()=="notre-equipe") ? "active" : "";?>" id="notre-equipe-link"><a href="/notre-equipe/">Notre équipe</a></li>

								<li class="menu-item fair-un-don-hide"><a href="https://www.canadahelps.org/CharityProfilePage_sec.aspx?CharityID=s37926" target="_blank">FAIRE UN DON</a></li>

								<li class="menu-item" id="menu-item-special">

									<a href="javascript:void(0);">

										<div id="special-container" class="regular-container">

                                        	<span id="hit-equipe"></span>

											<p>

												<em>Faire un don au Piolet c’est aider des jeunes adultes en difficulté à se sortir de la pauvreté et de l’exclusion.</em><br />

												<em><strong>Soutenir le Piolet, c’est donner accès à l’autonomie, c’est préparer l’avenir.</strong></em>

											</p>

											<div class="special-btn" id="special-base">

												FAIRE UN DON <span class="icon-play" id="small-play"></span>

											</div>

											<span id="hit-donateurs"></span>

										</div> 	

									</a>

								</li>

								<li id="nos-donateurs-link" class="menu-item <?=(the_slug()=="nos-donateurs") ? "active" : "";?>"><a href="/nos-donateurs/">Nos donateurs</a></li>

								<li class="menu-item <?=(the_slug()=="contactez-nous") ? "active" : "";?>"><a href="/contactez-nous/">Contactez-nous</a></li>

							</ul>

						</div>								

												

						<!-- end top nav -->



					</div>

				</div>

			</header>

			

            

            <div class="<?= (is_home() ||  is_front_page()) ? 'banner-home' : 'banner-page' ?> banner">            					

                <? if (is_home() ||  is_front_page()){ ?>

                <div class="logo">

                    <a href="/">

                    <img src="<? bloginfo('template_url') ?>/images/logo.png" id="home_logo" />

                    </a>

                    <div class="logo-slogan">RESTAURATION &bull; FORMATION &bull; INSERTION</div>

                </div>

                <? }else{ ?>

                <div class="logo2">

                    <a href="/"><img src="<? bloginfo('template_url') ?>/images/logo2.png" id="sub_logo" /></a>

                </div>

                <? } ?>

				

				<!-- start menu nav -->

            <?

				// news/surveiller page detection

				$news_category = get_the_category();

				$active_surveiller = ( isset($news_category) && isset($news_category[1]) && $news_category[1]->slug == "a-surveiller" );

			?>



				<div class="banner-menu">

					<ul id="menu-navigation-menu">

						<li><a href="/restauration/" class="<?=(the_slug()=="restauration") ? "active" : "";?>"><span class='ubuntu-block'>Restauration</span></a></li>

						<li><a href="/banquets-et-location-de-salles/" class="<?=(the_slug()=="banquets-et-location-de-salles") ? "active" : "";?>"><span class='ubuntu-block'>Banquets et<br />location de salles</span></a></li>

						<li><a href="/formation-en-cuisine-ou-service/" class="<?=(the_slug()=="formation-en-cuisine-ou-service") ? "active" : "";?>"><span class='ubuntu-block'>Formation en cuisine<br />ou service</span></a></li>

						<li><a href="/logements-communautaires/" class="<?=(the_slug()=="logements-communautaires") ? "active" : "";?>"><span class='ubuntu-block'>Logements<br /> communautaires</span></a></li>

						<li><a href="/milieu-de-vie/" class="<?=(the_slug()=="milieu-de-vie") ? "active" : "";?>"><span class='ubuntu-block'>Milieu<br />de vie</span></a></li>

						<li><a href="/a-surveiller/" class="<?=(the_slug()=="a-surveiller" || $active_surveiller) ? "active" : "";?>"><span class='ubuntu-block'>À surveiller</span></a></li>

					</ul>

				</div>	

				

			<div class="banner-menu-slct">

				<!-- <div class="container"> -->

	<?

    

                wp_nav_menu(    array( 

                                'show_description' => false,

                                'menu' => 'Navigation Menu', 

                                'items_wrap'     => '<select id="drop-nav"><option value="">S&Eacute;LECTIONNER UNE PAGE...</option>%3$s</select>',

                                'container' => false,

                                'walker'  => new Walker_Nav_Menu_Dropdown(),

                                'theme_location' => 'primary')); 

    ?>



				<!-- </div> -->

            </div>



			<!-- end menu nav -->

            	<img src="<? bloginfo('template_url') ?>/images/<? echo get_banner_image();?>" class="block banner-img banner-<?=the_slug()?>" />

            </div>

            

            

			<div id="body">



