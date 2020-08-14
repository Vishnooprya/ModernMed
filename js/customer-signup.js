function validate(){
  var name=document.getElementById('fullname').value;
  var pass1=document.getElementById('password').value;
  var pass2=document.getElementById('confirmpassword').value;
  if(name=="")
  {
    window.alert('Full name cannot be empty');
  }
  if(pass1.length<8)
  {
    window.alert('Password must have atleast 8 characters');
  }
  if(pass1!==pass2)
  {
    window.alert('Passwords do not match ');
  }
  if(document.getElementById('dob').value=="")
  {
    window.alert("Date of Birth must be entered");
  }
  if(document.getElementById('houseno').value=="")
  {
    window.alert("Building number must be entered");
  }
  if(document.getElementById('district').value=="")
  {
    window.alert("District must be entered");
  }
  if(document.getElementById('state').value=="")
  {
    window.alert("State Must be entered");
  }
  if(document.getElementById('pincode').value=="")
  {
    window.alert("Pincode must be entered");
  }
  if(document.getElementById('email').value=="")
  {
    window.alert("E-Mail must be entered");
  }
  if(document.getElementById('phone').value=="" || document.getElementById('phone').value.length!=10)
  {
    window.alert("Phone number must be entered and must be of 10 characters");
  }



}
