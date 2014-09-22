<?php
$baseTheme = Yii::app()->theme->baseUrl . "/frontend";
$cs = Yii::app()->clientScript;
$cs->registerCoreScript('jquery');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="language" content="en"/>
        <link rel="stylesheet" href="<?php echo $baseTheme; ?>/css/all.css" type="text/css"/>
        <title><?php echo CHtml::encode(Yii::app()->name); ?></title>

        <style type="text/css">

        </style>
    </head>

    <body>

        <div id="wrapper">
            <div id="header">
                <h1 class="logo"><?php echo PEHtml::link(PEHtml::image("/upload/core/logo.png"), "/") ?></h1>
            </div>
            <div id="main">
                <div class="sign-in1">
                    <p>
                        <?php echo Yii::app()->maintenanceMode->message; ?>
                    </p>
                </div>
            </div>
        <div id="footer">
            <div class="row">
                <div class="copywrap">
                    <h1 class="logo"><a href="/"><?php echo PEHtml::image("/upload/core/logo.png") ?></a></h1>
                    <p class="copy">
                        <?php
                        echo Yii::t("CoreModule.frontend", "Copyright &copy;{year} {site} All Rights Reserved.", array(
                            '{year}' => date('Y'),
                            '{site}' => Yii::app()->params['domen_url']
                        ));
                        ?>
                    </p>
                </div>
                <ul class="partners">
                    <li><a href="#" class="ebay">&nbsp;</a></li>
                    <li><a href="#" class="paypal">&nbsp;</a></li>
                    <li><a href="#" class="visa">&nbsp;</a></li>
                    <li><a href="#" class="p-1">&nbsp;</a></li>
                    <li><a href="#" class="p-2">&nbsp;</a></li>
                    <li><a href="#" class="p-3">&nbsp;</a></li>
                </ul>
                <div class="print-banner">
                    <img src='<?php echo $baseTheme; ?>/images/ico-partners.png' alt="300watches" />
                </div>
            </div>
        </div>
        </div>
    </body>
</html>