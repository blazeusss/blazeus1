<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="shop.css">
    <title>Blazeus</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="icon" type="image/png" href="img/logo.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    

    <div class="main">
        <div class="nav-container">
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
      <option value="Phone">Phone</option>
      <option value="Laptop">Laptop</option>
      <option value="Airpods">Airpods</option>
      <option value="Monitor">Monitor</option>
    </select>
                        <button class="search-button"><i class="ri-search-2-line"></i></button>
                        
                    </div>
                    <a href="main.php" class="a1"><i class="ri-menu-2-line"></i></a>
                    <a href="shop.php" class="a1"><i class="ri-shopping-cart-2-line"></i></a>
                </div>
            </div>
        </div>

        <div  id="iphone" class="product-divider"> 
            <h3>IPhone</h3>
        </div>

        <div  id="laptops" class="product-divider2"> 
            <h3>Laptops</h3>
        </div>
        <div id="airpods"  class="product-divider3"> 
            <h3>Airpods</h3>
        </div>
        <div  id="monitors" class="product-divider4"> 
            <h3>Monitors</h3>
        </div>


        <div id="buyModal" class="modal">
            <div class="modal-content">
                <span class="close-btn">&times;</span>
                <h2>Product Details & Order</h2>
            
                <div class="product-info">
                    <div class="product-display">
                        <img id="modalProductImage" src="" alt="Product Image" class="modal-product-img">
                        <div class="product-details">
                            <h3 id="modalProductName">Product Name</h3>
                            <p id="modalProductDescription" class="product-description">Product description will appear here</p>
                        </div>
                    </div>
                </div>
                
                <form id="checkoutForm" action="place_order.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Country</label>
                        <input type="text" value="Philippines" readonly>
                    </div>

                    <div class="form-group">
                        <label for="province">Province</label>
                        <select id="province" name="province" required>
                          <option disabled selected>Select Province</option>
                          <option>Abra</option>
                          <option>Agusan del Norte</option>
                          <option>Agusan del Sur</option>
                          <option>Aklan</option>
                          <option>Albay</option>
                          <option>Antique</option>
                          <option>Apayao</option>
                          <option>Aurora</option>
                          <option>Basilan</option>
                          <option>Bataan</option>
                          <option>Batanes</option>
                          <option>Batangas</option>
                          <option>Benguet</option>
                          <option>Biliran</option>
                          <option>Bohol</option>
                          <option>Bukidnon</option>
                          <option>Bulacan</option>
                          <option>Cagayan</option>
                          <option>Camarines Norte</option>
                          <option>Camarines Sur</option>
                          <option>Camiguin</option>
                          <option>Capiz</option>
                          <option>Catanduanes</option>                          
                          <option>Cavite</option>
                          <option>Cebu</option>
                          <option>Cotabato</option>
                          <option>Davao de Oro</option>
                          <option>Davao del Norte</option>
                          <option>Davao del Sur</option>
                          <option>Davao Occidental</option>
                          <option>Davao Oriental</option>
                          <option>Dinagat Islands</option>
                          <option>Eastern Samar</option>
                          <option>Guimaras</option>
                          <option>Ifugao</option>
                          <option>Ilocos Norte</option>
                          <option>Ilocos Sur</option>
                          <option>Iloilo</option>
                          <option>Isabela</option>
                          <option>Kalinga</option>
                          <option>La Union</option>
                          <option>Laguna</option>
                          <option>Lanao del Norte</option>
                          <option>Lanao del Sur</option>
                          <option>Leyte</option>
                          <option>Maguindanao del Norte</option>
                          <option>Maguindanao del Sur</option>
                          <option>Marinduque</option>
                          <option>Masbate</option>
                          <option>Misamis Occidental</option>
                          <option>Misamis Oriental</option>
                          <option>Mountain Province</option>
                          <option>Negros Occidental</option>
                          <option>Negros Oriental</option>
                          <option>Northern Samar</option>
                          <option>Nueva Ecija</option>
                          <option>Nueva Vizcaya</option>
                          <option>Occidental Mindoro</option>
                          <option>Oriental Mindoro</option>
                          <option>Palawan</option>
                          <option>Pampanga</option>
                          <option>Pangasinan</option>
                          <option>Quezon</option>
                          <option>Quirino</option>
                          <option>Rizal</option>
                          <option>Romblon</option>
                          <option>Samar</option>
                          <option>Sarangani</option>
                          <option>Siquijor</option>
                          <option>Sorsogon</option>
                          <option>South Cotabato</option>
                          <option>Southern Leyte</option>
                          <option>Sultan Kudarat</option>
                          <option>Sulu</option>
                          <option>Surigao del Norte</option>
                          <option>Surigao del Sur</option>
                          <option>Tarlac</option>
                          <option>Tawi-Tawi</option>
                          <option>Zambales</option>
                          <option>Zamboanga del Norte</option>
                          <option>Zamboanga del Sur</option>
                          <option>Zamboanga Sibugay</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Street Address</label>
                        <input type="text" id="addressInput" name="address" required
                          pattern=".*(House\s*#|Building\s*#|building\s*#|house\s*#|Purok|Street).*"
                          title="Address must include 'House #' or 'Building #'">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" id="phone" name="phone" maxlength="11" required>
                    </div>

                    <div class="form-group">
                        <label for="paymentMethod">Payment Method</label>
                        <select id="paymentMethod" name="paymentMethod" required>
                            <option value="Cash On Delivery">Cash on Delivery</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="color">Select Color</label>
                        <select id="color" name="color" required>
                            <option value=""disabled selected> Choose a color</option>
                            <option value="Red">🔴 Red</option>
                            <option value="Blue">🔵 Blue</option>
                            <option value="Green">🟢 Green</option>
                            <option value="Black">⚫ Black</option>
                            <option value="White">⚪ White</option>
                        </select>
                    </div>

                <div class="form-group">
  <label for="voucherCode">Enter Voucher Code (optional)</label>
  
  <div class="voucher-wrapper">
    <input type="text" id="voucherCode" name="voucherCode" placeholder="Enter Voucher">
    <p id="discountAmount" class="discountprice"></p>
    <button type="button" id="applyVoucherBtn">Enter</button>
  </div>
