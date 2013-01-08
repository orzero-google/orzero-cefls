<div class="top"></div>
<div class="middle">
    <p class="teacherDetail" >
        <img src="<?php echo $student->img; ?>" alt="" style="float:left;margin:5px;display: inline-block;width: 200px;">
        <?php echo strip_tags($student->content); ?>
    </p>
    <p class="teacherDetailInfo">点击量：<?php echo isset($student->order) ? $student->order : '';?></p>
</div>