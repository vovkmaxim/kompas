<?php
/* @var $this EventsController */
/* @var $data Events */
?>

<div class="news">
    <li>
        <p class="title-p" ><span class="title-span"><?php echo CHtml::encode($data->title); ?></span><span class="more create-data"><?php echo $data->explodeThisDate($data->create_date); ?></span></p>
        <?php echo  $data->getFileForThisEvents();?>
        <div class="row">
            <div class="small-3 large-4 columns">
                <a class="fancybox th radius" href="/index.php/events/view/<?php echo $data->id; ?>">
                    <img width="147" height="115" src="/logo_events/thromb/<?php echo CHtml::encode($data->logo_path); ?>" alt="<?php echo CHtml::encode($data->title); ?>" />
                </a>
               
            </div>
            <div class="small-8 columns">
                <?php echo $data->description; ?>
            </div>
            <div class="more">
                <div class="small-8 text-right"><?php echo CHtml::link(CHtml::encode('Детальнее...'), array('events/view', 'id'=>$data->id)); ?></div>
            </div>
        </div>
    </li>
</div>