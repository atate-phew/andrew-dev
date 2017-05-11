<?php global $gs; ?>

<?php get_header(); ?>


  <div class="p-title-container" style="background-color:<?php echo($gs['look-and-feel']['pf_laf_colour10']['0']); ?>;">
		<div class="p-title" style="background-color:<?php echo($gs['look-and-feel']['pf_laf_colour11']['0']); ?>;"><h1><?php the_title(); ?></h1></div>
</div>

<div class="maxwrap">
	<div id="mainplacement">
		<div class="pure-g" id="main-layout">
    		<div class="pure-u-1 pure-u-sm-24-24" id="content" style="background-color:<?php echo($gs['look-and-feel']['pf_laf_colour2']['0']); ?>;">
  
                <div id="main-content" style="background-color:<?php echo($gs['look-and-feel']['pf_laf_colour2']['0']); ?>;" >                        
                 	<div class="pure-g">
                    	<div class="pure-u-1 pure-u-sm-1-4">
                        	<div class="sidebar-nav">
                            	<?php  wp_nav_menu( array( 'menu' => 'Main Menu' ) ); ?>
                            </div>
                        </div>
                        <div class="pure-u-1 pure-u-sm-3-4">
                        	<div class="page-content">
                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								<?php the_title(); ?>
                            </div>
                        </div>
                    </div>
                              
                    
                    <?php endwhile; else: ?>
                    
                        <p>Sorry, no posts matched your criteria.</p>
                    
                    <?php endif; ?>
                
                <?php get_footer(); ?>