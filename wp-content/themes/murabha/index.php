<?php global $murabha; ?>

<?php get_header(); ?>

<div class="main-carousle-details">
    <div class="owl-carousel owl-theme">
		<?php
            query_posts('post_type=slider&showposts=-1');
            if (have_posts()) {
                while (have_posts()) : the_post();
        ?>
        <div class="item">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
            <div class="camera-type">
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
            </div>
        </div>
        <?php endwhile; }?> 
        <?php wp_reset_query(); ?>
        </div>
    </div>  
</div>

<!-- من نحن -->
<?php 
    $postid = '19';
    $recent = new WP_Query('page_id='. $postid .'');
    while($recent->have_posts()):$recent->the_post();
?>
<div class="welcome-board">
    <div class="container">
        <div class="row">
            <div class="border-show">
                <div class="col-sm-5">
                    <div class="first-welcome">
                        <img src="<?php the_post_thumbnail_url( ); ?>" class='img-fluid grow' alt="About Us" />
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="second-welcome">
                        <h2><?php the_title(); ?></h2>
                        <?php the_content(); ?>
                        <a href="<?php the_permalink(); ?>" class='more'> 
                            <?php
                                if (qtranxf_getLanguage() == 'en') {
                                    echo ('more');
                                } elseif (qtranxf_getLanguage() == 'ar') {
                                    echo ('المزيد');
                                }
                            ?>
                        </a>
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

<!-- من أجلك -->
<div class="for-you">
    <div class="container">
        <h3 class='text-center for-title'>
            <?php
                if (qtranxf_getLanguage() == 'en') {
                    echo ('For You');
                } elseif (qtranxf_getLanguage() == 'ar') {
                    echo ('من أجلك');
                }
            ?>
        </h3>
        <div class="owl-carousel owl-theme">
        <?php
            query_posts('post_type=foruslider&showposts=-1');
            if (have_posts()) {
                while (have_posts()) : the_post();
                    ?>
            <div class="item hvr-wobble-vertical">
                <div class="repeated-item">
                    <div class="featured-one">
                        <img src="<?php the_post_thumbnail_url(); ?>" class='img-fluid hvr-shrink' alt="">
                    </div>
                    <h5><a href="#"><?php the_title(); ?></a></h5>
                    <?php the_content(); ?>
                    <a href="<?php the_permalink(); ?>" class='more-two'> 
                        <?php
                            if (qtranxf_getLanguage() == 'en') {
                                echo ('more');
                            } elseif (qtranxf_getLanguage() == 'ar') {
                                echo ('المزيد');
                            }
                        ?>
                    </a>
                </div>
            </div>
            <?php endwhile; } ?> 
            <?php wp_reset_query(); ?>
        </div>
    </div>
</div>

<!-- اطلب استشارتنا -->
<?php 
    $postid = '32';
    $recent = new WP_Query('page_id='. $postid .'');
    while($recent->have_posts()):$recent->the_post();
?>
<div class="welcome-board">
    <div class="container">
        <div class="row">
            <div class="border-show">
                <div class="col-sm-7">
                    <div class="second-welcome">
                        <h2><?php the_title(); ?></h2>
                        <?php the_content(); ?>
                        <a href="<?php the_permalink(); ?>" class='more'> 
                            <?php
                                if (qtranxf_getLanguage() == 'en') {
                                    echo ('more');
                                } elseif (qtranxf_getLanguage() == 'ar') {
                                    echo ('المزيد');
                                }
                            ?>
                        </a>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="first-welcome">
                        <img src="<?php the_post_thumbnail_url( ); ?>" class='img-fluid grow consult' alt="About Us" />
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

<!-- عملاؤنا -->
<div class="our-clients">
    <div class="container">
        <div class="hands-up">
            <h2 class='text-center'>
                <?php
                    if (qtranxf_getLanguage() == 'en') {
                        echo ('Success Partners');
                    } elseif (qtranxf_getLanguage() == 'ar') {
                        echo ('شركاء النجاح');
                    }
                ?>
            </h2>
        </div>
        <div class="owl-carousel owl-theme">
            <?php
                query_posts('post_type=successslider&showposts=-1');
                if (have_posts()) {
                    while (have_posts()) : the_post();
            ?>
            <div class="item">
                <div><img src="<?php the_post_thumbnail_url(); ?>" alt=""></div>
            </div>
                <?php endwhile; }?> 
                <?php wp_reset_query(); ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>