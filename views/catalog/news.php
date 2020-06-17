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
<div class='rubricator'>
<ul>
<?foreach($arRubrics as $rubric):?>
    <li><a href="javascript:void(0);" class="rubric-link" rubric="<?=$rubric['path'];?>"><?=$rubric['path'].' '.$rubric['name'];?></a></li>
<?endforeach;?>
</ul>

</div>

<div id="news-block">

<?foreach($arNews as $article):?>
    <div class='article-header'>
    <span><?=$article['name'];?></span>
    </div>
    <div class='article-rubric'>
        <span>Рубрика: <?=$article['rubric'];?></span>
    </div>
    <div class='article-body'>
        <?=$article['text'];?>
    </div>
<?endforeach;?>
</div>
