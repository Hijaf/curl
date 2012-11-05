$(function(){
    
    var trombiSize,
        $img = $('.choix'),
        index = 0,
        compteur = 1,
        description,
        titre,
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
        if(index == 0){
            index = trombiSize-1;
            compteur = trombiSize;
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
    
    $('.modif').on('click', function(e){
       e.preventDefault();
       idArticle = $(this).attr('href').split("/");
       titre = $('#id'+idArticle[6]+' h3').hide().text();
       $('#id'+idArticle[6]+' h3').after(function(){return '<input class="inputTitre" name="titre" type="text" value="'+titre+'"/>'});
       description = $('#id'+idArticle[6]+' .descrip').hide().text();
       $('#id'+idArticle[6]+' .descrip').after(function(){return '<textarea class="descripText" name="description">'+description+'</textarea>'})
       $('#id'+idArticle[6]+' .descripText').after(function(){return '<p id="submitModif"><input type="submit" value="Valider les modifications" class="monSubmit bouton"><input type="button" value="Annuler les modifications" class="monAnnuler bouton"></p>'});
       
       $('.monSubmit').on('click', function(e){
          $.ajax({url: "http://localhost/curl/curl/maj/", 
          type: "POST",
          dataType: "json",
          data: {titre: $(".inputTitre").val(), description: $(".descripText").val(), id: idArticle[6]},
          success:function(){
                window.location.reload();
          }
        });           
       });
       
       $('.monAnnuler').on('click',function(e){
          window.location.reload(); 
       });
    });
});