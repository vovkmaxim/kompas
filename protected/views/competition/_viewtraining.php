<?php
/* @var $this CompetitionController */
/* @var $data Competition */
?>
<div class="news">
    <li>
        <h3><p class="title-p" ><span class="title-span"> <?php echo CHtml::encode('«'.$data->title  . '» ' . $data->getThisDate()); ?></span></p></h3>
        <div class="row">
            <div class="small-3 large-4 columns">
                <a class="fancybox th radius" href="/index.php/competition/<?php echo $data->id; ?>">
                    <?php echo $data->getLogoImage(); ?>
                </a>
               
            </div>
            <div class="small-8 columns">
                <?php echo $data->description; ?>
            </div>
            <div class="more">                
                <div class="small-12 text-right"><?php echo CHtml::link(CHtml::encode('Детальнее...'), array('view', 'id'=>$data->id)); ?></div>
            </div>
        </div>
    </li>
</div>