</div>

              <div class="price-summary">
  <div class="price-row">
    <span>Product Price:</span>
    <span id="productPrice">₱0.00</span>
  </div>
  <div class="price-row">
    <span>Shipping Fee:</span>
    <span id="shippingFee">₱150.00</span>
  </div>
  <div class="price-row total">
    <span>Total:</span>
    <span id="totalPrice">₱150.00</span>
  </div>


  <input type="hidden" name="product_name" id="productNameInput">
  <input type="hidden" name="product_price" id="productPriceInput">
  <input type="hidden" name="product_image" id="productImageInput">
  <input type="hidden" name="product_description" id="productDescriptionInput">
</div>



                    <button type="submit">Place Order</button>
                </form>

           <div id="orderSummary" style="display:none; margin-top: 20px;">
  <h3>Order Summary</h3>
  <p id="summaryDetails"></p>
  

  <div class="orderSummary-buttons">
    <button type="button" id="confirmOrderBtn">Confirm</button>
    <button type="button" id="cancelSummaryBtn">Cancel</button>
  </div>
</div>


    <div id="successMessage" class="success-message" style="display:none;">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M9 16.17l-3.88-3.88-1.41 1.41L9 19 20.3 7.71l-1.41-1.41z" />
      </svg>
      <p>Success! Your order has been placed.</p>
    </div>

            </div>
        </div>
        


  
        <div class="products-container">
            <div class="products">
                <img src="img/ip13s2.png" alt="iPhone 13">
                <h4>iPhone 13</h4>
                <div class="price">₱31,449</div>
                <button class="buy-btn" 
                        data-price="31449" 
                        data-name="iPhone 13" 
                        data-image="img/ip13s2.png"
                        data-description="Experience the iPhone 13 with its advanced dual-camera system, A15 Bionic chip, and all-day battery life. Features a 6.1-inch Super Retina XDR display with Ceramic Shield protection.">
                    Buy Now
                </button>
            </div>

            <div class="products">
                <img src="img/iphone-12-removebg-preview.png" alt="iPhone 12">
                <h4>iPhone 12</h4>
                <div class="price">₱29,599</div>
                <button class="buy-btn" 
                        data-price="29599" 
                        data-name="iPhone 12" 
                        data-image="img/iphone-12-removebg-preview.png"
                        data-description="The iPhone 12 features 5G connectivity, A14 Bionic chip, and dual-camera system. Enjoy stunning photos and videos with Night mode and 4K Dolby Vision HDR recording.">
                    Buy Now
                </button>
            </div>

            <div class="products">
                <img src="img/iphone_xs-removebg-preview.png" alt="iPhone XS">
                <h4>iPhone XS</h4>
                <div class="price">₱13,419</div>
                <button class="buy-btn" 
                        data-price="13419" 
                        data-name="iPhone XS" 
                        data-image="img/iphone_xs-removebg-preview.png"
                        data-description="iPhone XS with Super Retina OLED display, A12 Bionic chip, and advanced Face ID. Features dual cameras with Smart HDR and premium glass and stainless steel design.">
                    Buy Now
                </button>
            </div>

            <div class="products">
                <img src="img/OIP__37_-removebg-preview.png" alt="iPhone 15 Pro">
                <h4>iPhone 15 Pro</h4>
                <div class="price">₱75,499</div>
                <button class="buy-btn" 
                        data-price="75499" 
                        data-name="iPhone 15 Pro" 
                        data-image="img/OIP__37_-removebg-preview.png"
                        data-description="The most advanced iPhone 15 Pro with titanium design, A17 Pro chip, and pro camera system. Features Action Button, USB-C, and revolutionary computational photography.">
                    Buy Now
                </button>
            </div>

            <div class="products">
                <img src="img/OIP__38_-removebg-preview.png" alt="iPhone 14 Pro">
                <h4>iPhone 14 Pro</h4>
                <div class="price">₱54,999</div>
                <button class="buy-btn" 
                        data-price="54999" 
                        data-name="iPhone 14 Pro" 
                        data-image="img/OIP__38_-removebg-preview.png"
                        data-description="iPhone 14 Pro with Dynamic Island, Always-On display, and A16 Bionic chip. Features Pro camera system with 48MP main camera and Cinematic mode in 4K.">
                    Buy Now
                </button>
            </div>

            <div class="products">
                <img src="img/th__1_-removebg-preview.png" alt="iPhone 13 (Variant)">
                <h4>iPhone 13</h4>
                <div class="price">₱34,599</div>
                <button class="buy-btn" 
                        data-price="34599" 
                        data-name="iPhone 13 (Premium)" 
                        data-image="img/th__1_-removebg-preview.png"
                        data-description="iPhone 13 premium variant with advanced dual-camera system, A15 Bionic chip, and Cinema mode. Enjoy incredible battery life and beautiful design with Ceramic Shield front.">
                    Buy Now
                </button>
            </div>

            <div class="products">
                <img src="img/Screenshot_2025-05-20_124415-removebg-preview.png" alt="iPhone X">
                <h4>iPhone X</h4>
                <div class="price">₱22,499</div>
                <button class="buy-btn" 
                        data-price="22499" 
                        data-name="iPhone X" 
                        data-image="img/Screenshot_2025-05-20_124415-removebg-preview.png"
                        data-description="The revolutionary iPhone X with edge-to-edge Super Retina display, Face ID, and wireless charging. Features dual cameras with Portrait mode and optical image stabilization.">
                    Buy Now
                </button>
            </div>

            <div class="products">
                <img src="img/Screenshot_2025-05-20_124356-removebg-preview.png" alt="iPhone 11 Pro">
                <h4>iPhone 11 Pro</h4>
                <div class="price">₱80,499</div>
                <button class="buy-btn" 
                        data-price="80499" 
                        data-name="iPhone 11 Pro" 
                        data-image="img/Screenshot_2025-05-20_124356-removebg-preview.png"
                        data-description="iPhone 11 Pro with triple-camera system, A13 Bionic chip, and Super Retina XDR display. Features Night mode, Deep Fusion, and all-day battery life.">
                    Buy Now
                </button>
            </div>
        </div>
    </div>



