console.log("connected");

function collect_data() {
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  if (!email) {
    document.getElementById("emailErr").innerHTML = "Email is required";
  } else {
    document.getElementById("emailErr").innerHTML = "";
  }
  if (!password) {
    document.getElementById("passwordErr").innerHTML = "Password is required";
  } else {
    document.getElementById("passwordErr").innerHTML = "";
  }
  return false;
}

function getEmail() {
  const email = document.getElementById("email").value;
  console.log(email);
}

function getPassword() {
  const password = document.getElementById("password").value;
  console.log(password);
}
function validateInput(){ 
     const email= document.getElementById("email").value;
     const password= document.getElementById("password").value;
     
     const isLongEnough = email.length >=6;
     const hasAtSymbol = password.includes('@');

     if (isLongEnough && hasAtSymbol){
        satusMsg.textContent="Sucess:Input is valid";
        statusMsg.textContent="green";
     }else{
        satusMsg.textContent="Not Sucess:Input is invalid";
        statusMsg.textContent="red";
     }
}

