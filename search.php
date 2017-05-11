<?php global $gs; ?>

<?php get_header(); ?>


<div class="page-title">
  <div class="maxwrap pure-g">
    <div class="pure-u-md-1-4 title-space">
    </div>
    <div class="pure-u-md-3-4 title-container">
      <h1>Search Results</h1>
    </div>
  </div>
</div>

<div class="page-content-container">
  <div class="maxwrap pure-g">
    
        <?php if(!$post->post_parent){

      $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");

      }else{

      if($post->ancestors)

      {

      $ancestors = end($post->ancestors);

      $children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0");

      }

      }
      if ($children) {

      ?>
      <div class="pure-u-md-1-4">
        <div class="internal-page-sidebar">   
          <ul> <?php echo $children; ?></ul>
        </div>
      </div>
      <div class="pure-u-md-3-4">

      <?php } else {
        echo '<style>.title-space {display:none;} .title-container {width:100%;text-align: center;}</style>' ;
        echo '<div class="pure-u-md-1-1">';}?>

      
    
      <div class="page-content search-results">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>  
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          <?php endwhile; else: ?>
                    
      <p>Sorry, no posts matched your criteria.</p>
                    
   <?php endif; ?>     
      </div>
    </div>
  </div>
</div>

                              
                


 
                
<?php get_footer(); ?>