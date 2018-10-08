<?php global $murabha; ?>

<footer>
    <div class="container">
        <div class="map-part">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="osool">
                        <a href="<?php echo home_url(); ?>">
                            <img src="<?php echo $murabha['sitelogo']['url'] ?>" alt="مرابحة الأصول" class="img-fluid">
                        </a>
                        <p>
                            <?php
                                if (qtranxf_getLanguage() == 'en') {
                                    echo $murabha['small_title_murabha_en'];
                                } elseif (qtranxf_getLanguage() == 'ar') {
                                    echo $murabha['small_title_murabha'];
                                }
                            ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="list-unstyled footer-menu">
                        <?php bootstrap_nav_menu() ?>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <form action="" class='footer-form'>
                        <h5>اشترك الآن</h5>
                        <div class="form-group">
                            <input type="email" placeholder='البريد الإلكنرونى'>
                            <button><i class='flaticon-new-email-outline'></i></button>
                        </div>
                    </form>
                    <div class="details">
                        <ul>
                            <li class='located'><?php echo $murabha['phone'] ?></li>
                            <li class='numbers'><a href="mailto:info@website.com"> <?php echo $murabha['mail'] ?></a></li>
                            <li class='mails'><a href="#">info@website.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rights-reserved">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <div class="rights">
                        <p>
                            <?php
                                if (qtranxf_getLanguage() == 'en') {
                                    echo $murabha['footer_copyright_en'];
                                } elseif (qtranxf_getLanguage() == 'ar') {
                                    echo $murabha['footer_copyright_ar'];
                                }
                            ?>
                            <a target="_new" href="murabha.com"> 
                                <?php
                                    if (qtranxf_getLanguage() == 'en') {
                                        echo ('Murabha');
                                    } elseif (qtranxf_getLanguage() == 'ar') {
                                        echo ('مرابحه');
                                    }
                                ?>
                            </a>
                            <span>
                                <?php
                                    if (qtranxf_getLanguage() == 'en') {
                                        echo ('| design and devolope by ');
                                    } elseif (qtranxf_getLanguage() == 'ar') {
                                        echo ('| تصميم وبرمجة ');
                                    }
                                ?>
                            </span>
                            <a target="_new" href="breamx.com"> 
                                <?php
                                    if (qtranxf_getLanguage() == 'en') {
                                        echo ('Breamx');
                                    } elseif (qtranxf_getLanguage() == 'ar') {
                                        echo ('بريمكس');
                                    }
                                ?>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="left">
                        <ul class="d-inline">
                            <?php get_template_part('includes/social_icons'); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


        <?php wp_footer(); ?>
    </body>
</html>