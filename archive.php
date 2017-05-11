<?php global $gs; ?>

<?php
  get_header();
?>


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
                <?php the_content(); ?>
                <?php 
                    global $paged;
                    $curpage = $paged ? $paged : 1;
                    $args = array(
                        'post_type' => 'post',
                        'orderby' => 'post_date',
                        'posts_per_page' => 3,
                        'paged' => $paged
                    );
                    $query = new WP_Query($args);
                    if($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                    ?>
                     
                     <div class="news-page-item pure-g">
                        <div class="pure-u-md-1-4">
                            <div class="news-page-item-image">
                                <?php if ( has_post_thumbnail() ) {
                                the_post_thumbnail();
                            }
                            else {echo '<img src="/wp-content/themes/phew/images/default-news.jpg" alt="News Image" />';}   
                            ?>
                            </div>
                        </div>
                        <div class="pure-u-md-3-4">
                            <div class="news-page-item-content">                                                     
                                <p class="news-page-item-title"><?php the_title(); ?></p>
                                <p class="news-page-item-blurb"><?php echo excerpt(30); ?></p>
                                <a href="<?php the_permalink() ?>">Read More</a> 
                            </div>   
                        </div>
                     </div>


                    <?php
                    endwhile;
                        echo '
                        <div id="wp_pagination">
                            <!-- <a class="first page button" href="'.get_pagenum_link(1).'">&laquo;</a>
                            <a class="previous page button" href="'.get_pagenum_link(($curpage-1 > 0 ? $curpage-1 : 1)).'">&lsaquo;</a>-->';
                            for($i=1;$i<=$query->max_num_pages;$i++)
                                echo '<a class="'.($i == $curpage ? 'active ' : '').'num-button" href="'.get_pagenum_link($i).'">'.$i.'</a>';
                            echo '
                            <a class="next-page-button main-branding-colour" href="'.get_pagenum_link(($curpage+1 <= $query->max_num_pages ? $curpage+1 : $query->max_num_pages)).'">NEXT</a>'; 
                            /*<a class="last page button" href="'.get_pagenum_link($query->max_num_pages).'">&raquo;</a> */
                        echo '</div> ';
                        wp_reset_postdata();
                    endif;
                    ?>
            </div>
        </div>
    </div>
</div>


                
<?php get_footer(); ?>