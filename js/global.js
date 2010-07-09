function show_error(el, msg, container){
    $('#imgAL').hide();

    if( typeof container=="undefined" ) container=null;
    $.validator.show(el,{
        message : msg,
        container : container
    });
    try{$(el).focus();}
    catch(e){}
}

function AlternatedRowColors(){
    $("#tblList tr:even").css("background-color", "#F7F7F7");
    $("#tblList tr:odd").css("background-color", "#ffffff");
}

function MessageShowHide(parent, status, t){
    if( !t ) t=5000;
    if( status!='' ){
        var div = $(parent).find(status=="ok" ? "div.success" : "div.error");
        if( div.is(':visible') ){
            setTimeout(function(){
                div.slideUp('slow');
            }, t);
        }else{
            div.slideDown('slow', function(){
                setTimeout(function(){
                    div.slideUp('slow');
                }, t);
            });
        }
    }
}

$(document).ready(function() {
    
    /*------- Alternated row Colors -------*/
    AlternatedRowColors();

    /*------- Hiding Portfolio Labels -------*/
    $(".folio-box .inner").hover(
      function () {
        $(this).parent().find(".proj-label").slideUp("fast");
      },
      function () {
        $(this).parent().find(".proj-label").slideDown();
      }
    );

    /*------- Homepage Slides -------*/
    if ($("#slider").length > 0) {
        $('#slider').cycle({
            fx: "fade",
            slideExpr: "img",

            before: function() {
                /*$("#slide-label").fadeOut();*/
            },
            after: function() {
                /*$("#slide-label").fadeIn().html(this.alt);*/
            }
        });
    }

})