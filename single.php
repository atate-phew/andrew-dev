<?php global $gs; ?>

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>  


<div class="page-title">
	<div class="maxwrap pure-g">
		<div class="pure-u-md-1-4 title-space">
		</div>
		<div class="pure-u-md-3-4 title-container">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>
</div>

<div class="page-content-container">
	<div class="maxwrap pure-g">
		

			<div class="pure-u-md-1-4">
				<div class="internal-page-sidebar">		
					<h3 class="news-categories-title">Categories</h3>
					<ul> <?php wp_list_categories('title_li='); ?></ul><br>

					<h3 class="news-categories-title">Archive</h3>
					<ul>
					<?php $args = array(
						'type'            => 'monthly',
						'limit'           => '',
						'format'          => 'html', 
						'before'          => '',
						'after'           => '',
						'show_post_count' => false,
						'echo'            => 1,
						'order'           => 'DESC',
					        'post_type'     => 'post'
					);
					wp_get_archives( $args ); ?>
					</ul>
				</div>
			</div>
			<div class="pure-u-md-3-4">


			<div class="page-content">
				<h2 class="main-branding-colour news-item-date"><?php $publishedDate = get_the_date(); echo $publishedDate; ?></h2>
				<?php $newStoryImage = get_field('pf_news_story_img');
				if($newStoryImage) {echo '<img src="' . $newStoryImage . '" alt="' . get_the_title() . ' Image" class="news-story-image" />';} else {} ?>

				<?php the_content(); ?>

				<p class="bottom-news-item-date">Published: <?php echo $publishedDate; ?></p>
				<div class="news-share-links">
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><img src="/wp-content/themes/phew/images/facebook-icon.png" alt="Facebook Share Icon" /></a>
					<a href="https://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?>" target="_blank"><img src="/wp-content/themes/phew/images/twitter-icon.png" alt="Twitter Share Icon" /></a>
					<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>E&summary=&source="><img src="/wp-content/themes/phew/images/linked-in-icon.png" alt="inkedin Share Icon" /></a>
					<a href="mailto:?subject=<?php the_title() ?>&body=<?php the_permalink(); ?>"><img src="/wp-content/themes/phew/images/email-icon.png" alt="Email Share Icon" /></a>                	               		                		               	                
                </div>
			</div>
		</div>
	</div>
</div>

                              
   <?php endwhile; else: ?>
                    
      <p>Sorry, no posts matched your criteria.</p>
                    
   <?php endif; ?>                    


 
                
<?php get_footer(); ?>