<style>
body{font-size:12px;}
</style>
<!-- index's slide  -->
<div class="videoList-container" id="pcList" style="display:none;margin-bottom:0px;">
    <?php echo get_img_slides(); ?>
</div>


<!-- index's newsPlan  -->
<div class="newsPlan">
    <?php echo get_xzjy(); ?>
    <?php echo get_xykx(); ?>
    <?php echo get_gsgg(); ?>
</div>

<!-- index's adList  -->
<?php echo get_index_adlist(); ?>

<!-- index's foreign -->
<div class="foreignPlan">
<div class="top">
    <ul>
        <li class="hover">English</li>
        <li>Française</li>
        <li>Deutsch</li>
    </ul>
</div>

<?php echo get_index_foreign();?>

</div>
