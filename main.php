

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Blazeus</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"rel="stylesheet"/>
        <link rel="icon" type="image/png" href="img/logo.png">
        <link rel="stylesheet" href="style.css">
</head>
<body>
    

    <div class="main">
        <nav class="navbar"></nav>
        <div class="navigation">
            <div class="nav-10">
                <img src="img/logo2.png" alt="Logo" class="logoad" style="height: 120px;">  
                <ul>
                    <li><a href="main.php">HOME</a></li>
                    <li><a href="shop.php">PRODUCTS</a></li>
                    <li><a href="accountunfos.php">ACCOUNT</a></li>
                    <li><a href="contact.php">CONTACT US</a></li>
                      <li><a href="aboutus.php">ABOUT US</a></li>
                </ul>   
        </div>
        <div class="nav-20">
            <div class="search-container">
            <select class="search-input" id="searchSelect">
      <option value="" disabled selected>Select a product</option>
      <option value="iphone">Phone</option>
      <option value="laptops">Laptop</option>
      <option value="airpods">Airpods</option>
      <option value="monitor">Monitor</option>
    </select>
              <button class="search-button" id="searchBtn"><i class="ri-search-2-line"></i></button>
            </div>
            <a href="main.php" class="a1"><i class="ri-menu-2-line"></i></a></i>
            <a href="shop.php" class="a1"><i class="ri-shopping-cart-2-line"></i></a></i>
            <i class="ri-logout-box-r-line logout-icon" id="logoutIcon"></i>

            <!-- Modal -->
            <div class="modal" id="logoutModal">
                <div class="modal-content">
                    <p>Do you want to logout?</p>
                    <div class="buttons">
                        <!-- Link to logout.php to handle the logout process -->
                        <a href="logout.php"><button id="confirmLogout">Confirm</button></a>
                        <button id="cancelLogout">Cancel</button>
                    </div>
                </div>
            </div>
          </div>
          
        </div>
        <div class="content">
             <div class="content-left">
                <h5>AFFORDABLE GADGETS AT </h5>
                <h1>BLAZEUS GADGETS</h1>
                <p>Elevate Your Technology with Perfect Quality Gadgets and Accessories!</p>
                <a href="shop.php"> <button class="btn">Shop Now</button></a>
        </div>
        <div class="content-right">
            <div class="products">
                <a href="shop.php"><img src="img/Screenshot_2025-05-20_125351-removebg-preview.png" alt="HP Spectre x3"></a>
                <h4>HP Spectre x3</h4>
                <p class="category">Laptop</p>
                <p class="color">Color: White</p>
                <p class="price">₱53,419</p>
            </div> 
                <div class="products">
                    <a href="shop.php"><img src="img/iphone-12-removebg-preview.png" alt="IPhone 12"></a>
                    <h4>IPhone 12</h4>
                    <p class="category">IPhone</p>
                    <p class="color">Color: Red</p>
                    <p class="price">₱29,599.00</p>
                </div>
                    <div class="products">
                        <a href="shop.php"><img src="img/Screenshot_2025-05-20_130300-removebg-preview.png" alt="Airpods V3"></a>
                        <h4>Airpods V3</h4>
                        <p class="category">Airpods</p>
                        <p class="color">Color: White</p>
                        <p class="price">₱8,419.00</p>
                    </div>
                    <div class="products">
                        <a href="shop.php"><img src="img/Screenshot_2025-05-20_132011-removebg-preview.png" alt="ROG ES4"></a>
                        <h4>ROG ES4</h4>
                        <p class="category">Monitor</p>
                        <p class="color">Color: Black</p>
                        <p class="price">₱73,239.00</p>
     
        </div>
    
        
        </div>
            </div>
        </div>
     </div>
     <footer>
        <div class="footer-content">
            <p>&copy; 2025 Blazeus Gadgets Finds. All rights reserved.</p>
            <ul>
        </div>
    </footer>
    <div class="slider">
        <div class="slides" id="slides">
          <img src= "img/slider1.jpg" alt="Slide 1">
          <img src="img/slider2.jpg" alt="Slide 2">
          <img src="img/slider3.jpg" alt="Slide 3">
        </div>
        <div class="dots" id="dots">
          <span class="dot active"></span>
          <span class="dot"></span>
          <span class="dot"></span>
        </div>


<script>
   const slides = document.getElementById('slides');
const dots = document.querySelectorAll('.dot');
let currentIndex = 0;
const totalSlides = slides.children.length;

function showSlide(index) {
  slides.style.transform = `translateX(-${index * 100}%)`;
  dots.forEach(dot => dot.classList.remove('active'));
  dots[index].classList.add('active');
}

function nextSlide() {
  currentIndex = (currentIndex + 1) % totalSlides;
  showSlide(currentIndex);
}

setInterval(nextSlide, 4000); // Change every 4 seconds

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

// === NEW: Search select redirect to shop.php with hash ===
document.getElementById('searchBtn').addEventListener('click', function() {
  const select = document.getElementById('searchSelect');
  const selectedValue = select.value;

  if (!selectedValue) {
    alert('Please select a product.');
    return;
  }

  // Redirect to shop.php with hash for the selected product
  window.location.href = `shop.php#${selectedValue}`;
});

</script>
</script>
</body>

</html>