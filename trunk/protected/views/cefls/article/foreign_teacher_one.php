<?php
if(!empty($teacher)) :
?>
<div class="middle">
    <iframe frameborder="0" id="Article_content_ifr" src="/index.php/cate/article_one?id=<?php echo isset($teacher->aid) ? $teacher->aid: ''; ?>" allowtransparency="true" style="width: 810px; min-height: 700px;margin-left: 20px;"></iframe>
    <p class="teacherDetailInfo">点击量：<?php echo isset($teacher->clicknumber) ? $teacher->clicknumber : '';?></p>
</div>
<?php
endif;
?>