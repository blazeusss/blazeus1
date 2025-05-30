document.addEventListener("DOMContentLoaded", () => {
  const form = document.querySelector("form");
  const submitBtn = form.querySelector('button[type="submit"]');

  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    // Simple front-end validation (optional)
    const requiredFields = ["Username", "Password", "Email", "NewPassword"];
    let valid = true;
    requiredFields.forEach(name => {
      const input = form.querySelector(`[name="${name}"]`);
      if (!input.value.trim()) {
        input.style.borderColor = "red";
        valid = false;
      } else {
        input.style.borderColor = "#ccc";
      }
    });
    if (!valid) {
      alert("Please fill in all fields.");
      return;
    }

    // Disable submit button to prevent multiple submits
    submitBtn.disabled = true;
    submitBtn.textContent = "Processing...";

    // Send AJAX POST request
    const formData = new FormData(form);
    try {
      const response = await fetch("changepass.html", {
        method: "POST",
        body: formData,
      });

      const data = await response.json();

      if (data.success) {
        alert(data.message);
        // Redirect after success
        window.location.href = "login.php";
      } else {
        alert(data.message);
        // Do NOT reload page, clear passwords for retry
        form.querySelector('[name="Password"]').value = "";
        form.querySelector('[name="NewPassword"]').value = "";
      }
    } catch (error) {
      alert("An error occurred, please try again.");
      console.error(error);
    } finally {
      submitBtn.disabled = false;
      submitBtn.textContent = "Submit";
    }
  });

  // Your existing togglePassword function remains unchanged
  window.togglePassword = function() {
    var passwordField = document.getElementById('password');
    var newPasswordField = document.getElementById('newPassword');
    var passwordToggle = document.getElementById('passwordToggle');

    if (passwordField.type === "password") {
      passwordField.type = "text";
      newPasswordField.type = "text";
      passwordToggle.textContent = "Hide Password";
    } else {
      passwordField.type = "password";
      newPasswordField.type = "password";
      passwordToggle.textContent = "Show Password";
    }
  };
});