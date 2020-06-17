$(function(){
    $('.rubric-link').click(function(){
        let rub = $(this).attr('rubric');
        $.ajax({
            url: 'index.php?r=catalog/getnews',
            data: {
                rubric: rub,
            },
            type: 'POST',
            success: function(result){
                if(result){
                    $('#news-block').html(result);
                }
            },
            error: function(jqXHR, status){
                console.log(status);
            }
        });
    });

    $('.rubricator-link').click(function(){
        let rub = $(this).attr('rubric');
        $.ajax({
            url: 'index.php?r=catalog/getrubrics',
            data: {
                rubric: rub,
            },
            type: 'POST',
            success: function(result){
                if(result){
                    $('#rubrics-block').html(result);
                }
            },
            error: function(jqXHR, status){
                console.log(status);
            }
        });
    });

    $('.api-rubric-link').click(function(){
        let rub = $(this).attr('rubric');
        let rubName = $(this).attr('rubric-name');
        let req = $(this).attr('req');
        let output = $(this).attr('ajaxblock');
        //alert(req);

          $.ajax({
            url: 'index.php?r=catalog/getjson',
            data: {
                key: rubName,
                request: req,
            },
            type: 'POST',
            success: function(result){
                if(result){
                    //console.log(result);
                    $('#json-block-'+output).html(result);
                }
            },
            error: function(jqXHR, status){
                console.log(status);
            }
        });
    });
})
    