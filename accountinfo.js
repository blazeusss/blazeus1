const logoutIcon = document.getElementById('logoutIcon');
const logoutModal = document.getElementById('logoutModal');
const confirmLogout = document.getElementById('confirmLogout');
const cancelLogout = document.getElementById('cancelLogout');

// Show modal
logoutIcon.addEventListener('click', () => {
  logoutModal.style.display = 'flex';
});

// Confirm action
confirmLogout.addEventListener('click', () => {
  logoutModal.style.display = 'none';
  // Redirect or logout logic can go here
  // window.location.href = "/logout";
});

// Cancel action
cancelLogout.addEventListener('click', () => {
  logoutModal.style.display = 'none';
});
