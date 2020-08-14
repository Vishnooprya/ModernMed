
$(document).on('click','.summa', function(){
//  window.alert('ok');

    var attrib=$(this).data('type');

    $(".modal-body #attr").text( attrib );
    $(".modal-body #hid-val").val(attrib);

});
