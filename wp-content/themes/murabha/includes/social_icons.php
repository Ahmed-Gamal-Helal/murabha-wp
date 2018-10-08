<?php

    global $murabha;

    if ($murabha['youtube'] == true):
        ?>
        <a href="<?php echo $murabha['youtube']; ?>" target="_blank" class="youtube"><i class="flaticon-youtube"></i></a>
        <?php
    endif;

    if ($murabha['facebook'] == true):
        ?>
        <a href="<?php echo $murabha['facebook']; ?>" target="_blank" class="facebook"><i class="flaticon-facebook-logo"></i></a>
        <?php
    endif;

    if ($murabha['twitter'] == true):
        ?>
        <a href="<?php echo $murabha['twitter']; ?>" target="_blank" class="twitter"><i class="flaticon-twitter"></i></a>
        <?php
    endif;

    if ($murabha['instagram'] == true):
        ?>
        <a href="<?php echo $murabha['instagram']; ?>" target="_blank" class="instagram"><i class="fab fa-instagram"></i></a>
            <?php
        endif;

    if ($murabha['google'] == true):
        ?>
        <a href="<?php echo $murabha['google']; ?>" target="_blank" class="instagram"><i class="flaticon-google-plus"></i></a>
            <?php
        endif;



    ?>

