<?php global $breamx;
if ($breamx['facebook'] == true):
    ?>
    <a href="<?php echo $breamx['facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
<?php endif;
if ($breamx['twitter'] == true):
    ?>
    <a href="<?php echo $breamx['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
<?php endif;
if ($breamx['google'] == true):
    ?>
    <a href="<?php echo $breamx['google']; ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
<?php endif;
if ($breamx['youtube'] == true):
    ?>
    <a href="<?php echo $breamx['youtube']; ?>" target="_blank"><i class="fa fa-youtube"></i></a>
<?php
endif;
?>

