/*	
	UnicaCorp - Modern Business Template
*/

$(document).ready(function() {
    
	/*------- Alternated row Colors -------*/
	$("tr:even").css("background-color", "#F7F7F7");
	
	/*------- Hiding Portfolio Labels -------*/
    $(".folio-box .inner").hover( 
      function () {
        $(this).parent().find(".proj-label").slideUp("fast");
      }, 
      function () {
        $(this).parent().find(".proj-label").slideDown();
      }
    );
	
	/*------- Contact Form Validation -------*/
	/* On focus change input and textarea color */
    $("#contact-form input, #contact-form textarea").focus(function () {
		/* Style */
        $(this).css("background","#FDFFCA");
        $(this).css("border-color","#DBDF6F");
    });
	/* On blur */
    $("#contact-form input, #contact-form textarea").blur(function () {
		var inputVal = jQuery.trim($(this).val()); /* Grabs actual input value and removes white space before and after it! */
		$(this).val(inputVal); /* Re-add the input without spaces */
		
		/* Style */
		$(this).css("background","white");
        $(this).css("border-color","#b7ddf2");
		
		var checkReq = $(this).attr("title"); /* Grabs input title="" */
		if (checkReq == "required" && inputVal == "") { /* If the title correspond to "required" AND the input is blank */
			$(this).css("background","#ffc9c9");
        	$(this).css("border-color","#ff4f4f");
    	} else {
    		$(this).css('background','#C9FFD0'); 
			$(this).css("border-color","#4FFF56");
		}
	});
	
	
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
		
	};

	/*------- Showcase FancyBox (lightbox) -------*/
	if ($("a.jfancy").length > 0) {
	
		$("a.jfancy").fancybox({
			overlayOpacity: 0.6
		});
			
	};
	
})