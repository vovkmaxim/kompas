<div class="news">
    <li>
        <h3><p class="title-p" ><span class="title-span"> <?php echo CHtml::encode('«'.$data->title  . '»   ' . $data->getThisDate()); ?></span></p></h3>
        <div class="row">
            <div class="small-3 large-4 columns">
                <a class="fancybox th radius" href="/index.php/competition/<?php echo $data->id; ?>">
                    <?php echo $data->getLogoImage(); ?>
                </a>
               
            </div>
            <div class="small-8 columns">
                <?php echo CHtml::encode($data->description); ?>
            </div>
            <div class="more">       
                <div class="small-12 dop_in">
                    <b><?php echo CHtml::encode($data->getAttributeLabel('enable_registration_flag')); ?>:</b>
                    <?php if($data->enable_registration_flag){ echo 'Да'; } else { echo 'Нет'; } ?></br>
                    <b>Количество просмотров: <?php echo $data->views; ?></b></br>
                    <b>Количество комментариев: <?php echo $data->getCommentCount(); ?></b></br>
                    <b>Количество заявок: <?php echo $data->getCountRequest(); ?></b></br>    
                </div>
                <div class="small-12 text-right"><a href="/index.php/competition/<?php echo $data->id; ?>">Детальнее...</a></div>
            </div>
        </div>
    </li>
</div>
