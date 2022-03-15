
<?php

if(site_url()=="http://localhost/wordpress_prac/wordpress_theme_dev") {
	define("VERSION",time());
}else{
	define("VERSION",wp_get_theme()->get("Version"));
}





function wdev1_bootstraping(){

	add_theme_support("post-thumbnails");
	add_theme_support( "title-tag" );
	load_theme_textdomain("wdev1");
	register_nav_menus( array(
		'topmenu'=>__("Top Menu"),
		'footermenu'=>__("Footer Menu")
	) );

	$custom_header_var=array(
	 	'header-text'=>true,
	 	'default-text-color'=>"#222",
	 	'width'=>1000,
	 	'height'=>250,
	 	'flex-width'=>true,
	 	'flex-height'=>true
	 ); 

	add_theme_support( "custom-header",$custom_header_var);
	add_theme_support( "custom-background");



add_theme_support( 'custom-logo');


}
add_action( "after_setup_theme","wdev1_bootstraping");



function wdev1_assets(){
	wp_enqueue_style( "bootstrap","//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
	wp_enqueue_style( "featherlight-css", "//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.css" );
	
	wp_enqueue_script( "featherlight-js", "//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.js", array( "jquery" ), "0.0.1", true );

    wp_enqueue_script("alpha-main",get_theme_file_uri("/assets/js/main.js"),array("jquery","featherlight-js"),"0.0.1",true);

	wp_enqueue_style( 'style', get_stylesheet_uri() );
}

add_action( "wp_enqueue_scripts","wdev1_assets" );



function wdev1_widget(){

	register_sidebar( array(
        'name' => __( 'Sidebar Main', 'wpb' ),
        'id' => 'sidebar-1',
        'description' => __( 'The main sidebar appears on the right on each page except the front page template', 'wpb' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );


    register_sidebar( array(
        'name' => __( 'Footer', 'wpb' ),
        'id' => 'footer-1',
        'description' => __( 'The main sidebar appears on the right on each page except the front page template', 'wpb' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
 
}


add_action( "widgets_init","wdev1_widget");


function wdev1_nav_menu($classes , $item){
	
	 $classes[] = 'list-inline-item';
	 return $classes;
}


add_filter( "nav_menu_css_class", "wdev1_nav_menu",10,2 );






function wdev1_style_css(){
    if(is_page()){
    $about=get_the_post_thumbnail_url();?>
    <style type="text/css">
        .page-header{
        background-image:url(<?php echo $about;?>);
        }
    </style>
    <?php
       }

      if(is_front_page()){
 if(current_theme_supports("custom-header")){?>

   <style>
    .header{
 background-image:url(<?php echo header_image();?>);
 background-size: cover;
  height: 400px;
	}


	.header h1 a,h3.tagline{
    color:#<?php echo get_header_textcolor();?>
    <?php 
    	if(!display_header_text()){
    		echo "display:none";
			}
		 ?> 
    				
    }

    </style>



   <?php  }
 
 }


    
   }
add_action('wp_head','wdev1_style_css');



?>