<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\components\Rubricator;


class CatalogController extends Controller {
	//определение шаблона
	public $layout = 'catalog';

	public function actionIndex(){
		$catalog = new Rubricator();
		return	$this->render('index', ['selectRubrics'=> $catalog->getRubricsWithChildren('1'), 'arRubrics' =>  $catalog->rubricsList]);
	}

	public function actionNews(){
		$catalog =  new Rubricator();
		return	$this->render('news', ['arNews' => $catalog->getNews('1'), 'arRubrics' =>  $catalog->rubricsList]);
	}

	public function actionGetnews(){
		if(!empty($_POST['rubric'])){
			$catalog =  new Rubricator();
			$arNews = $catalog->getNews($_POST['rubric']);
			if(!empty($arNews)){
				return $this->renderPartial('news-ajax', ['arNews'=>$arNews, 'current'=>$_POST['rubric']]);
			}else return false;
		}else return false;
	}

	public function actionGetrubrics(){
		if(!empty($_POST['rubric'])){
			$catalog =  new Rubricator();
			$arRubrics = $catalog->getRubricsWithChildren($_POST['rubric']);
			if(!empty($arRubrics)){
				return $this->renderPartial('rubrics-ajax', ['selectRubrics'=>$arRubrics, 'current'=>$_POST['rubric']]);
			}else return false;
		}else return false;
	}

	public function actionApi(){
		$catalog =  new Rubricator();
		return	$this->render('api', ['arRubrics' =>  $catalog->rubricsList]);
	}

	public function actionGetjson(){
		if(!empty($_POST['request']) && !empty($_POST['key'])){
			$catalog =  new Rubricator();
			$key = $_POST['key'];
			switch ($_POST['request']){
				case 'news-by-path':
					$dbData = $catalog->getNews($key);
					break;
				case 'rubrics-by-path':
					$dbData = $catalog->getRubricsWithChildren($key);
					break;
				case 'news-by-rubric-name':
					$dbData = $catalog->getNewsByRubricName($key);
					break;
				case 'rubrics-by-name':
					$dbData = $catalog->getRubricsWithChildrenByName($key);
					break;
			}
			if(!empty($dbData)){
				return json_encode($dbData, JSON_UNESCAPED_UNICODE);
			}else return false;
		}else return false;
	}
}