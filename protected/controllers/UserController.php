<?php

class UserController extends Controller {
	
    /**
    * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
    * using two-column layout. See 'protected/views/layouts/column2.php'.
    */
    public $layout='//layouts/column2';

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
        /*return array(
            array(
                'allow', // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index', 'view'),
                'users'=>array('*'),
            ),
            array(
                'allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create', 'update'),
                'users'=>array('@'),
            ),
            array(
                'allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin', 'delete'),
                'users'=>array('admin'),
            ),
            array(
                'deny', // deny all users
                'users'=>array('*'),
            ),
        );*/
        return array(
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model'=>$this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new User;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            
            // A senha deve ser salva criptografada.
            if ($model->a003_password != "") {
                $model->a003_password = crypt($model->a003_password);
            }
            
            // Verificando se o login ou email já estão em uso.
            if ($this->checkIfUserExists($model)) {
                $model->a003_password = "";
            }
            else {
                if ($model->save()) {
                    // TODO: enviar o email com o link para o usuário confirmar que é um email válido.
                    //$this->redirect(array('view', 'id'=>$model->a003_id));
                    $this->redirect(array('created'));
                }
                else {
                    // Se deu erro ao salvar (não informou o email, por ex.), apaga a senha.
                    $model->a003_password = "";
                }
            }
        }

        $this->render('create', array(
            'model'=>$model,
        ));
    }
    
    /**
     * Lists all models.
     */
    public function actionCreated() {
        $this->render('created');
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            
            if ($model->save()) {
                $this->redirect(array('view', 'id'=>$model->a003_id));
            }
        }

        $this->render('update', array(
            'model'=>$model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('User');
        $this->render('index', array(
            'dataProvider'=>$dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new User('search');
        $model->unsetAttributes();  // clear any default values
        
        if (isset($_GET['User']))
            $model->attributes=$_GET['User'];

        $this->render('admin', array(
            'model'=>$model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return User the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = User::model()->findByPk($id);
        
        if ($model===null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    
    /**
     * 
     * @param type $model
     * @return boolean
     */
    public function checkIfUserExists($model) {
        if ($this->checkIfUserExistsByUsername($model->a003_username) || $this->checkIfUserExistsByEmail($model->a003_email)) {
            return true;
        }
        
        return false;
    }
    
    public function checkIfUserExistsByUsername($username) {
        $modelAux = new User;
        $modelAux->a003_username = $username;
        $dataProvider = $modelAux->search();
        
        if ($dataProvider->itemCount > 0) {
            return true;
        }

        return false;
    }
    
    public function checkIfUserExistsByEmail($email) {
        $modelAux = new User;
        $modelAux->a003_email = $email;
        $dataProvider = $modelAux->search();
        
        if ($dataProvider->itemCount > 0) {
            return true;
        }

        return false;
    }

    /**
     * Performs the AJAX validation.
     * @param User $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax']==='user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}