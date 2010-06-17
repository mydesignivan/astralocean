var Contact = new function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(){
        $.validator.setting('#form1 .validator', {
            effect_show  : 'slidefade',
            validateOne  : true
        });
        $('#txtName, #txtConsult').validator({
            v_required  : true
        });
        $('#txtEmail').validator({
            v_required  : true,
            v_email     : true
        });            
    };

    this.send = function(){
        $.validator.validate('#form1 .validator', function(error){
            if( !error ){
                $('#form1').submit();
            }
        });
    };


    /* PRIVATE PROPERTIES
     **************************************************************************/


    /* PRIVATE METHODS
     **************************************************************************/

};