// Select all input elements for varification
const name = document.getElementById("name");
const sname = document.getElementById("sname");
const uname = document.getElementById("uname");
const role = document.getElementById("role");
const email = document.getElementById("email");
const password = document.getElementById("password");


// function for form varification
function formValidation() {
  
  // checking name length
  if (name.value.length < 3 || name.value.length > 20) {
    alert("Name length should be more than 3 and less than 21");
    name.focus();
    return false;
  }
  // checking sname length
  if (sname.value.length < 3 || sname.value.length > 25) {
    alert("Surname length should be more than 3 and less than 26");
    name.focus();
    return false;
  }
  // checking Username length
  if (uname.value.length < 3 || uname.value.length > 25) {
    alert("Username length should be more than 3 and less than 26");
    name.focus();
    return false;
  }
  // checking role
  if (role.value === "") {
    alert("Please select your role!")
    return false;
  }
  // checking email
  if (email.value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
    alert("Please enter a valid email!");
    email.focus();
    return false;
  }
  // checking password
  if (!password.value.match(/^.{5,15}$/)) {
    alert("Password length must be between 5-15 characters!");
    password.focus();
    return false;
  }
  
  return true;
}