//  $(document).ready(function(){

function getmoney()
{
     $.ajax({ type: "GET",
         url: "php/getmoney.php",
         async: true,
         success : function(text)
         {
             //alert(text);
             $('#amount').text(text);
         }
    });


}
