<div class="schoolitem">
    <div class="img">
        <a href="<?php echo isset($data->url)?$data->url:'';?>">
            <img width="230" height="135" src="<?php echo isset($data->img)?$data->img:'';?>" alt="">
        </a>
    </div>
    <div class="describe">
        <h3><a href="<?php echo isset($data->url)?$data->url:'';?>"><?php echo isset($data->title)?$data->title:'';?></a></h3>
        <p class="describeDetail">
            <?php
            if(isset($data->content)){
                if(mb_strlen($data->content,'utf-8')>500){
                    $content = mb_substr($data->content, 0, 260,'utf-8').'<span class="spoiler">'.mb_substr($data->content, 260, 50000,'utf-8');
                    echo nl2br($content);
                }else{
                    echo nl2br($data->content);
                }
            }
            ?>
        </p>
    </div>
    <div class="hackbox"></div>
</div>