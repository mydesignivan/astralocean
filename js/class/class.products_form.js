var Products = new function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(mode, status){
        MessageShowHide(document, status);

        mode_edit = mode;

        // Configura el editor
        TinyMCE_init.width = '300px';
        TinyMCE_init.height = '300px';
        tinyMCE.init(TinyMCE_init);

        // Configura FancyBox
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
        $('.jq-ajaxloader').show();
            
        $.validator.validate('#form1 .validator', function(error){
            if( !error && valid_others_fields() ){
                $.post(baseURI+'panel/products/ajax_check_exists', {name : $('#txtProductName').val(), id : $('#product_id').val()}, function(data){
                    $('.jq-ajaxloader').hide();
                    if( data=="yes" ) show_error('#txtProductName', 'El producto ya existe');
                    else $('#form1').submit();
                })
                
            }else $('.jq-ajaxloader').hide();
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
    var This=this;
    var working=false;


    /* PRIVATE METHODS
     **************************************************************************/
    var valid_others_fields = function(){
        if( !mode_edit && $('#txtImage').val().length==0 ){
            show_error('#msgbox-image', 'Required Field.', '#msgbox-image');
            return false;
        }else $.validator.hide('#txtPssVeri');

        if( tinyMCE.get('txtContent_about').getContent().length==0 ){
            show_error('#msgbox-content1', 'Required Field.', '#msgbox-content1');
            return false;
        }else $.validator.hide('#msgbox-content');

        if( tinyMCE.get('txtContent_productcharacteristics').getContent().length==0 ){
            show_error('#msgbox-content2', 'Required Field.', '#msgbox-content2');
            return false;
        }else $.validator.hide('#msgbox-content2');

        if( tinyMCE.get('txtContent_freezingmethods').getContent().length==0 ){
            show_error('#msgbox-content3', 'Required Field.', '#msgbox-content3');
            return false;
        }else $.validator.hide('#msgbox-content3');

        return true;
    }

    var get_data = function(row){
        var arr = row.attr('id').substr(2).split('_');
        return {order : arr[0], id : arr[1]};
    }

};