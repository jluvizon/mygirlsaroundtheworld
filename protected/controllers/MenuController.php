<?php

/**
 * Description of MenuController
 *
 * @author jariel
 */
class MenuController extends Controller {
    
    public function actionGoIndex(){
        $this->render('/pages/main/index');
    }
    
    public function actionGoGirlsOnMap(){
        $this->render('/pages/girls/girlsonmap');
    }
    
    public function actionGoListGirls(){
        $this->render('/pages/girls/listgirls');
    }
    
    public function actionGoAddNewGirl(){
        $this->render('/girl/newgirl');
    }
    
}
