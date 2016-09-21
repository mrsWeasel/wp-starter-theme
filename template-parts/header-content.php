<?php 
/**
 * Template part for conditional page header content to be used outside of The Loop.
 * Or simply grab what you need and use it in one of the templates. They are your oats :)
 *
 *
 * @package Sassyscores
 */

global $post;
$page_heading = $page_subheading = ''; 
	if ( is_search() ) :
		$page_heading = get_search_query();
		$page_subheading = sprintf(esc_html('Search results for "%s"', 'sassyscores'), $page_heading);
	elseif ( is_404() ) :
		$page_heading = '404 – Page not found';
		$page_subheading = esc_html("Nothing was found at this location.", 'sassyscores'); 
	elseif ( is_category() ) :
		$category = get_the_category($post->ID);
		$page_heading = $category[0]->name;
		$page_subheading = sprintf(esc_html('All posts in category "%s"', 'sassyscores'), $page_heading);
	elseif ( is_tag() ) :
		$page_heading = single_tag_title('', false);
		$page_subheading = sprintf(esc_html('All posts tagged "%s"', 'sassyscores'), $page_heading);
	elseif ( is_author() ) :
		$author = get_userdata( get_query_var('author') );
		$page_heading = $author->nickname;
		$page_subheading = sprintf(esc_html('All posts written by %s', 'sassyscores'), $page_heading);
	elseif (is_day()) :
		$page_heading = get_the_date();
		$page_subheading = esc_html('Daily archive', 'sassyscores'); 
	elseif (is_month()) :
		$page_heading = get_the_date('F Y');
		$page_subheading = esc_html('Monthly archive', 'sassyscores'); 
	elseif (is_year()) :
		$page_heading = get_the_date('Y');
		$page_subheading = esc_html('Yearly archive', 'sassyscores'); 
	elseif ( is_home() ) :
		$page_heading = esc_html('Blog', 'sassyscores');
	elseif ( is_single() && ! is_attachment() ):
		$category = get_the_category($post->ID);
		$page_heading = get_the_title();
		$page_subheading = $category[0]->name . ' | ' . sassyscores_posted_on();	
	else :
		$page_heading = get_the_title();
	endif; ?>

<h1><?php echo esc_html($page_heading); ?></h1>
<?php if ('' != $page_subheading) : ?>
<p><?php echo $page_subheading; ?></p>
<?php endif; ?>	