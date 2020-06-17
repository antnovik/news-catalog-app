<?php
namespace app\components;
use Yii;
use yii\db\Query;

class Rubricator
{
    private $tblNews = 'news';
    private $tblRubrics = 'rubrics';
    public $rubricsByName;
    public $rubricsList;
    private $dbRequest;
 
	public function getNews($path){
        $arNews = $this-> dbRequest
        ->select(['path', 'name', 'text'])
        ->from($this-> tblNews)
        ->where(['like', 'path', $path.'%', false])
		->orderBy(['path' => SORT_ASC, 'name' => SORT_ASC])
        ->all();
		
		foreach($arNews as $index => $article){
			$path='';
			$rubricPath = '';
			$arPath = explode ('.', $article['path']);
			
			for($i = 0; $i <count($arPath); $i++){
				//$path .= $arPath[$i];
				if($i == 0) {
					$path =  $arPath[$i];
					$rubricPath = $this-> rubricsList[$path]['name'];
				}else{
					$path = $path.'.'. $arPath[$i];
					$rubricPath = $rubricPath.'/'.$this-> rubricsList[$path]['name'];
				}	
			}
			$arNews[$index]['rubric'] = $rubricPath;
		}
		return $arNews;
    }
	
	
	public function getNewsByRubricName($name){
		return $this-> getNews($this->rubricsByName[$name]['path']);
    }  

    public function getRubricsWithChildren($path){
        return $this-> dbRequest
        ->select(['*'])
        ->from($this->tblRubrics)
        ->where(['like', 'path', $path.'%', false])
        ->orderBy(['path' => SORT_ASC])
        ->all();
    }

    public function getRubricsWithChildrenByName($name){
		return $this-> getRubricsWithChildren($this->rubricsByName[$name]['path']);
    }
    
    function __construct(){
        $this-> dbRequest = new \yii\db\Query();
        $this-> dbCommand = Yii::$app->db->createCommand();

        $rubrics =  $this-> dbRequest
        ->select(['*'])
        ->from($this->tblRubrics)
        ->orderBy(['path' => SORT_ASC])
        ->all();

        foreach($rubrics as $index => $rubric){
            $rubric['path-array'] = explode ('.', $rubric['path']);
            $this-> rubricsByName[$rubric['name']] = $rubric;
			$this-> rubricsList[$rubric['path']] = $rubric;
        }    
    }
}
