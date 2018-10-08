<?php global $murabha; ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo $murabha['favicon']['url'] ?>">
    <title>مرابحة الأصول</title>
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="overlay"></div>
    <header>
        <div id="wrapper">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <a href="#" class='exit-button'>
                    <i class='flaticon-close-circular-button-of-a-cross'></i>
                </a>
                <div class="sidebar-nav">
                    <?php bootstrap_nav_menu() ?>
                </div>
            </div>
        </div>
        <div class="first-navbar">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 auto-margin">
                        <div class="language">
                            <select name="" id="">
                                <option value="1">English</option>
                                <option value="1">عربى</option>
                            </select>
                            <i class="flaticon-global"></i>                            
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 socials auto-margin">
                        <ul class="d-inline">
                            <li class="nav-item"><a href="#" class='smart-one'><i class="flaticon-smartphone-call"></i>0125255625</a></li>
                            <li class="nav-item"><a href="#" class='hvr-pop'><i class="flaticon-youtube"></i></a></li>                  
                            <li class="nav-item"><a href="#" class='hvr-pop'><i class="flaticon-twitter"></i></a></li>
                            <li class="nav-item"><a href="#" class='hvr-pop'><i class="flaticon-google-plus"></i></a></li>
                            <li class="nav-item"><a href="#" class='hvr-pop'><i class="flaticon-facebook-logo"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6">
                    <div id="page-content-wrapper">
                        <a href="#menu-toggle" id="menu-toggle"><i class='flaticon-menu'></i></a>
                    </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="logo-area">
                            <a href="<?php echo home_url(); ?>">
                                <img src="<?php echo $murabha['sitelogo']['url'] ?>" alt="مرابحة الأصول" class="img-fluid">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
