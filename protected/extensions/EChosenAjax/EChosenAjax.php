<?php

/**
 * EChosen class file.
 * 
 * @author Andrius Marcinkevicius <andrew.web@ifdattic.com>
 * @copyright Copyright &copy; 2011 Andrius Marcinkevicius
 * @license Licensed under MIT license. http://ifdattic.com/MIT-license.txt
 * @version 1.0
 */

/**
 * EChosen makes select boxes much more user-friendly.
 * 
 * @author Andrius Marcinkevicius <andrew.web@ifdattic.com>
 */
class EChosenAjax extends CWidget
{

    /**
     * @var string apply chosen plugin to these elements.
     */
    public $target = '.chzn-select';
    public $url;
    public $data;

    /**
     * Apply chosen plugin to select boxes.
     */
    public function run()
    {
        $dataArr = json_encode($this->data);
        // Publish extension assets
        $assets = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias(
                        'ext.EChosenAjax') . '/assets');
        $cs = Yii::app()->getClientScript();
        $cs->registerCssFile($assets . '/chosen.css');
        $cs->registerScriptFile($assets . '/chosen.jquery-0.9.8.js');
        $cs->registerScriptFile($assets . '/chosen.ajaxaddition.jquery.js');
        $cs->registerScript('chosen', "$( '{$this->target}' ).ajaxChosen({
        dataType: 'json',
            type: 'POST',
            data: {$dataArr},
            url:'{$this->url}'
        },{
            loadingImg: '{$assets}/loading.gif'
        });");
    }

}
?>
