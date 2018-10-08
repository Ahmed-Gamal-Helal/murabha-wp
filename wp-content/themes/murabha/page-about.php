<?php
/**
 * Template name: من نحن
 */
get_header();
global $murabha;
?>


<?php 
    $postid = '19';
    $recent = new WP_Query('page_id='. $postid .'');
    while($recent->have_posts()):$recent->the_post();
?>
<!-- من نحن -->
<div class="welcome-board">
    <div class="container">
        <div class="row">
            <div class="border-show">
                <div class="col-sm-5">
                    <div class="first-welcome">
                        <img src="<?php the_post_thumbnail_url( ); ?>" class='img-fluid' alt="About Us" />
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="second-welcome">
                        <h2><?php the_title(); ?></h2>
                        <p><?php the_content(); ?></p>
                        <!-- <a href="about.php">المزيد</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    endwhile;
    wp_reset_query();
?>
    

    
<?php get_footer(); ?>