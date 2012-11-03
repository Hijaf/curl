$(function(){
    
    var trombiSize,
        $img = $('.choix'),
        index = 0,
        compteur = 1,
        idArticle;

    trombiSize = $($img).size();
    $img.not(':first').hide();
    $('.choix input#rad0').attr('checked','checked').hide();
    $('#buttonP').before(function(){return '<p class="compteur">'+compteur+' /'+trombiSize+'</p>'});
    $('#buttonS').on('click', bougerS);
    $('#buttonP').on('click', bougerP);
    
    function bougerS(){
        $img.eq(index).hide();
        if(index == trombiSize-1){
            index = 0;
            compteur = 1;
        }
        else{
            index++;
            compteur ++;
        }
        $img.eq(index).show();
        $('#rad'+index).attr('checked','checked').hide();
        $('.compteur').remove();
        $('#buttonP').before(function(){return '<p class="compteur">'+compteur+' /'+trombiSize+'</p>'});
    }
    
    function bougerP(){
        $img.eq(index).hide();
        if(index == trombiSize-1){
            index = 0;
            compteur = 1;
        }
        else{
            index--;
            compteur--;
        }
        $img.eq(index).show();
        $('#rad'+index).attr('checked','checked');
        $('.compteur').remove();
        $('#buttonP').before(function(){return '<p class="compteur">'+compteur+' /'+trombiSize+'</p>'});
    }
    
    $('.suppr').on('click', function(e){
        e.preventDefault();
        idArticle = $(this).attr('href').split("/");
        $.ajax({url: "http://localhost/curl/curl/supprimer/"+idArticle[6], 
          type: "GET",
          success:function(){
                $('#id'+idArticle[6]).slideUp("slow");
          }
        });   
    });
});


    

