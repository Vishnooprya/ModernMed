function validate()
{
  var uname=document.getElementById('username').value;
  var pw=document.getElementById('password').value;
  if(uname==="")
  {
    window.alert("Please enter Username");
  }
  if(pw=="")
  {
    window.alert("Please enter password");
  }
}
