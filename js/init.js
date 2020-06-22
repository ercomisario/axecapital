(function($){
  $(function(){
        $('#btn_agregar_campos').hide();
        $('#myDatepicker1').datetimepicker({
            format: 'DD/MM/YYYY'
        });
        $('#myDatepicker2').datetimepicker({
            format: 'DD/MM/YYYY'
        });
        $('#myDatepicker3').datetimepicker({
        format: 'HH:mm'
    });

  }); // end of document ready
})(jQuery); // end of jQuery name space
