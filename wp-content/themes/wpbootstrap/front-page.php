<?php get_header(); 
$home_post = $wp_query->post;
?>
</div> <!-- end #body -->


<div class="container" id="home-wrap">

	<div class="col">

        <div class="col1of2 bgwhite">
		
			<? $post = get_post_from_category(27, 1) ?>
			
			<div class="featured-wrap">
				<!--
				<div class="featured-wrap-inner-left">
					<? if($post[0]->featured_image[0]){ ?>
						<a href="/restauration"><img src="<?php bloginfo('template_url');?>/images/home-restauration.jpg" class="img-responsive" /></a>
		            <? } ?>
		            <div class="title01">
		                <span class="titlearr"></span>
						<a href="/restauration" class="titletext">RESTAURATION</a>
		            </div>					
				</div>
				-->
				
				<div class="featured-wrap-inner-left">
					<a href="/restauration" class="restaurant-link"></a>
		            <div class="title01">
		                <span class="titlearr"></span>
						<a href="/restauration" class="titletext">RESTAURATION</a>
		            </div>					
				</div>				
				
				
				<div class="featured-wrap-inner-right">
						<a href="/banquets-et-location-de-salles" class="banquets-link"></a>
		            <div class="title01">
		                <span class="titlearr"></span>
						<a href="/banquets-et-location-de-salles" class="titletext mocha">BANQUETS ET<br />LOCATION DE SALLE</a>
		            </div>					
				</div>
								
            </div>

            
            <div class="pad25">
				<div id="inner-overlay-wrap">
					<div id="inner-overlay">
						<h3>&bull; LES MENUS DU PIOLET &bull;</h3>
						<p>Nous avons bien re&ccedil;u votre adresse courriel.</p>
						<p>Pour recevoir tous les menus de la semaine, allez cliquer sur le lien dans le courriel de confirmation que vous recevrez dans quelques instants dans votre boîte de messagerie.  Vous ne recevez pas de message? S-V-P, allez vérifier dans vos courriels indésirables ou spams. Si le message s'y retrouve, indiquer cet envoi comme étant sécuritaire pour ainsi le recevoir correctement.</p>
						<p>Merci de votre intérêt pour Le Piolet</p>
                        <p class="text-center"><br /><a href="javascript:;" class="btnblue" id="btn-notice">OK</a></p>
						<p><br /></p>
					</div>
				</div>

    			<!-- start menu block -->
					<div class="block center titlered">&bull; <? the_field('menu_heading', $home_post->ID)?> &bull;</div>
					<div class="center subtitlered"><? the_field('menu_sub_heading', $home_post->ID)?></div>
					<div>&nbsp;</div>
					<div class="col center">
					<? 
						echo get_field('menu_first_list', $home_post->ID);
					?>
					</div> 					 
				<!-- end menu block -->				
                
                <div>&nbsp;</div>
                <div>&nbsp;</div>

                <div class="row">

                	<div class="col-lg-4 receveztxt pull-left">
                        Recevez nos menus
                        avant tout le monde
                	</div>
                    <div class="col-lg-8">
					<form method="post">
						<input type="text"name="ne" id="ne" class="txtblue" placeholder="Entrez votre courriel" style="color:#b6b6b6"  /><input class="btnblue" type="button" id="btn-subscribe" value="OK" />
					</form>
                    </div>
                </div>
                
            	<div class="clear">&nbsp;</div>
            	<div class="clear">&nbsp;</div>
            	<div class="clear">&nbsp;</div>
            	<div class="clear">&nbsp;</div>
            </div>
        </div>
        <div class="col2of2 bgcream">


			<? $post = get_post_from_category(29, 1) ?>

			<? if($post[0]->featured_image[0]){ ?>
                <!--<a href="<?=get_permalink($post[0]->ID)?>"><img src="<?= $post[0]->featured_image[0] ?>" class="img-responsive" /></a>-->
				<a href="/formation-en-cuisine-ou-service"><img src="<?= $post[0]->featured_image[0] ?>" class="img-responsive" /></a>
            <? } ?>

            <div class="title02a">
                <span class="titlearr"></span>
                <!--<a href="<?=get_permalink($post[0]->ID)?>" class="titletext"><?=$post[0]->post_title?></a>-->
				<a href="/formation-en-cuisine-ou-service" class="titletext"><?=$post[0]->post_title?></a>
            </div>


			<? $post = get_post_from_category(31, 2) ?>
                        
            <div class="col1of2">
				<? if($post[0]->featured_image[0]){ ?>
                    <!--<a href="<?=get_permalink($post[0]->ID)?>"><img src="<?= $post[0]->featured_image[0] ?>" class="img-responsive" /></a>-->
                    <a href="/milieu-de-vie"><img src="<?= $post[0]->featured_image[0] ?>" class="img-responsive" /></a>				
                <? } ?>
                <div class="title02a">
                    <span class="titlearr"></span>
                    <!--<a href="<?=get_permalink($post[0]->ID)?>" class="titletext"><?=$post[0]->post_title?></a>-->
					<a href="/milieu-de-vie" class="titletext"><?=$post[0]->post_title?></a>
                </div>
            </div>
            
            <div class="col2of2">
				<? if($post[1]->featured_image[0]){ ?>
                    <!--<a href="<?=get_permalink($post[1]->ID)?>"><img src="<?= $post[1]->featured_image[0] ?>" class="img-responsive" /></a>-->
					<a href="/logements-communautaires"><img src="<?= $post[1]->featured_image[0] ?>" class="img-responsive" /></a>					
                <? } ?>
                <div class="title02b">
                    <span class="titlearr"></span>
                    <!--<a href="<?=get_permalink($post[1]->ID)?>" class="titletext"><?=$post[1]->post_title?></a>-->
					<a href="/logements-communautaires" class="titletext"><?=$post[1]->post_title?></a>					
                </div>
            </div>

            <div class="clear"></div>

			<div class="pad25">
            
				<? if (false) { ?>
            	<? $post = get_post_from_category(32, 1) ?>
                <a href="<?=get_permalink($post[0]->ID)?>" class="block center titlered"><?=$post[0]->post_title?></a>

                <? if($post[0]->featured_image[0]){ ?>
                	<a href="<?=get_permalink($post[0]->ID)?>"><img src="<?= $post[0]->featured_image[0] ?>" class="img-responsive" /></a>
                <? } ?>

                <?=$post[0]->post_content?>... <a href="<?=get_permalink($post[0]->ID)?>" class="strong red">plus ></a>

                <br /><br /><br /><br />
				<? } 
					// news section  / a surveiller
					$featured_objects = get_posts(array(
										'post_category'		=> 'a-surveiller',
										'posts_per_page'	=> -1,
										'meta_key'			=> 'featured_in_home_page',
										'meta_value'		=> true
									));
					if ($featured_objects) { ?>
						<p class="block center titlered">&bull; &Agrave; SURVEILLER &bull;</p>
						<? foreach($featured_objects as $news) { ?>
						<div class="center subtitlered2"><h4><?=$news->post_title?></h4></div>
							<div>&nbsp;</div>
							<?php /*?><?	if($img = wp_get_attachment_image_src( get_post_thumbnail_id( $news->ID ), 'col6' )) { ?>
								<a href="<?=get_permalink($news->ID)?>"><img class="img-responsive" src="<?=$img[0]?>" /></a>
							<? } ?>					
							<div>&nbsp;</div><?php */?>		
							<div><?=$news->post_excerpt?>&nbsp;<a href="<?=get_permalink($news->ID)?>" class="surveiller-link">Voir la nouvelle &gt;</a></div>
						<? } ?>
				<? } ?>
				
				
				<div>&nbsp;</div>
				<div>&nbsp;</div>					
                <div class="center"><a href="/a-surveiller/" class="btnblue">VOIR TOUTES LES NOUVELLES</a></div>
				<div>&nbsp;</div>
				<div>&nbsp;</div>
				<div>&nbsp;</div>
			</div>
        </div>

        <div class="clear"></div>	
    
    </div>
    
    
</div>

<script>
jQuery(document).ready(function($){		
	$("#btn-subscribe").click(function() {
		var email = $("#ne").val();
		var re = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-]{1,})+\.)+([a-zA-Z0-9]{2,})+$/;
		if (!re.test( email )) {
			alert("Please enter a valid email.");
			return false;
		} else {	
			var docHeight = $(document).height();
			$("body").append("<div id='overlay'></div>");
			$("#overlay")
				.height(docHeight)
				.css({
					'position': 'absolute',
					'top': 0,
					'left': 0,
					'background-color': 'rgba(0,0,0,0.5)',
					'width': '100%',
					'z-index': 5000
				});
			$("#inner-overlay-wrap").show();
			$(window).scrollTop($('#inner-overlay-wrap').offset().top);
			$.ajax({  
				type: "POST",  
				url: "http://lepiolet.com/wp-content/plugins/newsletter/do/subscribe.php",  
				data: "ne=" + $("#ne").val(),  
				success: function() {  
				
				}
			});					
		}		
	}); 
	
	$("#btn-notice").click(function(){
		$("#inner-overlay-wrap").hide();
		$("#overlay").remove();
	});
	
});
</script>	

<?php get_footer(); ?>