<?php /*
Template Name: Two column page
*/
?>
<?php get_header(); ?>
</div> <!-- end #body -->
<?php
// Get category and subcategories based from URI
// NOTE: page URL must match an existing category
$categoryObj = get_category_by_slug( the_slug() ); 
$categoryId = $categoryObj->term_id;
$currentNewsTag = isset($_GET["news-tag"]) ? $_GET["news-tag"] : date("Y");
$currentNews = get_news_items($currentNewsTag);
#$allNews = get_category_items($categoryId);
$allNews = get_categories("child_of={$categoryId}&hide_empty=1&order=DESC&orderby=ID");
?>

<div id="cortex-wrap"> 
	<div class="sub-menu">
		<div class="container">
		<? if ($allNews) { ?>
			<ul class="nav navbar-nav"> 
			<? foreach($allNews as $item) { ?>
				<li><a href="?news-tag=<?=$item->cat_name?>"><?=$item->cat_name?></a></li>  
			<? } ?>    
			</ul>
		<? } ?>
		</div>
	</div>

    <div id="surveiller">
		<div class="container">
			<div class="bgcream">&nbsp;</div>  
			<!-- main block -->  
			<? if($currentNews) { ?>
				<?  foreach ($currentNews as $k=>$item) { ?>
					<!-- start inner block -->
					
					<?
					$seed = $k +4;
					if($seed % 4 == 0) $col_class = 'bgcreamdark';
					elseif($seed % 4 == 1) $col_class = 'bgwhite';
					elseif($seed % 4 == 2) $col_class = 'bgwhite';
					else $col_class = 'bgcream';

					$even = true;
					$seed = $k + 2;
					if($seed % 2 == 1) $even = false;

                    
                    $singleitem = '<div class="'.$col_class.' '. ($k <= 1 ? '' : ' margintop50 ') .' ">
	                    <div class="surveillertitle-'. ($col_class == 'bgwhite' || $col_class == 'bgcream' ? 'cream' : 'white'). '">
                    		<a href="'.get_permalink($item->ID).'">&bull; '.$item->post_title.'</a>
                    	</div>';
                    
					if($img = wp_get_attachment_image_src( get_post_thumbnail_id( $item->ID ), 'col6' )){
	                    $singleitem .= '<a href="'.get_permalink($item->ID).'"><img class="img-responsive" alt="" src="'.$img[0].'" /></a>';
                    }
					
                    $singleitem .= '<div class="surveillersubtitle"> <span class="strong">'.date("d/m/Y", strtotime($item->post_date)).'</span>
						par  <span class="italic">'.get_the_author_meta('user_nicename', $item->post_author).'</span>
	                                      
						</div>
						<div class="surveillerhr-'.($col_class == 'bgwhite' ? 'cream' : 'white').'"></div>
	                    <div class="surveillercontent">
                    
	                    <p>'.$item->post_excerpt.'</p>
                    
	                    <a href="'.get_permalink($item->ID).'">Lire toute la nouvelle &gt;</a>
                    
						</div>
						</div>';
                    $groupitem[$k%2]  .= $singleitem;
                    ?>
				<? } ?> 
			<? } ?>  
            <div class="col-md-6">
            	<?=$groupitem[0]?>
            </div>
            <div class="col-md-6">
            	<?=$groupitem[1]?>
            </div>
			<!-- end main -->
            
			<div class="clear"></div>  
			<div class="padtop25">&nbsp;</div>  
		</div>
    </div> <!-- end surveiller -->
	
</div> <!-- end cortex-wrap -->

<?php get_footer(); ?>
