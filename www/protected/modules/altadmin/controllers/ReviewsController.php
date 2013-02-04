<?php

class ReviewsController extends Controller
{
    public function actionIndex() {

        $model = Reviews::model()->findAll(array('order' => 'position DESC'));

        $this->render('index', array('model' => $model));
    }

    public function actionAdd() {
        
        $maxOrderNumber = Yii::app()->db->createCommand()
  ->select('max(position) as max')
  ->from('reviews')
  ->queryScalar();

$model = new Reviews;
        
        $model->position=$maxOrderNumber+1;
        $model->save();
        if (isset($model->reviews_id)) {
            Yii::app()->request->redirect('/altadmin/reviews/edit/' . $model->reviews_id);
        }
    }

    public function actionEdit($id = 0) {        
        $this->pageTitle = 'Редактирование отзыва | CMS ALTADMIN';
        $model = Reviews::model()->findByPk($id);
        $model->scenario='edit';
        if (isset($_POST['Reviews'])) {
            $model->attributes = $_POST['Reviews'];
            if ($model->validate()) {
                Yii::app()->user->setFlash('success', "Отзыв отредактирован");
                if (!isset($_POST['yt0'])) {
                    $model->save();
                }
                if (isset($_POST['yt2']) || isset($_POST['yt0'])) {
                    Yii::app()->request->redirect('/altadmin/reviews/');
                } else {
                    Yii::app()->request->redirect('/altadmin/reviews/edit/' . $model->reviews_id);
                }
                return;
            }
        }
        $this->render('edit', array('model' => $model));
    }

    public function actionDelete($id = 0) {
        if (!empty($id)) {
            Reviews::model()->deleteByPk($id);
            Yii::app()->user->setFlash('success', "Отзыв удален");
            Yii::app()->request->redirect('/altadmin/reviews/');
        } else {
            Yii::app()->user->setFlash('err', "Упс...");
        }
    }

    public function actionChangeOrder() {        
        // ('UPDATE notes SET note_order=:note_order WHERE id=:id');
	//преобразовываем строку в JSON формате в массив объектов
	$data = json_decode($_POST['neworder']);
	if (null == $data) {
		
	}
	//обновляем записи
	foreach ($data as $note) {
            $model = Reviews::model()->updateByPk(substr($note->id, 5), array('position'=>($note->order+1)));
	}
	//отправляем отчет браузеру
	echo json_encode(array('status'=>'OK'));


    }
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}