<p class="items" style="border-bottom:1px solid #F7D2CC;">
<span class="field1"><a href="#"><?php echo CHtml::encode($data->title);?></a></span>
<span class="field2"><?php echo CHtml::encode($data->from);?></span>
<span class="field3"><?php echo CHtml::encode($data->author);?></span>
<span class="field4"><?php echo substr($data->createtime, 0, 10);?></span>
<span class="field5"><?php echo $data->clicknumber;?></span>
</p>