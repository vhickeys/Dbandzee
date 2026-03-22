$(document).ready(function () {

  // ==================== GLOBAL INIT ====================
  $("#userAlert, #adminAlert, .adminAlert").hide();
  $(".spinner").hide();

  // ==================== USER SIGNUP ====================
  $("#userSignupSubmit").click(function (e) {
    e.preventDefault();

    var form = $("#userSignupForm")[0];
    var formData = new FormData(form);

    var fullName = $("input[name='full_name']").val().trim();
    var email = $("input[name='email']").val().trim();
    var password = $("input[name='password']").val();
    var phone = $("input[name='phone']").val().trim();
    var role = $("select[name='role']").val();

    // Basic validation
    if (fullName === "") {
      showAlert("Please enter your full name", "error");
      return;
    } else if (email === "") {
      showAlert("Please enter your email address", "error");
      return;
    } else if (!validateEmail(email)) {
      showAlert("Invalid email address", "error");
      return;
    } else if (password === "") {
      showAlert("Please enter a password", "error");
      return;
    }
    else if (role === "") {
      showAlert("Please select your role(i.e donor/beneficiary)", "error");
      return;
    }

    $(".spinner").show();

    $.ajax({
      type: "POST",
      url: "webadmin/classes/process.php?action=create-user", // adjust path if needed
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function (response) {
        $(".spinner").hide();

        if (response.status === "success") {
          showAlert(response.message, "success");
          $("#userSignupForm")[0].reset();

          setTimeout(() => {
            window.location.href = "webadmin/index.php";
          }, 2000);
        } else {
          showAlert(response.message, "error");
        }
      },
      error: function (xhr) {
        $(".spinner").hide();
        showAlert("An error occurred: " + xhr.statusText, "error");
      },
    });
  });

  // ==================== ADMIN LOGIN ====================
  $("#adminLoginSubmit").click(function (e) {
    e.preventDefault();

    var adminEmail = $("#adminEmail").val().trim();
    var adminPassword = $("#adminPassword").val().trim();

    if (adminEmail === "") {
      showLoginAlert("Please enter your Email", "error");
      return;
    } else if (!validateEmail(adminEmail)) {
      showLoginAlert("Not a valid Email address", "error");
      return;
    } else if (adminPassword === "") {
      showLoginAlert("Please enter your Password", "error");
      return;
    }

    $(".spinner").show();

    $.ajax({
      type: "POST",
      url: "classes/process.php?action=loginUser",
      data: {
        adminEmail: adminEmail,
        adminPassword: adminPassword,
      },
      dataType: "json",
      success: function (response) {
        $(".spinner").hide();

        switch (response.message) {
          case "invalid":
            showLoginAlert("Invalid user. Please sign up!", "error");
            break;
          case "incorrect":
            showLoginAlert("Incorrect password!", "error");
            break;
          case "suspended":
            showLoginAlert("Your account has been suspended. Please contact admin.", "error");
            break;
          case "successful":
            showLoginAlert("Login successful! Redirecting...", "success");
            setTimeout(function () {
              window.location.href = "index.php";
            }, 1500);
            break;
          default:
            showAlert("Unexpected response. Please try again.", "error");
        }
      },
      error: function (xhr) {
        $(".spinner").hide();
        showAlert("Error: " + xhr.statusText, "error");
      },
    });
  });

  // ==================== ADMIN SIGNUP ====================
  $("#adminSignupSubmit").click(function (e) {
    e.preventDefault();

    var adminFname = $("#adminFname").val();
    var adminEmail = $("#adminEmail").val();
    var adminPassword = $("#adminPassword").val();
    var adminConfirm = $("#adminConfirm").val();
    var role = $("#role").val();

    if (adminFname === "") {
      var alertDisplay = adminAlertError("Please enter your fullname");
    } else if (adminEmail === "") {
      var alertDisplay = adminAlertError("Please enter your Email");
    } else if (!validateEmail(adminEmail)) {
      var alertDisplay = adminAlertError("Not a Valid Email");
    } else if (adminPassword === "") {
      var alertDisplay = adminAlertError("Please enter a password");
    } else if (adminConfirm === "") {
      var alertDisplay = adminAlertError("Please confirm your password");
    } else if (adminPassword !== adminConfirm) {
      var alertDisplay = adminAlertError("Password doesn't match! Please try again.");
    } else {
      $.ajax({
        type: "POST",
        url: "classes/process.php?action=registerUser",
        data: {
          adminFname: adminFname,
          adminEmail: adminEmail,
          adminPassword: adminPassword,
          role: role,
        },
        success: function (response) {
          var alertDisplay = adminAlertSuccess(response);
          $("#adminAlert").html(alertDisplay).show().fadeOut(5000);
        },
      });
      return;
    }

    $("#adminAlert").html(alertDisplay).show().fadeOut(5000);
  });

  // ==================== PASSWORD CHANGE ====================
  $("#adminPasswordChange").click(function (e) {
    e.preventDefault();

    let userId = $("#userId").val();
    let old_password = $("#old_password").val();
    let new_password = $("#new_password").val();
    let confirm_password = $("#confirm_password").val();

    var isValid = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/.test(new_password);

    if (!userId || !old_password || !new_password || !confirm_password) {
      var adminAlertDisplay = adminAlertError("This Field cannot be empty!");
    } else if (old_password === new_password) {
      var adminAlertDisplay = adminAlertError("You have inputed your old password!");
    } else if (!isValid) {
      var adminAlertDisplay = adminAlertError(
        "Password Must Contain:<br>" +
        "1 Uppercase Character<br>" +
        "At Least 7 Lowercase Characters<br>" +
        "1 Special Character<br>" +
        "1 Number<br>" +
        "Cannot be less than 8 Characters"
      );
    } else if (new_password !== confirm_password) {
      var adminAlertDisplay = adminAlertError("Password doesn't match! Please try again.");
    } else {
      $.ajax({
        type: "POST",
        url: "webadmin/classes/process.php?action=changePassword",
        data: {
          userId: userId,
          old_password: old_password,
          new_password: new_password,
          confirm_password: confirm_password,
        },
        success: function (response) {
          var adminAlertDisplay = adminAlertSuccess(response);
          $(".adminAlert").html(adminAlertDisplay).show().fadeOut(5000);
          $("#userId, #old_password, #new_password, #confirm_password").val("");
        },
      });
      return;
    }

    $(".adminAlert").html(adminAlertDisplay).show().fadeOut(5000);
  });

  // ==================== DELETE & ROLE CONFIRMATIONS ====================
  confirmDelete("delete-request", "deleteRequestModal", "deleteRequestId");
  confirmDelete("delete-user", "deleteUserModal", "deleteModalId");
  confirmDelete("change-role", "changeUserRoleModal", "userId");


  function adminAlertError(alertMessage) {
    var alert = `<div class="alert alert-danger solid alert-dismissible fade show">
        <svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
        <strong>Error!</strong> ${alertMessage}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
        </button>
    </div>`;

    return alert;
  }

  function adminAlertSuccess(alertMessage) {
    var alert = `<div class="alert alert-success solid alert-dismissible fade show">
  <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
  <strong>Success!</strong> ${alertMessage}.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
  </button>
</div>`;

    return alert;
  }

  function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }

  function confirmDelete(deleteTrashButton, deleteNameModal, deleteModalInputID) {
    $(document).on('click', '.' + deleteTrashButton, '#' + deleteNameModal, function (e) {
      e.preventDefault();
      $("#" + deleteNameModal).modal('show');
      var id = $(this).val();
      $("#" + deleteModalInputID).val(id);
    });
  }

  // Function to toggle the visibility of actions div
  function toggleActions(button) {
    var actionsDiv = button.closest('tr').querySelector('.actions');
    actionsDiv.classList.toggle("show");
    // Toggle display property of the actions div
    if (actionsDiv.classList.contains("show")) {
      actionsDiv.style.display = "flex";
    } else {
      actionsDiv.style.display = "none";
    }
  }

  // Simple alert display function
  function showAlert(message, type) {
    let alertDisplay = "";

    if (type === "error") {
      alertDisplay = `<div class="alert alert-danger p-2 small mb-2">${message}</div>`;
    } else {
      alertDisplay = `<div class="alert alert-success p-2 small mb-2">${message}</div>`;
    }

    $("#userAlert").html(alertDisplay).fadeIn().delay(5000).fadeOut();
  }

  function showLoginAlert(message, type) {
    var alertClass = type === "error" ? "alert-danger" : "alert-success";
    var alertDisplay =
      '<div class="alert ' +
      alertClass +
      ' text-center" role="alert">' +
      message +
      "</div>";
    $("#adminAlert").html(alertDisplay).show();
    $("#adminAlert").fadeOut(4000);
  }

  document.addEventListener('click', function (event) {
    if (event.target.classList.contains('userAction')) {
      toggleActions(event.target);
    }
  });

  $(document).ready(function () {
    // $("#summernote").summernote();
    $(".summernote").summernote({
      placeholder: "Your Post Content",
      height: 300,
    });

    $(".dropdown-toggle").dropdown();
  });
});
