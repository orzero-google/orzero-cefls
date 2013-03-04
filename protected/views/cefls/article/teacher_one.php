<?php
if(!empty($teacher)) :
?>
<div class="middle">
    <p class="teacherDetail" style="width:auto;margin-left: -20px;">
<!--        <img src="--><?php //echo isset($teacher->file) ? $teacher->file:''; ?><!--" alt="" style="float:left;margin:5px;display: inline-block;width: 200px;">-->
<!--        --><?php //echo isset($teacher->content) ? strip_tags($teacher->content): ''; ?>
    <iframe frameborder="0" id="Article_content_ifr" src="/index.php/cate/article_one?id=<?php echo isset($teacher->aid) ? $teacher->aid: ''; ?>" allowtransparency="true" style="width: 800px; min-height: 800px;"></iframe>
    </p>
    <p class="teacherDetailInfo">点击量：<?php echo isset($teacher->clicknumber) ? $teacher->clicknumber : '';?></p>
</div>
<?php
endif;
?>