<?php

class MaintenanceController extends CExtController
{

    public function actionIndex()
    {
//        $this->redirect(array("/auth/ajaxlogin"));
//        Yii::app()->user->loginRequired();
        $this->renderPartial('index');
    }

}
