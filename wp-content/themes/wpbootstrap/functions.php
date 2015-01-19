<?php 
function change_mce_options( $init ) {
$init['extended_valid_elements'] = 'div[*]';
return $init;
}
add_filter('tiny_mce_before_init', 'change_mce_options');

add_theme_support( 'post-thumbnails' );
add_image_size('col6', 600, 9999); //300 pixels wide (and unlimited height)

function wpbootstrap_scripts_with_jquery()
{
	// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/lib/bootstrap/js/bootstrap.js', array() );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );
}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
	
remove_filter('the_content', 'wpautop');

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}

function interior_page($atts=false) {
	global $wpdb;
	$template = isset($atts) && isset($atts["template"]) ? $atts["template"] : "default";
	include(get_template_directory()."/templates/" . $template .".php");
}
add_shortcode("interior_page", "interior_page");


function news_section(){
	include(get_template_directory().'/templates/news_section.php');
}
add_shortcode("news_section", "news_section");

add_action('init', 'submitformpopup');
function submitformpopup(){
	if($_SERVER['REQUEST_URI'] == '/submitformpopup/' || $_SERVER['REQUEST_URI'] == '/submitformpopup'){
		
		$to = get_bloginfo('admin_email');
		$subject = 'BANQUETS | New Inquiry';
		
		$message = '';
		foreach($_POST as $k=>$v){
			$message .= ucwords(str_replace('_', ' ', $k)).": {$v} \n<br/>";
		}
		
		/*
		$headers = 'From: <'.$_POST['courriel'].'>' . "\r\n";
		$args['from']['email'] = $_POST['courriel'];
		$args['from']['name'] = $_POST['nom'];
		$args['name'] = $_POST['nom'];
		$args['content'] = $message;
		$args['to']['email'] = $to;
		$args['subject'] = $subject;

		$data = array('args' => base64_encode(serialize($args)));
		$handle = curl_init('http://www.sproads.com/plugins/contact2.php');
		curl_setopt($handle, CURLOPT_POST, true);
		curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
		$return = curl_exec($handle);
	       */
	       
	       $name = $_POST['nom'] . ' ' . $_POST['prenom'];
	       $from = $_POST['courriel'];
	       
	       // Mailgun stab function
	       $config = array();
	       $config['api_key'] = "key-649pzaqeo8ta8y4ach66n9xwxnammko2";
	       $config['api_url'] = "https://api.mailgun.net/v2/dev.cortexmedia.ca/messages";
	       
	       $args['to'] = $to;
	       $args['cc'] = "restaurant@lepiolet.com";
	       $args['from'] = "{$name} <{$from}>";
	       $args['h:Reply-To'] = "{$name} <{$from}>";
	       $args['subject'] = $subject;
	       $args['html'] = $message;
	       
	       $ch = curl_init($config['api_url']);
	       curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	       curl_setopt($ch, CURLOPT_USERPWD, "api:{$config['api_key']}");
	       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	       curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	       curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	       curl_setopt($ch, CURLOPT_POST, true); 
	       curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
	       $result = curl_exec($ch);
	       curl_close($ch);
	       echo $result;
	       
		
		#echo 'done ' . $to;
		#echo $return;
		#wp_mail( $to, $subject, $message, $headers);
		#echo '<pre>'.print_r($message, 1).'</pre>';
		exit;
	}
}



/* Helper functions */
function the_slug() {
    $post_data = get_post($post->ID, ARRAY_A);
    $slug = $post_data['post_name'];
    return $slug; 
}

function get_category_items($categoryId=false) {
	global $wpdb;
	if (!$categoryId) return false;
	return get_categories("child_of={$categoryId}&hide_empty=0&order=DESC&orderby=ID");
}

function get_news_items($newsTag=false) {
	global $wpdb, $post;
	if (!$newsTag) return false;
	$args = array('category_name' => $newsTag );
	$news = get_posts($args);
	return $news;
}

