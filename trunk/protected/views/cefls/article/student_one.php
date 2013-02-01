<div class="middle">
<!--        <img src="--><?php //echo $student->img; ?><!--" alt="" style="float:left;margin:5px;display: inline-block;width: 200px;">-->
<!--        --><?php //echo strip_tags($student->content); ?>

    <iframe frameborder="0" id="Article_content_ifr" src="/index.php/cate/ads_one?id=<?php echo isset($student->aid) ? $student->aid: ''; ?>" allowtransparency="true" style="margin-left: 25px;width: 810px; min-height: 700px;"></iframe>
    <p class="teacherDetailInfo">点击量：<?php echo isset($student->order) ? $student->order : '';?></p>
</div>