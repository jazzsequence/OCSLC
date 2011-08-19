<li class="clearfloat">
            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail('archivelist'); } ?></a>
			
	<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4> 
			
		<p class="postmetadata"><?php the_time('n/d/y'); ?> &bull; <span class="commentcount">(<?php comments_popup_link('0', '1', '%'); ?>)</span></p>  
			</li>