<?php
/**
 * Description of MenuController
 *
 * @author jariel
 */
class MenuController extends Controller {
    
    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }
    
    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array(
                'allow', // allow all users to perform 'index' and 'view' actions
                'actions'=>array('goIndex'),
                'users'=>array('*'),
            ),
            array(
                'allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('goGirlsOnMap', 'goListGirls'),
                'users'=>array('@'),
            ),
            array(
                'deny', // deny all users
                'users'=>array('*'),
            ),
        );
    }
    
    public function actionGoIndex() {
        $this->render('/pages/main/index');
    }
    
    public function actionGoGirlsOnMap() {
        $this->render('/pages/girls/girlsonmap');
    }
    
    public function actionGoListGirls() {
        $this->render('/pages/girls/listgirls');
    }
}