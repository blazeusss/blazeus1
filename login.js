document.querySelector("form").addEventListener("submit", function(e) {
    e.preventDefault(); // Prevent form from submitting normally

    const formData = new FormData(this);

    fetch("login.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Redirect to the next page
            window.location.href = data.redirect || "main.html";
        } else {
            // Show error near password input
            let errorBox = document.getElementById("error-msg");
            errorBox.textContent = data.message;
            errorBox.style.display = "block";
        }
    })
    .catch(error => console.error("Error:", error));
});
