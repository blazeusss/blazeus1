function showAdminOptions() {
  const adminOptions = document.getElementById("adminOptions");
  const adminLogo = document.getElementById("adminLogo");
  const enterBtn = document.getElementById("enterAdminBtn");
  const logoutBtn = document.getElementById("logoutBtn");

  adminOptions.style.display = "flex";
  setTimeout(() => {
    adminOptions.classList.add("show");
  }, 10);

  adminLogo.style.display = "none";
  enterBtn.style.display = "none";
  logoutBtn.style.display = "block";
}

function logout() {
  // Show the confirmation modal
  document.getElementById("logoutModal").style.display = "flex";
}

// Handle Confirm (redirect to logout.php)
document.getElementById("confirmLogout").addEventListener("click", function () {
  window.location.href = "logout.php";
});

// Handle Cancel (hide modal)
document.getElementById("cancelLogout").addEventListener("click", function () {
  document.getElementById("logoutModal").style.display = "none";
});

// Optional: Close modal by clicking outside the box
window.addEventListener("click", function (e) {
  const modal = document.getElementById("logoutModal");
  if (e.target === modal) {
    modal.style.display = "none";
  }
});
