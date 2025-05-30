<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blazeus</title>
    <link rel="stylesheet" href="contact.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="img/logo.png">

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

    
    
  <div class="container1">
 <form action="submitemail.php" method="POST">
  <!-- Full Name Row -->
  <div class="row">
    <div class="form-group">
      <label for="firstName">Username</label>
      <input class="input-50" type="text" id="firstName" name="username" required placeholder="Username" autocomplete="off">
    </div>
    <div class="form-group">
      <label for="lastName">Full Name</label>
      <input class="input-50" type="text" id="lastName" name="full_name" required placeholder="Last Name" autocomplete="off">
    </div>
  </div>

  <!-- Issue Row -->
  <div class="row">
    <div class="form-group">
      <label for="color">Select Problem</label>
      <select id="color" name="issue_option" required autocomplete="off" >
        <option value="" disabled selected>Option</option>
        <option value="Forgotten password or account lockout">Can't log in due to forgotten password or account lockout</option>
        <option value="Account hacked or unauthorized activity">Account gets hacked or unauthorized activity is detected</option>
        <option value="Technical errors during account creation">Cannot create a new account due to technical errors</option>
        <option value="Order Issue">Order Issue</option>
      </select>
    </div>
  </div>

  <!-- Email and Phone Row -->
  <div class="row">
    <div class="form-group">
      <label for="email">Email</label>
      <input class="input-50" type="email" id="email" name="email" required placeholder="Email" autocomplete="off">
    </div>
    <div class="form-group">
      <label for="phone">Mobile Number</label>
      <input class="input-50" type="tel" id="phone" name="phone" required placeholder="No." autocomplete="off" maxlength="11">
    </div>
  </div>

  <!-- Message Row -->
  <div class="row">
    <div class="form-group">
      <label for="message">Message</label>
      <textarea class="input-100" id="message" name="message" required placeholder="......" autocomplete="off"></textarea>
    </div>
  </div>

  <!-- Submit Row -->
  <div class="row">
    <button type="submit">Submit</button>
  </div>


</form>


</div>

<!-- Success Modal -->
<div id="successModal" class="modal" style="display: none;">
  <div id="successMessage" class="success-message">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
      <path d="M9 16.17l-3.88-3.88-1.41 1.41L9 19 20.3 7.71l-1.41-1.41z" />
    </svg>
    <p>Success! Your email was sent successfully!</p>

  </div>
</div>
</div>

       
   <div class="nav-20">
            <div class="search-container"></div>
            <a href="main.php" class="a1"><i class="ri-menu-2-line"></i></a>
            <a href="shop.php" class = "a1"><i class="ri-shopping-cart-2-line"></i></a>
    </div>
</div>


<footer>
    <div class="footer-content">
        <p>&copy; 2025 Blazeus Gadgets Finds. All rights reserved.</p>
    </div>
</footer>

 <a href="https://www.google.com/maps/place/Lala+Garden+-+San+Fernando+Pampanga/@15.0587021,120.6560839,3a,75y,39.31h,86.09t/data=!3m7!1e1!3m5!1s3z5xK0runqG1RZi6NjbMnA!2e0!6shttps:%2F%2Fstreetviewpixels-pa.googleapis.com%2Fv1%2Fthumbnail%3Fcb_client%3Dmaps_sv.tactile%26w%3D900%26h%3D600%26pitch%3D3.913764370258818%26panoid%3D3z5xK0runqG1RZi6NjbMnA%26yaw%3D39.31043310559246!7i16384!8i8192!4m15!1m8!3m7!1s0x3396f79f47a8aadb:0x2c4be1dddb81922a!2sSan+Fernando+City,+Pampanga!3b1!8m2!3d15.0594094!4d120.6567296!16zL20vMDZwZ3pu!3m5!1s0x3396f709cd281c9f:0x4c4940cb4ba6260c!8m2!3d15.0567848!4d120.6562332!16s%2Fg%2F11vwzs3qsx?entry=ttu&g_ep=EgoyMDI1MDUyNy4wIKXMDSoASAFQAw%3D%3D"><img src="img\gmap.png" alt="gmap" class="gmap"></a>

 <div class="container2">
    <h3 >Contact Info</h3>
    <div class="icon">
    <i class="ri-facebook-circle-line icon"></i> 
    <i class="ri-mail-line icon"></i>
    <i class="ri-contacts-book-line icon"></i>
    </div>
    <div class="links">
    <h4>Blazeus Shop</h4>
    <h4>blazeusofficial@gmail.com</h4>
    <h4>09602538427</h4>
    </div>
 </div>

<script src="contact.js">
</script>
</body>

</html>