function get_post_from_category($categoryId=false, $limit=20, $orderby=false, $order=false, $meta_key=false) {
	$args['posts_per_page'] = $limit;
	$args['category'] = $categoryId;
	if($orderby) $args['orderby'] = $orderby;
	if($order) $args['order'] = $order;
	if($meta_key) $args['meta_key'] = $meta_key;

	$posts = get_posts($args);
	
	
	foreach($posts as $k=>$v){
		$posts[$k] = $v;
		if (has_post_thumbnail( $v->ID ) ){
			$posts[$k]->featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $v->ID ), 'full' );
		}
		$posts[$k]->meta = get_post_meta($v->ID);
	}
	
	return $posts;
}


class Walker_Nav_Menu_Dropdown extends Walker_Nav_Menu{
    function start_lvl(&$output, $depth){
      $indent = str_repeat("\t", $depth); // don't output children opening tag (`<ul>`)
    }

    function end_lvl(&$output, $depth){
      $indent = str_repeat("\t", $depth); // don't output children closing tag
    }

    function start_el(&$output, $item, $depth, $args){
      // add spacing to the title based on the depth
      $item->title = str_repeat("&nbsp;", $depth * 4).$item->title;



        $output .= $indent . ' id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';  
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';  
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';  
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';  
        $attributes .= ! empty( $item->url )        ? ' value="'   . esc_attr( $item->url        ) .'"' : '';  
        
        $item_output .= '<option'. $attributes .'>';  
        $item_output .= $args->link_before .apply_filters( 'the_title', strtoupper($item->title), $item->ID );  
        $item_output .= '</option>';  
        
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );  



      // no point redefining this method too, we just replace the li tag...
      $output = str_replace('<li', '<option', $output);
    }

    function end_el(&$output, $item, $depth){
      $output .= "</option>\n"; // replace closing </li> with the option tag
    }
}

function get_section_items($sectionTag=false) {
	global $wpdb, $post;
	if (!$sectionTag) return false;
	$args = array('category_name' => $sectionTag, 'order' => 'ASC', 'orderby' => 'post_date', 'posts_per_page' => 50 );
	$section = get_posts($args);
	return $section;
}

function get_banner_image()
{
	if ( is_home() ||  is_front_page() ) {
		$banner = "Header_home.png";
	} else {
		switch ( the_slug() ) {
			case "banquets-et-location-de-salles":	
				$banner = "Header_banquets.png";
			break;
			case "a-propos-du-piolet":	
				$banner = "Header_a_propos.png";
			break;
			case "notre-equipe":	
				$banner = "Header_Equipe.png";
			break;
			case "nos-donateurs":	
				$banner = "Header_Nos donateurs.png";
			break;
			case "contactez-nous":	
				$banner = "Header_Contact.png";
			break;
			case "restauration":	
				$banner = "Header restauration.png";
			break;
			case "formation-en-cuisine-ou-service":	
				$banner = "Header-Formation.png";
			break;
			case "logements-communautaires":	
				$banner = "Header_Logements Communautaires.png";
			break;			
			case "milieu-de-vie":	
				$banner = "Header_Milieu de Vie.png";
			break;							
			case "a-surveiller":	
				$banner = "Header_home.png";
			break;
			default:
				$banner = "Header_home.png";
			break;
		}
	
	}
	return $banner;
	
}

function get_our_partners() {
	global $wpdb, $post;
	$args = array("category_name" => "our-partners", "posts_per_page" => 100, "meta_key" => "partners_order",  "orderby" => "meta_value_num", "order" => "ASC");
	$output = get_posts($args);
	return $output;
}

add_filter('show_admin_bar', '__return_false');


function get_mobile_page_title() {
	switch (the_slug()) {
		case "a-propos-du-piolet":
			$title = "&Agrave; propos";
		break;
		case "notre-equipe":
			$title = "Notre &eacute;quipe";
		break;
		case "nos-donateurs":
			$title = "Nos donateurs";
		break;
		case "contactez-nous":
			$title = "Contactez nous";
		break;
		case "restauration":
			$title = "Restauration";
		break;		
		case "formation-en-cuisine-ou-service":
			$title = "Formation en cuisine ou service";
		break;
		case "logements-communautaires":
			$title = "Logements communautaires";
		break;
		case "milieu-de-vie":
			$title = "Milieu de vie";
		break;
		case "a-surveiller":
			$title = "&Agrave; surveiller";
		break;
		default:
			$title = "Accueil";
		break;
	}
	return $title;
	return str_replace("-", " ", the_slug());
}