const logoutIcon = document.getElementById('logoutIcon');
const logoutModal = document.getElementById('logoutModal');
const confirmLogout = document.getElementById('confirmLogout');
const cancelLogout = document.getElementById('cancelLogout');

// Show modal when logout icon is clicked
logoutIcon.addEventListener('click', () => {
  logoutModal.style.display = 'flex';
});

// Confirm logout (redirect to logout page)
confirmLogout.addEventListener('click', () => {
  window.location.href = "logout.php";
});

// Cancel logout (hide the modal)
cancelLogout.addEventListener('click', () => {
  logoutModal.style.display = 'none';
});
