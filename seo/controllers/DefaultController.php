<?php
/**
 * DefaultController class file
 *
 * @author Ivan Suvorov <ivan@idol-studio.com>
 * @link http://idol-it.com/
 * @copyright Copyright &copy; 2012 Idol-IT
 * @license BSD licence
 */

class DefaultController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='/layouts/main';

    /**
     * @return array action filters
     */
    /*public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }*/

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    /*public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index','view'),
                'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create','update'),
                'users'=>array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','delete'),
                'users'=>array('admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }*/

    /**
     * Manages all models.
     */
    public function actionIndex()
    {
        $model=new YiiSeo('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['YiiSeo']))
            $model->attributes=$_GET['YiiSeo'];

        $this->render('index',array(
            'model'=>$model,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model=new YiiSeo;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['YiiSeo']))
        {
            $model->attributes=$_POST['YiiSeo'];
            $exist = YiiSeo::model()->findByAttributes(array("type"=>$model->type,'url'=>$model->url,'language'=>$model->language));

            if(count($exist)){
                Yii::app()->user->setFlash('error', "Такие данные уже существуют. ID = ".$exist->id);
                $this->redirect(array('index'));
            }
            else
            {
                if($model->save()){
                    Yii::app()->user->setFlash('success', "Данные сохранены");
                    $this->redirect(array('index'));
                }
            }


        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['YiiSeo']))
        {
            $model->attributes=$_POST['YiiSeo'];

                if($model->save()){
                    Yii::app()->user->setFlash('success', "Данные сохранены");
                    $this->redirect(array('index'));
                }

        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        if(Yii::app()->request->isPostRequest)
        {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if(!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }




    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model=YiiSeo::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='food-seo-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }


    /**
     * Получение списка всех моделей в проекте
     */
    public function getModels()
    {
        //путь к директории с проектами
        $file_list = scandir('/home/test/www/protected/models');
        //$file_list = scandir('/var/www/vhosts/powerteam.md/public_html/protected/models');
        $models = null;
        //если найдены файлы
        if(count($file_list))
        {
            foreach($file_list as $file)
            {
                $ext = explode(".",$file);
                //проверяем чтобы модели были с расширением php
                if($ext[1] == "php")
                    $models[] = $ext[0];
            }
        }
        return $models;
    }

    /**
     * Получение списка артибутов всех моделей
     */
    public function getParams(){
        //загружаем модели
        $models = $this->getModels();
        $params= null;
        $i = 0;
        if(count($models)){
            foreach($models as $model){
                $item = new $model;
                if(count($item)){
                    foreach($item as $attr=>$val){
                        $params[$i]['group'] = $model;
                        $params[$i]['name'] = $attr;
                        $params[$i++]['value'] = $model.'/'.$attr;
                    }
                }
            }
            return $params;
        }
        else
            return null;
    }

    public function actionCheck($id){
        $item=$this->loadModel($id);

        if($item->is_active == 0)
            $item->is_active = 1;
        else
            $item->is_active = 0;
        $item->save();
        $this->redirect(Yii::app()->request->urlReferrer);
    }
}