<?php get_header(); ?>
</div> <!-- end #body -->
<?php
$categoryObj = get_category_by_slug("a-surveiller"); 
$categoryId = $categoryObj->term_id;
#$allNews = get_category_items($categoryId);
$allNews = get_categories("child_of={$categoryId}&hide_empty=1&order=DESC&orderby=ID");
$currentNewsTag = isset($_GET["news-tag"]) ? $_GET["news-tag"] : date("Y");
$currentNews = get_news_items($currentNewsTag);
the_post();

?>

<div id="cortex-wrap">
	<div class="sub-menu">
		<div class="container">
		<? if ($allNews) { ?>
			<ul class="nav navbar-nav"> 
			<? foreach($allNews as $item) { ?>
				<li><a href="<?=bloginfo('url');?>/a-surveiller/?news-tag=<?=$item->cat_name?>"><?=$item->cat_name?></a></li>  
			<? } ?>    
			</ul>
		<? } ?>
		</div>
	</div>

    <div id="surveiller">
		<div class="container bgcream">
			<div class="col-md-6 pad-top">
				<p><a href="/a-surveiller" class="main-news-link">&lt; RETOUR</a></p>
				<span class="white-bar"></span>
				<div class="surveillertitle-bgcream"><?php the_title(); ?></div>				
				<div class="surveillersubtitle"> <span class="strong"><?php the_time('d/m/Y'); ?></span>
						par  <span class="italic">admin</span>
				</div>
				<div class="surveillercontent">
                	<p><?php the_content(); ?></p>                  
				</div>
				
			</div>
			<div class="col-md-6 pad-top-full">
				<span class="top-spacer">&nbsp;</span>		
				<?
					if ($img = wp_get_attachment_image_src( get_post_thumbnail_id( $item->ID ), 'col6' )) {
						$img_attr = wp_get_attachment_metadata(get_post_thumbnail_id( $item->ID ));
						
					?>		
					<img class="img-responsive" alt="" src="<?=$img[0]?>"></a>				
					<div class="title01" style="max-width: <?=$img_attr["width"]?>px;">
						<span class="titlearr"></span>
						<p><? echo get_post_meta(get_the_ID(), "Image caption", true);?></p>
					</div>					
                 <? } ?>	
                 
                 			
            
				<? if($currentNews) { ?>
				<div class="news-thumbnails">
				<?  foreach ($currentNews as $k=>$item) { 
						if ($img = wp_get_attachment_image_src( get_post_thumbnail_id( $item->ID ), 'thumbnail' )) { ?>
							<span>
								<a href="<?=get_permalink($item->ID);?>">
									<img alt="" src="<?=$img[0]?>">
								</a>
							</span>						
						<? } ?>					
					<? } ?>				
				</div>
				<? } ?>
			</div>
		</div>	
	</div>
</div> <!-- end cortex-wrap -->
<?php get_footer(); ?>