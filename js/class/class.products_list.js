var Products = new function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(){
        var arr = getData($('#tblList tbody tr:first').attr('id'));
        InitOrder = arr[0];

        //============= Configura Plugin TableDnD ============        
        $('#tblList').tableDnD({
            onDrop: function(table, row) {
                working=true;
                $.post(baseURI+'panel/products/ajax_order', $.tableDnD.serialize()+'&initorder='+InitOrder, function(data){
                    working=false;
                });
                AlternatedRowColors();
            },
            onDragStart : function(){

            },
            dragHandle : 'handle'
        });


    };

    this.del = function(id){
        if( confirm('¿Confirm delete?') ){
            location.href = baseURI+'panel/products/delete/'+id;
        }
    };



    /* PRIVATE PROPERTIES
     **************************************************************************/
    var working=false;
    var InitOrder = 0;


    /* PRIVATE METHODS
     **************************************************************************/
    var getData = function(str){
        return str.substr(2).split('_');
    };


};