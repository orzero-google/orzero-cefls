<?php
if(!empty($teacher)) :
?>
<div class="top"></div>
<div class="middle">
    <p class="teacherDetail" >
        <img src="<?php echo isset($teacher->file) ? $teacher->file:''; ?>" alt="" style="float:left;margin:5px;display: inline-block;width: 200px;">
        <?php echo isset($teacher->content) ? strip_tags($teacher->content): ''; ?>
    </p>
    <p class="teacherDetailInfo">点击量：<?php echo isset($teacher->clicknumber) ? $teacher->clicknumber : '';?></p>
</div>
<?php
endif;
?>