<div class="products-container">
  <div class="products2">
    <img src="img/Screenshot_2025-05-20_125456-removebg-preview.png" alt="Dell XPS 16">
    <h4>Dell XPS 16</h4>
    <div class="price">₱51,449</div>
    <button class="buy-btn" data-price="51449" data-name="Dell XPS 16" data-image="img/Screenshot_2025-05-20_125456-removebg-preview.png" data-description="Dell XPS 16 features a stunning 4K display, Intel i7 processor, and long battery life for productivity on the go.">Buy Now</button>
  </div> 
  <div class="products2">
    <img src="img/Screenshot_2025-05-20_125830-removebg-preview.png" alt="Acer x5">
    <h4>Acer x5</h4>
    <div class="price">₱22,599</div>
    <button class="buy-btn" data-price="22599" data-name="Acer x5" data-image="img/Screenshot_2025-05-20_125830-removebg-preview.png" data-description="Acer x5 offers a sleek design, powerful AMD Ryzen processor, and crisp Full HD display, perfect for work and play.">Buy Now</button>
  </div>
  <div class="products2">
    <img src="img/Screenshot_2025-05-20_125351-removebg-preview.png" alt="HP Spectre x3">
    <h4>HP Spectre x3</h4>
    <div class="price">₱53,419</div>
    <button class="buy-btn" data-price="53419" data-name="HP Spectre x36" data-image="img/Screenshot_2025-05-20_125351-removebg-preview.png" data-description="HP Spectre x3 combines elegance with performance, featuring a 360° hinge, touchscreen, and ultra-lightweight design.">Buy Now</button>
  </div>
  <div class="products2">
    <img src="img/Screenshot_2025-05-20_125402-removebg-preview.png" alt="Lenovo 9i">
    <h4>Lenovo 9i</h4>
    <div class="price">₱55,499</div>
    <button class="buy-btn" data-price="55499" data-name="Lenovo 9i" data-image="img/Screenshot_2025-05-20_125402-removebg-preview.png" data-description="Lenovo 9i delivers powerful performance with 12th Gen Intel processors and Dolby Vision audio in a sleek chassis.">Buy Now</button>
  </div> 
  <div class="products2">
    <img src="img/Screenshot_2025-05-20_125438-removebg-preview.png" alt="Acer i10">
    <h4>Acer i10</h4>
    <div class="price">₱24,999</div>
    <button class="buy-btn" data-price="24999" data-name="Acer i10" data-image="img/Screenshot_2025-05-20_125438-removebg-preview.png" data-description="Acer i10 is a lightweight notebook with fast SSD storage and long battery life, ideal for students and professionals.">Buy Now</button>
  </div> 
  <div class="products2">
    <img src="img/Screenshot_2025-05-20_125414-removebg-preview.png" alt="ROG vi10">
    <h4>ROG vi10</h4>
    <div class="price">₱74,599</div>
    <button class="buy-btn" data-price="74599" data-name="ROG vi10" data-image="img/Screenshot_2025-05-20_125414-removebg-preview.png" data-description="ROG vi10 gaming laptop features NVIDIA RTX graphics and high-refresh display for immersive AAA gaming experiences.">Buy Now</button>
  </div> 
  <div class="products2">
    <img src="img/Screenshot_2025-05-20_125449-removebg-preview.png" alt="Hp ic10">
    <h4>Hp ic10</h4>
    <div class="price">₱42,499</div>
    <button class="buy-btn" data-price="42499" data-name="Hp Ic10" data-image="img/Screenshot_2025-05-20_125449-removebg-preview.png" data-description="Hp ic10 offers reliable performance with Intel Core i5, fast boot times, and vibrant display for everyday use.">Buy Now</button>
  </div> 
  <div class="products2">
    <img src="img/Screenshot_2025-05-20_125443-removebg-preview.png" alt="Lenovo Del1">
    <h4>Lenovo Del1</h4>
    <div class="price">₱50,499</div>
    <button class="buy-btn" data-price="50339" data-name="Lenovo Del1" data-image="img/Screenshot_2025-05-20_125443-removebg-preview.png" data-description="Lenovo Del1 provides great multitasking with its 16GB RAM, sleek chassis, and immersive screen-to-body ratio.">Buy Now</button>
  </div> 
