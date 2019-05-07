$(document).ready(function() {
    $('#table').DataTable();
    $('#table1').DataTable();
    $('#table2').DataTable();

    $('#see_pw').click(function(e){
      if($(this).find('i').attr('class') == 'fa fa-eye'){
        $(this).find('i').attr('class','fa fa-eye-slash');
        $(this).parent().parent().find('input').attr('type','text');
      }else{
        $(this).find('i').attr('class','fa fa-eye');
        $(this).parent().parent().find('input').attr('type','password');
      }
    })

} );
