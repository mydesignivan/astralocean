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
    if ($("#slides-dock").length > 0) {
        $('#slides-dock').cycle({
                fx: "fade",
                slideExpr: "img",

                before: function() {
                        $("#slide-label").fadeOut();
                },
                after: function() {
                        $("#slide-label").fadeIn().html(this.alt);
                }
        });
    }

    /*------- Showcase FancyBox (lightbox) -------*/
    if ($("a.jfancy").length > 0) {
            $("a.jfancy").fancybox({
                    overlayOpacity: 0.6
            });

    }

})