</div>


<div class="products-container">
  <div class="products3">
    <img src="img/Screenshot_2025-05-20_130217-removebg-preview.png" alt="Tuffed White Sof">
    <h4>AirPods Pro</h4>
    <div class="price">₱10,449</div>
    <button class="buy-btn" data-price="10449" data-name="AirPods Pro" data-image="img/Screenshot_2025-05-20_130217-removebg-preview.png" data-description="Premium wireless earpods delivering immersive sound quality and seamless Bluetooth connectivity for music lovers on the go.">Buy Now</button>
  </div> 
  <div class="products3">
    <img src="img/Screenshot_2025-05-20_130228-removebg-preview.png" alt="Wooden Spoon" >
    <h4>AirPods v2</h4>
    <div class="price">₱7,599</div>
    <button class="buy-btn" data-price="7599" data-name="AirPods v2" data-image="img/Screenshot_2025-05-20_130228-removebg-preview.png" data-description="Ergonomically designed earpods with noise isolation and a snug fit, perfect for workouts and all-day wear."   >Buy Now</button>
  </div>
  <div class="products3">
    <img src="img/Screenshot_2025-05-20_130300-removebg-preview.png" alt="Blender">
    <h4>AirPods v3</h4>
    <div class="price">₱8,419</div>
    <button class="buy-btn" data-price="8419" data-name="AirPods v3" data-image="img/Screenshot_2025-05-20_130300-removebg-preview.png" data-description="Enjoy up to 24 hours of playtime with these compact, rechargeable earpods featuring touch controls and voice assistant support."
