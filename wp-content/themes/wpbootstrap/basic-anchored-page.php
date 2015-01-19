<?php /*
Template Name: Basic layout anchored page
*/
?>
<?php get_header(); ?>
</div> <!-- end #body -->
<?php
// Get category and subcategories based from URI
// NOTE: page URL must match an existing category
$categoryObj = get_category_by_slug( the_slug() ); 
$categoryId = $categoryObj->term_id;
$anchors = get_category_items($categoryId);
$sections = get_section_items(the_slug());
?>
<div id="cortex-wrap">    
<? if ($anchors) { ?>
	<div class="sub-menu">
		<div class="container">
			<? // Temporary workaround for breaking up subcategory anchor labels for "Formation page"
				if ("formation-en-cuisine-ou-service" == the_slug()) {
			?>
			<ul class="nav navbar-nav">
				<li><a href="#formation-en-service">Formation <br />en Service</a></li>
				<li><a href="#formation-en-cuisine">Formation <br />en Cuisine</a></li>
				<li><a href="#criteres-d-admission">Criteres <br />d'admission</a></li>
				<li><a href="#conditions-de-travail">Conditions <br />de travail</a></li>
				<li><a href="#suivi-psychosocial">Suivi <br />psychosocial</a></li>
				<li><a href="#aide-a-la-recherche-d-emploi">Aide a la <br />recherche d'emploi</a></li>
				<li><a href="#taux-de-placement">Taux de <br />placement</a></li>
			</ul>

			<? } else { ?>		
			<ul class="nav navbar-nav">   
				<? foreach($anchors as $item) { ?>
                    <li><a href="#<?=$item->slug?>"><?=$item->cat_name?></a></li>  
                <? } ?>              
			</ul>
			<? } ?>
		</div>
	</div>
<? } ?>    

<? if($sections) { ?>
	<?  foreach ($sections as $item) { ?>
		<!-- start inner block --><? echo $item->post_content; ?><!-- end inner block -->
	<? } ?> 
<? } ?>

</div>	
<!-- <img src="http://localhost:8080/misc/piolet/wp-content/uploads/2013/11/restaurant1a.jpg" class="img-responsive" /> -->

<?php get_footer(); ?>
