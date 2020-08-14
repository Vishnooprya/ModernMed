function like()
{
  $.ajax({
				url: "php/like.php",
				type: "POST",
				data: {
					did:document.getElementById('did').value,
          pid:document.getElementById('pid').value,
          upvote:1,
          downvote:0
        }
				});

        $.ajax({
      				url: "php/get-like.php",
      				type: "POST",
      				data: {
      					did:document.getElementById('did').value,
              },
              success:function(result)
              {
                document.getElementById('like'+document.getElementById('did').value).textContent=result;
              }


      				});


}
function dislike()
{
  $.ajax({
				url: "php/dislike.php",
				type: "POST",
				data: {
					did:document.getElementById('did').value,
          pid:document.getElementById('pid').value,
          upvote:0,
          downvote:1
        }
				});

        $.ajax({
      				url: "php/get-dislike.php",
      				type: "POST",
      				data: {
      					did:document.getElementById('did').value,
              },
              success:function(result)
              {
                document.getElementById('dislike'+document.getElementById('did').value).textContent=result;
              }


      				});

}