>Buy Now</button>
  </div>
  <div class="products3">
    <img src="img/Screenshot_2025-05-20_130318-removebg-preview.png" alt ="Counter Top">
    <h4>AirPods Max</h4>
    <div class="price">₱7,499</div>
    <button class="buy-btn" data-price="7499" data-name="AirPods Max" data-image="img/Screenshot_2025-05-20_130318-removebg-preview.png" data-description="Sleek and lightweight earpods offering deep bass and crystal-clear calls with built-in dual microphones.">Buy Now</button>
  </div> 
  <div class="products3">
    <img src="img/Screenshot_2025-05-20_130334-removebg-preview.png" alt="Counter Top">
    <h4>AirPods v4</h4>
    <div class="price">₱6,999</div>
    <button class="buy-btn" data-price="6999" data-name="AirPods v4" data-image="img/Screenshot_2025-05-20_130334-removebg-preview.png" data-description="Water- and sweat-resistant wireless earpods ideal for active lifestyles, with fast pairing and ultra-stable connection.">Buy Now</button>
  </div> 
  <div class="products3">
    <img src="img/Screenshot_2025-05-20_130358-removebg-preview.png" alt="Counter Top">
    <h4>Lenovo Ip2</h4>
    <div class="price">₱1,000</div>
    <button class="buy-btn" data-price="1000" data-name="Lenovo Ip2" data-image="img/Screenshot_2025-05-20_130358-removebg-preview.png" data-description="Smart earpods engineered with Bluetooth 5.3 and auto-pairing for a seamless audio experience every time.">Buy Now</button>
  </div> 
  <div class="products3">
    <img src="img/Screenshot_2025-05-20_130433-removebg-preview.png" alt="Counter Top">
    <h4>Lenovo Ec Pro</h4>
    <div class="price">₱1,209</div>
    <button class="buy-btn" data-price="1209" data-name="Lenovo Ec Pro" data-image="img/Screenshot_2025-05-20_130433-removebg-preview.png" data-description="True wireless stereo (TWS) earpods designed for balanced sound, fast charging, and extended battery life.">Buy Now</button>
  </div> 
  <div class="products3">
    <img src="img/Screenshot_2025-05-20_130453-removebg-preview.png" alt="Counter Top">
    <h4>Lenovo Ec v1</h4>
    <div class="price">₱1,499</div>
    <button class="buy-btn" data-price="1499" data-name="Lenovo Ec v1" data-image="img/Screenshot_2025-05-20_130453-removebg-preview.png" data-description="Compact charging case and stylish earpods that deliver dynamic sound, making them a perfect tech companion on the go.">Buy Now</button>
  </div> 
</div>



