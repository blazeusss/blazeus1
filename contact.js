document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");
    const successModal = document.getElementById("successModal");
    const closeSuccessBtn = document.getElementById("closeSuccessBtn");
    const closeXBtn = successModal.querySelector(".close-x");

    function hideModalWithFadeOut(modal) {
        modal.classList.add('fade-out');
        // Wait for transition duration (500ms) before setting display:none and removing fade-out class
        setTimeout(() => {
            modal.style.display = "none";
            modal.classList.remove('fade-out');
        }, 500);
    }

    form.addEventListener("submit", function (e) {
        const requiredFields = ["username", "full_name", "issue_option", "email", "phone", "message"];
        let valid = true;

        requiredFields.forEach(id => {
            const input = document.querySelector(`[name="${id}"]`);
            if (!input || input.value.trim() === "") {
                input.style.borderColor = "red";
                valid = false;
            } else {
                input.style.borderColor = "#ccc";
            }
        });

        if (!valid) {
            e.preventDefault();
            alert("Please fill in all fields before submitting.");
            return;
        }

        e.preventDefault();
        successModal.style.display = "flex";
        successModal.style.justifyContent = "center";
        successModal.style.alignItems = "center";
        form.reset();

        // Automatically fade out and hide after 2 seconds
        setTimeout(() => {
            hideModalWithFadeOut(successModal);
        }, 2000);
    });

    // Close modal handlers
    closeSuccessBtn.addEventListener("click", () => {
        hideModalWithFadeOut(successModal);
    });

    closeXBtn.addEventListener("click", () => {
        hideModalWithFadeOut(successModal);
    });

    successModal.addEventListener("click", (e) => {
        if (e.target === successModal) {
            hideModalWithFadeOut(successModal);
        }
    });

    // Logout modal code unchanged...
    const logoutIcon = document.getElementById('logoutIcon');
    const logoutModal = document.getElementById('logoutModal');
    const confirmLogout = document.getElementById('confirmLogout');
    const cancelLogout = document.getElementById('cancelLogout');

    logoutIcon?.addEventListener('click', () => {
        logoutModal.style.display = 'flex';
    });

    confirmLogout?.addEventListener('click', () => {
        alert("You have been logged out.");
        logoutModal.style.display = 'none';
    });

    cancelLogout?.addEventListener('click', () => {
        logoutModal.style.display = 'none';
    });
});
