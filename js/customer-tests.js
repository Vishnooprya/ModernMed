// $(document).on("click", ".doTest", function () {
//  window.alert($(this).attr('id'));

     // As pointed out in comments,
     // it is unnecessary to have to manually call the modal.
     // $('#addBookDialog').modal('show');
     $(document).ready(function(){
          $(document).on('click','.doTest', function(){
              // alert('est123');
    //e.preventDefault();
    //var data = $(this).serialize();
    var testname = $(this).data('name');

    var testcost = $(this).data('cost');
    //alert('ok00');
    //alert($('#amount').text());
    if($('#amount').text()< testcost)
    {
    //  window.alert('Not enough balance');
    $("#myModal .modal-body").text('Not Enough Balance, Please Add Money to M-Wallet');
      return ;
    }

    $.ajax({
      type: 'GET',
      url: 'js/customer-add-test.php?t_name='+testname+'&t_cost='+testcost,
    //  data: ({t_name:testname},{t_cost:testcost}),
      cache: false,
      complete: function(data){

        $('#myModal .modal-body').text('You have applied for '+testname+' costing Rs.'+testcost+' .Your results will be mailed to you within 3 days.');
            // $(".modal-body #test-name").text( testname );
            // $(".modal-body #test-cost").text( testcost );

      }
    })
    return false;
  });
});
