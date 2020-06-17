<?php
namespace app\controllers;

$this->registerJsFile(
    '@web/js/catalog.js', 
    ['depends' => ['yii\web\YiiAsset','yii\bootstrap\BootstrapPluginAsset']]
);

$this->registerCssFile(
    '@web/css/catalog-styles.css',
    ['depends' => ['yii\web\YiiAsset','yii\bootstrap\BootstrapPluginAsset']]
);
?>
<div>
    <h4>Демонстрация работы API</h4>
    <p>Запрос отправляется на адрес http://yii-gekko-test.ru.host1791095.serv7.hostland.pro/web/index.php?r=catalog/getjson</p>
    <p>Метод POST</p>
    <p>Параметры для запроса</p>
    <p><b>request</b> - тип запроса варианты значений:</p>

    <p><i>rubrics-by-name</i> - получить список дочерных рубрик</p>
    <p><i>news-by-rubric-name</i> - получить список новостей указанной рубрики и дочерних рубрик</p>

    <p><b>key</b> - идентификатор рубрики, для данных запросов название рубрики (с сохраненим заглавной буквы)</p>
    <p>Ниже примеры получения JSON данных по указанным запросам</p>

</div>

<h5><b>Получение списка дочерних рубрик</b></h5>
<div class='api-rubricator'>
    <ul>
    <?foreach($arRubrics as $rubric):?>
        <li><a href="javascript:void(0);" class="api-rubric-link" rubric-name="<?=$rubric['name'];?>" ajaxblock="1" req="rubrics-by-name" rubric="<?=$rubric['path'];?>"><?=$rubric['path'].' '.$rubric['name'];?></a></li>
    <?endforeach;?>
    </ul>
</div>

<div class="json-block" id="json-block-1">
</div>

<h5><b>Получение списка новостей</b></h5>
<div class='api-rubricator'>
    <ul>
    <?foreach($arRubrics as $rubric):?>
        <li><a href="javascript:void(0);" class="api-rubric-link" rubric-name="<?=$rubric['name'];?>" ajaxblock="2" req="news-by-rubric-name" rubric="<?=$rubric['path'];?>"><?=$rubric['path'].' '.$rubric['name'];?></a></li>
    <?endforeach;?>
    </ul>
</div>

<div class="json-block" id="json-block-2">
</div>