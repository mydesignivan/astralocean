var Products = new function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(mode){

        mode_edit = mode;

        // Configura el editor
        tinyMCE.init({
            // General options
            mode : "textareas",
            theme : "advanced",
            plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",

            // Theme options
            theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
            theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
            theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
            theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",

            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",

            theme_advanced_statusbar_location : "bottom",
            theme_advanced_resizing : false,

            // Example content CSS (should be your site CSS)
            content_css : "css/content.css",

            // Drop lists for link/image/media/template dialogs
            template_external_list_url : "lists/template_list.js",
            external_link_list_url : "lists/link_list.js",
            external_image_list_url : "lists/image_list.js",
            media_external_list_url : "lists/media_list.js",

            // Replace values for the template plugin
            template_replace_values : {
                username : "Some User",
                staffid : "991234"
            },
            width  : '300px',
            height : '300px'

	});
        //-------------------------------------------------------------------------------------


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

    this.order = {
        up : function(el){
            if( working ) return false;

            var tr = $(el).parent().parent()[0];
            var table = $('#tblList');
            
            var row = $(table[0].rows[tr.rowIndex]);
            var rowNew = $(table[0].rows[tr.rowIndex-1]);


            var dat = get_data(row);
            var dat2 = get_data(rowNew);

            var param = {
                order2 : dat2.order,
                id2    : dat.id,

                order1 : dat.order,
                id1    : dat2.id
            };

            if( tr.rowIndex >1 ){
                working = true;
                $.post(baseURI+'panel/products/ajax_order', param, function(data){
                    if( data=="ok" ){
                        row.replaceWith('<tr id="'+rowNew.attr('id')+'">'+rowNew.html()+'</tr>' );
                        rowNew.replaceWith('<tr id="'+row.attr('id')+'">'+row.html()+'</tr>' );
                    }
                    working = false;
                });
            }
            return false;
        },

        down : function(el){
            if( working ) return false;

            var tr = $(el).parent().parent()[0];
            var table = $('#tblList');

            if( tr.rowIndex < table[0].rows.length-1 ){
                var row = $(table[0].rows[tr.rowIndex]);
                var rowNew = $(table[0].rows[tr.rowIndex+1]);

                var dat = get_data(row);
                var dat2 = get_data(rowNew);
                
                var param = {
                    order1 : dat2.order,
                    id1    : dat.id,

                    order2 : dat.order,
                    id2    : dat2.id
                };

                working = true;
                /*$.post(baseURI+'panel/products/ajax_order', param, function(data){
                    if( data=="ok" ){*/
                        row.replaceWith('<tr id="tr'+param.order2+'_'+param.id2+'">'+rowNew.html()+'</tr>' );
                        rowNew.replaceWith('<tr id="tr'+param.order1+'_'+param.id1+'">'+row.html()+'</tr>' );
                    /*}
                    working = false;
                });*/
            }
            return false;
        }

    };


    /* PRIVATE PROPERTIES
     **************************************************************************/
    var mode_edit=false;
    var This=this;
    var working=false;


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

    var get_data = function(row){
        var arr = row.attr('id').substr(2).split('_');
        return {order : arr[0], id : arr[1]};
    }

};