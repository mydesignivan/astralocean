var Products = new function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(mode){

        mode_edit = mode;

        // Configura el editor
        tinyMCE.init({
            // General options
            mode : "exact",
            elements : "txtContent",
            theme: "advanced",
            plugins : "safari,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
            // Theme options
            theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
            theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
            theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,advhr,|,print,|,ltr,rtl,|,fullscreen",
            theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage,image",

            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "none",
            theme_advanced_resizing : false,


            // Example content CSS (should be your site CSS)
            content_css : "css/example.css",

            // Drop lists for link/image/media/template dialogs
            template_external_list_url : "js/template_list.js",
            external_link_list_url : "js/link_list.js",
            external_image_list_url : "js/image_list.js",
            media_external_list_url : "js/media_list.js",

            // Replace values for the template plugin
            template_replace_values : {
                    username : "Some User",
                    staffid : "991234"
            },

            width:'710px',
            height: '310px',
            onchange_callback: "myCustomOnChangeHandler",

            relative_urls : false,
            document_base_url : baseURI
        });
        
        var obj = $('a.jq-fancybox');        
        if( obj.length>0 ) obj.fancybox();

        // Configura el validador
        $.validator.setting('#form1 .validator', {
            effect_show     : 'slidefade',
            validateOne     : true
        });
        $('#txtProductName').validator({
            v_required  : true
        });

    };

    this.save = function(){
        $('#imgAL').show();
            
        $.validator.validate('#form1 .validator', function(error){
            if( !error && valid_others_fields() ){
                $('#form1').submit();
                
            }else $('#imgAL').hide();
        });
    };

    this.del = function(id){
        if( confirm('¿Confirm delete?') ){
            location.href = baseURI+'panel/products/delete/'+id;
        }
    };


    /* PRIVATE PROPERTIES
     **************************************************************************/
    var mode_edit=false;


    /* PRIVATE METHODS
     **************************************************************************/
    var valid_others_fields = function(){
        if( !mode_edit && $('#txtImage').val().length==0 ){
            show_error('#msgbox-image', 'Required Field.', '#msgbox-image');
            return false;
        }else $.validator.hide('#txtPssVeri');

        if( tinyMCE.get('txtContent').getContent().length==0 ){
            show_error('#msgbox-content', 'Required Field.', '#msgbox-content');
            return false;
        }else $.validator.hide('#txtContent');

        return true;
    }

};