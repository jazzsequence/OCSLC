<div id="sidebar">


<!--BEGIN 'MORE FROM THIS CATEGORY'-->		
	<?php
		if ( is_single() ) :
		global $post;
		$categories = get_the_category();
		foreach ($categories as $category) :
   		$posts = get_posts('numberposts=4&exclude=' . $GLOBALS['current_id'] . '&category='. $category->term_id);
		if(count($posts) > 1) {
	?>
	
	<div class="widget">
	<h3><?php _e('More in','Mimbo'); ?> '<?php echo $category->name; ?>'</h3>
	<ul>
	
	<?php foreach($posts as $post) : ?>
	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	<?php endforeach; ?>
	
	</ul>
	</div>
	
	<?php } ?>

<?php endforeach; ?>
<?php endif; ?>


<!--END-->




<!--BEGIN SUBPAGE MENU-->

<?php if (is_page()) { ?>
<?php include_once (TEMPLATEPATH . "/childnav.php"); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<?php if ($children) { ?>  
					<h3><?php _e('In this section:','Mimbo'); ?></h3>
					
					<ul class="subpages">
					<?php if ($section_overview) {echo $section_overview;} ?>
					<?php echo $children; ?>
					</ul>
				<?php } ?>
				
	<?php endwhile; ?>
	<?php endif; ?>
<?php } ;?>

<!--END SUBPAGE MENU-->

	<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
	<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" /><input type="image" src="<?php bloginfo('template_url'); ?>/images/magnify.gif" id="searchsubmit" />
	</form>	

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Mimbo Sidebar') ) : ?><?php endif; ?>
 		
<p><a href="http://xmission.com" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/xmission.gif" alt="Internet Services Donated by XMission" class="xmission-credit" /></a></p>
</div><!--END SIDEBAR-->