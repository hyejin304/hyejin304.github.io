$(document).ready(function () {

  $("#mainForm").on("submit", function() {
    var formValid = true;

    var FirstNameIsValid = $("#FirstName").prop("validity").valid;
    if(FirstNameIsValid) {
      $("#FirstNameError").hide();
    } else {
      $("#FirstNameError").show();
      formValid = false;
    }

    var lastNameIsValid = $("#LastName").prop("validity").valid;
    if(lastNameIsValid) {
      $("#LastNameError").hide();
    } else {
      $("#LastNameError").show();
      formValid = false;
    }

    if($("#userEmail").prop("validity").valueMissing) {
      $("#EmailError").show();
      formValid = false;
    } else {
      $("#EmailError").hide();
    }

    if($("#userEmail").prop("validity").typeMismatch) {
      $("#EmailInvalid").show();
      formValid = false;
    } else {
      $("#EmailInvalid").hide();
    }

    var messageIsValid = $("#Message").prop("validity").valid;
    if(messageIsValid) {
      $("#MessageError").hide();
    } else {
      $("#MessageError").show();
      formValid = false;
    }
    return formValid;
  });
});
