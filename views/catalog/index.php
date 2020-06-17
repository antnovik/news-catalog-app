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
    <li><a href="javascript:void(0);" class="rubricator-link" rubric="<?=$rubric['path'];?>"><?=$rubric['path'].' '.$rubric['name'];?></a></li>
<?endforeach;?>
</ul>

</div>

<div id="rubrics-block">

<?foreach($selectRubrics as $rubric):?>
    <div class='rubric'>
    <span><?=$rubric['name'];?></span>
    </div>
<?endforeach;?>
</div>