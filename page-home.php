<?php 
/*
	Template Name: OC Home Page
	Description: This is a modified version of Mimbo's default index.php.  We're keeping the basic formatting but changing the content and the loop to pull from page content rather than from the blog
*/
 get_header(); ?>

<div id="content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	        
    <div id="lead" class="clearfloat">			 
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail('featured'); } ?></a>
		<div id="lead-text">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<?php if(get_post_meta($post->ID, 'ocslc_excerpt')) { echo get_post_meta($post->ID, 'ocslc_excerpt', true); } ?>
		</div>
	</div><!--END LEAD/STICKY POST-->
			
		
		<div id="more-posts">
			<div class="clearfloat recent-excerpts">
			<?php the_content(); ?>
			</div>
		</div>
		<?php endwhile; endif; ?>
	
    
    
	<div id="featured-cats"> 
	<h3><?php _e('Featured Categories','Mimbo'); ?></h3>

		<?php
        $display_categories = get_option('openbook_cats');
        foreach ($display_categories as $category) { 
        $showposts = get_option('openbook_featured_posts');	
        query_posts("showposts=$showposts&cat=$category");
        ?>

<h5><a href="<?php echo get_category_link($category);?>"><?php single_cat_title(); ?>&raquo;</a></h5>

        <ul>
        <?php while (have_posts()) : the_post(); ?>
        <li class="clearfloat"><p class="date"><?php the_time('n/d/y'); ?> &bull; </p><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
        </ul>
	<?php } ?>
    
</div><!--END FEATURED CATS-->

	
</div><!--END CONTENT-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
