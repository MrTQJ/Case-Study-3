const setDate = () => {
  const today = new Date();
  let tomorrow = new Date();
  tomorrow.setDate(today.getDate() + 1);
  tomorrow = tomorrow.toISOString().slice(0, 10);
  dateInput = document.getElementById("mystartdate");
  dateInput.min = tomorrow;
};
setDate();

function isAlphaOrSpace(string) {
  return /^[a-zA-Z ]+$/.test(string);
}

function isAlphaOrDot(string) {
  return /^[a-zA-Z0-9.]+$/.test(string);
}
function validateName() {
  let nameInput = document.getElementById("myName").value;
  if (isAlphaOrSpace(nameInput)) {
    document.getElementById("hiddenNameInput").innerHTML = "";
  } else {
    document.getElementById("hiddenNameInput").innerHTML =
      "Name can only contain alphabets or spaces";
    document.getElementById("myName").value = "";
  }
}

function isuser(string) {
  return /^[a-zA-Z0-9-.]+$/.test(string);
}
function isDomain(string) {
  try {
    if (!isAlphaOrDot(string)) {
      return false;
    }
    let addressExtensions = string.split(".");
    let addressExtensionsLength = addressExtensions.length;
    if (
      addressExtensionsLength >= 2 &&
      addressExtensionsLength <= 4 &&
      addressExtensions[0].length !== 0
    ) {
      if (
        addressExtensions[addressExtensionsLength - 1].length >= 2 &&
        addressExtensions[addressExtensionsLength - 1].length <= 3
      ) {
        return true;
      }
    }
  } catch {
    return false;
  }
}
function validateUser() {
  const emailInput = document.getElementById("email").value;
  emailInputArray = emailInput.split("@");
  if (isuser(emailInputArray[0]) === true && isDomain(emailInputArray[1])) {
    document.getElementById("hiddenEmailInput").innerHTML = "";
  } else if (isuser(emailInputArray[0]) === false) {
    document.getElementById("hiddenEmailInput").innerHTML =
      "Username can only contain alphabets, - and .";
    document.getElementById("email").value = "";
  } else if (emailInputArray.length === 1) {
    document.getElementById("hiddenEmailInput").innerHTML =
      "Email must have 1 @";
    document.getElementById("email").value = "";
  } else {
    document.getElementById("hiddenEmailInput").innerHTML =
      "Error in email Domain";
    document.getElementById("email").value = "";
  }
}