<div class="products-container">
  <div class="products4">
    <img src="img/Screenshot_2025-05-20_131559-removebg-preview.png" alt="Tuffed White Sof">
    <h4>ROG Swift</h4>
    <div class="price">₱61,449</div>
    <button class="buy-btn" data-price="61449" data-name="ROG Swift" data-image= "img/Screenshot_2025-05-20_131559-removebg-preview.png"data-description="Ergonomic monitor stand that elevates your screen to eye level, reducing neck and shoulder strain for a healthier posture.">Buy Now</button>
  </div> 
  <div class="products4">
    <img src="img/Screenshot_2025-05-20_131540-removebg-preview.png" alt="Wooden Spoon" >
    <h4>ROG Strix</h4>
    <div class="price">₱46,599</div>
    <button class="buy-btn" data-price="46599" data-name="ROG Strix"  data-image= "img/Screenshot_2025-05-20_131540-removebg-preview.png" data-description="Sleek and durable monitor stand with adjustable height and angle, designed for improved comfort and productivity.">Buy Now</button>
  </div>
  <div class="products4">
    <img src="img/Screenshot_2025-05-20_131521-removebg-preview.png" alt="Blender">
    <h4> ROG PG258Q</h4>
    <div class="price">₱42,519</div>
    <button class="buy-btn" data-price="42519" data-name="ROG PG258Q"  data-image= "img/Screenshot_2025-05-20_131521-removebg-preview.png" data-description="Space-saving monitor riser with built-in storage for keyboards and office supplies, perfect for minimalist workspaces.">Buy Now</button>
  </div>
  <div class="products4">
    <img src="img/Screenshot_2025-05-20_131428-removebg-preview.png" alt ="Counter Top">
    <h4>ROG XG438QR</h4>
    <div class="price">₱71,299</div>
    <button class="buy-btn" data-price="71299" data-name="ROG XG438QR"  data-image= "img/Screenshot_2025-05-20_131428-removebg-preview.png" data-description="Heavy-duty monitor stand made from premium materials, supporting up to 20 kg with anti-slip feet for stability.">Buy Now</button>
  </div> 
  <div class="products4">
    <img src="img/Screenshot_2025-05-20_131352-removebg-preview.png" alt="Counter Top">
    <h4>ROG i5 </h4>
    <div class="price">₱76,999</div>
    <button class="buy-btn" data-price="76999" data-name="ROG i5"  data-image= "img/Screenshot_2025-05-20_131352-removebg-preview.png" data-description="Modern, clean-lined monitor stand that blends effortlessly into any home office or professional setup.">Buy Now</button>
  </div> 
  <div class="products4">
    <img src="img/Screenshot_2025-05-20_131322-removebg-preview.png" alt="Counter Top">
    <h4>ROG Mon2</h4>
    <div class="price">₱45,699</div>
    <button class="buy-btn" data-price="45699" data-name="ROG Mon2"  data-image= "img/Screenshot_2025-05-20_131322-removebg-preview.png" data-description="Quick-assemble monitor stand with no tools required — ideal for home, office, or gaming use.">Buy Now</button>
  </div> 
  <div class="products4">
    <img src="img/Screenshot_2025-05-20_131313-removebg-preview.png" alt="Counter Top">
    <h4>ROG Cv5000</h4>
    <div class="price">₱32,569</div>
    <button class="buy-btn" data-price="32569" data-name="ROG Cv5000"  data-image= "img/Screenshot_2025-05-20_131313-removebg-preview.png" data-description="Compact and sturdy monitor riser that helps declutter your desk while promoting better ergonomic alignment.">Buy Now</button>
  </div> 
  <div class="products4">
    <img src="img/Screenshot_2025-05-20_132011-removebg-preview.png" alt="Counter Top">
    <h4>ROG ES4</h4>
    <div class="price">₱73,239</div>
    <button class="buy-btn" data-price="74239" data-name="ROG ES4"  data-image= "img/Screenshot_2025-05-20_132011-removebg-preview.png" data-description="Multi-functional monitor stand with cable management slots and a smooth surface, perfect for tech enthusiasts.">Buy Now</button>
  </div> 
</div>

    
    

    <script src="shop.js"> </script>
</body>
</html>



