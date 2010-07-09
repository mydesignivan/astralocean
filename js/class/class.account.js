var Account = new function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(status){
        MessageShowHide(document, status);

        $.validator.setting('#form1 .validator', {
            effect_show     : 'slidefade',
            validateOne     : true
        });

        $('#txtUser').validator({
            v_required  : true
        });
        $('#txtPssNew').validator({
            v_required  : false,
            v_password  : [8,10]
        });
        $('#txtPssVeri').validator({
            v_required  : false,
            v_compare   : '#txtPssNew'
        });

        $('input[type=password]').empty();
    };

    this.save = function(){
        $('#imgAL').show();

        $.validator.validate('#form1 .validator', function(error){
            if( !error ){
                if( $('#txtPssCurrent').val()!='' ){
                    if( validPss() ){
                        $.post(baseURI+'panel/myaccount/ajax_check_pss', 'pss='+$('#txtPssCurrent').val(), function(data){
                            $('#imgAL').hide();
                            if( data!="ok" ) show_error('#txtPssCurrent', 'The password is incorrect.');
                            else $('#form1').submit();
                        });
                    }
                }else $('#form1').submit();

            }else $('#imgAL').hide();

            return false;
        });
    };

    this.show_pss = function(){
        $('#divCont1').hide();
        $('#divCont2').fadeIn('slow');
        $('#txtPssCurrent').focus();
    };


    /* PRIVATE PROPERTIES
     **************************************************************************/


    /* PRIVATE METHODS
     **************************************************************************/
    var validPss = function(){
        if( $('#txtPssNew').val().length==0 ){
            show_error('#txtPssNew', 'Required Field.');
            return false;
        }else $.validator.hide('#txtPssNew');
        if( $('#txtPssVeri').val().length==0 ){
            show_error('#txtPssVeri', 'Required Field.');
            return false;
        }else $.validator.hide('#txtPssVeri');

        return true;
    }




};