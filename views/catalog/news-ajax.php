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
