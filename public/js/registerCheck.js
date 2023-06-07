const phoneNumber = document.querySelector("#username");
const password = document.querySelector("#password");
const isconfirm = document.querySelector("#confirm");
const fullname = document.querySelector("#fullName");
const dob = document.querySelector("#dob");
const submit = document.querySelector("#submit");

function registerValidate() {
  if (
    checkphoneNumber() & checkPassword() & checkPassword() &&
    confirmPassword()
  ) {
    return true;
  }
  return false;
}
function checkphoneNumber() {
  const regex = /^[0][0-9]{9}$/;
  if (regex.test(phoneNumber.value)) {
    phoneNumber.classList.add("is-valid");
    phoneNumber.classList.remove("is-invalid");
    return true;
  }
  phoneNumber.classList.add("is-invalid");
  phoneNumber.classList.remove("is-valid");
  return false;
}
function checkPassword() {
  const regex = /^[a-z0-9]{6,}$/;
  if (regex.test(password.value)) {
    password.classList.add("is-valid");
    password.classList.remove("is-invalid");
    return true;
  }
  password.classList.add("is-invalid");
  password.classList.remove("is-valid");
  return false;
}
function confirmPassword() {
  if (password.value == isconfirm.value) {
    isconfirm.classList.add("is-valid");
    isconfirm.classList.remove("is-invalid");
    return true;
  }
  isconfirm.classList.add("is-invalid");
  isconfirm.classList.remove("is-valid");
  return false;
}
function checkFullname() {
  const regex = /^[^\.\*~@#$%&\-]{2,50}$/;
  if (regex.test(fullname.value)) {
    fullname.classList.add("is-valid");
    fullname.classList.remove("is-invalid");
    return true;
  }
  fullname.classList.add("is-invalid");
  fullname.classList.remove("is-valid");
  return false;
}
function checkvalid() {
  if (
    checkFullname() &&
    confirmPassword() &&
    checkPassword() &&
    checkphoneNumber() &&
    dob.value
  ) {
    return true;
  }
  return false;
}

phoneNumber.addEventListener("input", checkphoneNumber);
phoneNumber.addEventListener("focusout", checkphoneNumber);
password.addEventListener("input", checkPassword);
password.addEventListener("focusout", checkPassword);
isconfirm.addEventListener("input", confirmPassword);
isconfirm.addEventListener("focusout", confirmPassword);
fullname.addEventListener("input", checkFullname);
fullname.addEventListener("focusout", checkFullname);
