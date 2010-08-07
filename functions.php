<?php
if ( function_exists('register_sidebar') )

register_sidebar(array('name'=>'sidebar1',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h2>',
'after_title' => '</h2>',
));




register_sidebar(array('name'=>'sidebar2',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h2>',
'after_title' => '</h2>',
));

/* A special thanks to We Function for their wonderful tutorial on how to create your own custom write panels. http://wefunction.com/2008/10/tutorial-creating-custom-write-panels-in-wordpress/ */
$new_meta_boxes =  
	array
	(
		"contact_wp_info" =>
		array
		(
			"name" => "contact_name",
			"std" => "",
			"title" => "Contact Name",
			"description" => ""
		),
		array
		(
			"name" => "organization_name",
			"std" => "",
			"title" => "Organization Name",
			"description" => ""
		),
		array
		(
			"name" => "title",
			"std" => "",
			"title" => "Title",
			"description" => ""
		),
		array
		(
			"name" => "email",
			"std" => "",
			"title" => "Email",
			"description" => ""
		),
		array
		(
			"name" => "mobile",
			"std" => "",  
			"title" => "Mobile",
			"description" => ""
		),
		array
		(
			"name" => "office_phone",
			"std" => "",
			"title" => "Office Phone",
			"description" => ""
		),
		array
		(
			"name" => "home_phone",
			"std" => "",
			"title" => "Home Phone",
			"description" => ""
		),
		array
		(
			"name" => "website",
			"std" => "",
			"title" => "Website",
			"description" => ""
		),
		array
		(
			"name" => "address_1",
			"std" => "",
			"title" => "Address 1",
			"description" => ""
		),
		array
		(
			"name" => "address_2",
			"std" => "",
			"title" => "Address 2",
			"description" => ""
		),
		array
		(
			"name" => "city",
			"std" => "",
			"title" => "City",
			"description" => ""
		),
		array
		(
			"name" => "county",
			"std" => "",
			"title" => "County",
			"description" => ""
		),
		array
		(
			"name" => "state",
			"std" => "",
			"title" => "State",
			"description" => ""
		),
		array
		(
			"name" => "zip",
			"std" => "",
			"title" => "Zip",
			"description" => ""
		),
		array
		(
			"name" => "country",
			"std" => "",
			"title" => "Country",
			"description" => ""
		),
		array
		(
			"name" => "avatar",
			"std" => "",
			"title" => "http://site/path_to_image.jpg",
			"description" => ""
		)		
	);

function new_meta_boxes()
{  
	global $post, $new_meta_boxes; 
	$wpcm_tab_index = 1000;
	foreach($new_meta_boxes as $meta_box)
	{  
		$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_wpcm_value', true);  
		if($meta_box_value == "")
			$meta_box_value = $meta_box['std'];
		echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';  
		echo'<p><label style="letter-spacing:1px; text-transform:uppercase; color:#777;" for="'.$meta_box['name'].'_wpcm_value">'.$meta_box['title'].'</label><br/>'; 
		echo'<input style="padding:4px; font-weight:bold; border-top:1px solid #ccc; border-right:1px solid #ddd; border-bottom:1px solid #ddd; border-left:1px solid #ccc;" type="text" name="'.$meta_box['name'].'_wpcm_value" value="'.$meta_box_value.'" size="55" tabindex="'.$wpcm_tab_index.'" /></p>'; 
		$wpcm_tab_index++;
	}
}
  
function create_meta_box()
{  
	global $theme_name;  
	if ( function_exists('add_meta_box') )
	{  
		add_meta_box('new-meta-boxes', 'Add New Contact', 'new_meta_boxes', 'post', 'normal', 'high');  
	}  
}

function save_postdata( $post_id )
{  
	global $post, $new_meta_boxes;  
	foreach($new_meta_boxes as $meta_box)
	{  
		// Verify  
		if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) ))
		{  
			return $post_id;  
		}
		if ( 'page' == $_POST['post_type'] )
		{  
			if ( !current_user_can( 'edit_page', $post_id ))  
			return $post_id;  
		}
		else
		{  
			if ( !current_user_can( 'edit_post', $post_id ))
			return $post_id;  
		}
		
		$data = $_POST[$meta_box['name'].'_wpcm_value'];
		
		if(get_post_meta($post_id, $meta_box['name'].'_wpcm_value') == "")
			add_post_meta($post_id, $meta_box['name'].'_wpcm_value', $data, true);  
		elseif($data != get_post_meta($post_id, $meta_box['name'].'_wpcm_value', true))
			update_post_meta($post_id, $meta_box['name'].'_wpcm_value', $data);
		elseif($data == "")
			delete_post_meta($post_id, $meta_box['name'].'_wpcm_value', get_post_meta($post_id, $meta_box['name'].'_wpcm_value', true));  
	}  
}


function list_categories( $args = '' ) {
	$defaults = array(
		'show_option_all' => '', 'orderby' => 'name',
		'order' => 'ASC', 'show_last_update' => 0,
		'style' => 'list', 'show_count' => 0,
		'hide_empty' => 1, 'use_desc_for_title' => 1,
		'child_of' => 0, 'feed' => '', 'feed_type' => '',
		'feed_image' => '', 'exclude' => '', 'exclude_tree' => '', 'current_category' => 0,
		'hierarchical' => true, 'title_li' => __( 'Categories' ),
		'echo' => 1, 'depth' => 0
	);

	$r = wp_parse_args( $args, $defaults );

	if ( !isset( $r['pad_counts'] ) && $r['show_count'] && $r['hierarchical'] ) {
		$r['pad_counts'] = true;
	}

	if ( isset( $r['show_date'] ) ) {
		$r['include_last_update_time'] = $r['show_date'];
	}

	if ( true == $r['hierarchical'] ) {
		$r['exclude_tree'] = $r['exclude'];
		$r['exclude'] = '';
	}

	extract( $r );

	$categories = get_categories( $r );

	$output = '';
	if ( $title_li && 'list' == $style )
			$output = '<li class="categories">' . $r['title_li'] . '<ul>';

	if ( empty( $categories ) ) {
		if ( 'list' == $style )
			$output .= '<li>' . __( "No categories" ) . '</li>';
		else
			$output .= __( "No categories" );
	} else {
		global $wp_query;

		if( !empty( $show_option_all ) )
			if ( 'list' == $style )
				$output .= '<li><a href="' .  get_bloginfo( 'url' )  . '">' . $show_option_all . '</a></li>';
			else
				$output .= '<a href="' .  get_bloginfo( 'url' )  . '">' . $show_option_all . '</a>';

		if ( empty( $r['current_category'] ) && is_category() )
			$r['current_category'] = $wp_query->get_queried_object_id();

		if ( $hierarchical )
			$depth = $r['depth'];
		else
			$depth = -1; // Flat.

		$output .= walk_category_tree( $categories, $depth, $r );
	}

	if ( $title_li && 'list' == $style )
		$output .= '</ul></li>';

	$output = apply_filters( 'wp_list_categories', $output );

	if ( $echo )
		echo $output;
	else
		return $output;
}

add_action('admin_menu', 'create_meta_box');  
add_action('save_post', 'save_postdata');

?>