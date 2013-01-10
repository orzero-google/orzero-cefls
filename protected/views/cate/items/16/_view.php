<p class="list<?php
if($GLOBALS['i']%2 ==0){
    echo ' theline';
}
?>"><a><?php echo CHtml::encode($data->title);?>：
<?php echo CHtml::encode($data->content);?>
</a></p>

<?php
$GLOBALS['i']++;
?>