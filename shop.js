document.addEventListener('DOMContentLoaded', () => { 
    console.log('DOM loaded, initializing shop...');

    const modal = document.getElementById('buyModal');
    const form = document.getElementById('checkoutForm');
    const phoneInput = document.getElementById('phone');
    const addressInput = document.getElementById('addressInput');
    const closeBtn = document.querySelector('.close-btn');

    const productNameInput = document.getElementById('productNameInput');
    const productPriceInput = document.getElementById('productPriceInput');
    const productImageInput = document.getElementById('productImageInput');
    const productDescriptionInput = document.getElementById('productDescriptionInput');

    const modalProductName = document.getElementById('modalProductName');
    const modalProductDescription = document.getElementById('modalProductDescription');
    const modalProductImage = document.getElementById('modalProductImage');

    const productPriceDisplay = document.getElementById('productPrice');
    const shippingDisplay = document.getElementById('shippingFee');
    const totalDisplay = document.getElementById('totalPrice');

    const applyVoucherBtn = document.getElementById('applyVoucherBtn');
    const voucherCodeInput = document.getElementById('voucherCode');
    const discountAmountDisplay = document.getElementById('discountAmount');

    const orderSummary = document.getElementById('orderSummary');
    const summaryDetails = document.getElementById('summaryDetails');
    const confirmOrderBtn = document.getElementById('confirmOrderBtn');
    const cancelSummaryBtn = document.getElementById('cancelSummaryBtn');

    const successMessage = document.getElementById('successMessage');

    let selectedProduct = { name: '', price: 0, image: '', description: '' };
    let originalPrice = 0;
    let isVoucherApplied = false;
    let showingSummary = false;

    // Buy button click handlers
    document.querySelectorAll('.buy-btn').forEach((button, index) => {
        console.log(`Found buy button ${index + 1}`);

        button.addEventListener('click', (e) => {
            e.preventDefault();
            console.log('Buy button clicked!');

            selectedProduct.name = button.dataset.name || 'Unknown Product';
            selectedProduct.price = parseFloat(button.dataset.price) || 0;
            originalPrice = selectedProduct.price;
            selectedProduct.image = button.dataset.image || '';
            selectedProduct.description = button.dataset.description || 'No description available';

            isVoucherApplied = false;
            if (voucherCodeInput) voucherCodeInput.value = '';
            if (discountAmountDisplay) discountAmountDisplay.textContent = '';

            modalProductName.textContent = selectedProduct.name;
            modalProductDescription.textContent = selectedProduct.description;
            modalProductImage.src = selectedProduct.image;
            modalProductImage.alt = selectedProduct.name;

            productNameInput.value = selectedProduct.name;
            productPriceInput.value = selectedProduct.price.toFixed(2);
            productImageInput.value = selectedProduct.image;
            productDescriptionInput.value = selectedProduct.description;

            updateTotalPrice();
            restoreFormData();

            form.style.display = 'block';
            orderSummary.style.display = 'none';
            if (successMessage) successMessage.style.display = 'none';
            showingSummary = false;

            modal.style.display = 'block';
        });
    });

    // Close modal when clicking outside it
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });

    // Close button inside modal
    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            modal.style.display = 'none';
        });
    }

    // Phone input validation
    if (phoneInput) {
        phoneInput.addEventListener('input', () => {
            const value = phoneInput.value;
            phoneInput.setCustomValidity(
                (!value.startsWith('09') || value.length !== 11 || isNaN(value))
                    ? "Phone number must start with '09' and be 11 digits long."
                    : ''
            );
        });
    }

    function updateTotalPrice() {
        const shipping = 150.00;
        const total = selectedProduct.price + shipping;

        if (productPriceDisplay) {
            productPriceDisplay.textContent = `₱${selectedProduct.price.toFixed(2)}`;
        }
        if (shippingDisplay) {
            shippingDisplay.textContent = `₱${shipping.toFixed(2)}`;
        }
        if (totalDisplay) {
            totalDisplay.textContent = `₱${total.toFixed(2)}`;
        }
    }

    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();

            const address = addressInput?.value.trim();
            const phone = phoneInput?.value.trim();
            const color = form.elements['color']?.value;
            const city = form.elements['city']?.value;
            const province = form.elements['province']?.value;
            const paymentMethod = form.elements['paymentMethod']?.value;

            if (!address || !city || !province || !phone || !color || !paymentMethod) {
                alert("Please complete all required fields.");
                return;
            }

            if (!phone.startsWith('09') || phone.length !== 11 || isNaN(phone)) {
                alert("Please enter a valid phone number starting with '09' and 11 digits long.");
                return;
            }

            if (!showingSummary) {
                const total = (selectedProduct.price + 150).toFixed(2);
                const summaryText = `
                    <strong>Product:</strong> ${selectedProduct.name}<br>
                    <strong>Color:</strong> ${color}<br>
                    <strong>Total:</strong> ₱${parseFloat(total).toLocaleString()}<br>
                    <strong>Address:</strong> ${address}, ${city}, ${province}<br>
                    <strong>Phone:</strong> ${phone}<br>
                    <strong>Payment Method:</strong> ${paymentMethod}
                `;

                summaryDetails.innerHTML = summaryText;
                form.style.display = 'none';
                orderSummary.style.display = 'block';
                showingSummary = true;
                return;
            }
        });
    }

    if (confirmOrderBtn) {
        confirmOrderBtn.addEventListener('click', () => {
            const formData = new FormData(form);

            formData.set('product_name', selectedProduct.name);
            formData.set('product_price', selectedProduct.price.toFixed(2));
            formData.set('product_image', selectedProduct.image);
            formData.set('product_description', selectedProduct.description);

            fetch('place_order.php', {  
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    form.style.display = 'none';
                    orderSummary.style.display = 'none';
                    if (successMessage) {
                        successMessage.style.display = 'flex';
                    }
                } else {
                    alert('Failed to submit order: ' + (data.message || 'Unknown error.'));
                }
            })
            .catch(error => {
                console.error('Error submitting order:', error);
                alert('There was an error submitting your order. Please try again.');
            });
        });
    }

    if (cancelSummaryBtn) {
        cancelSummaryBtn.addEventListener('click', () => {
            showingSummary = false;
            orderSummary.style.display = 'none';
            form.style.display = 'block';
            if (successMessage) successMessage.style.display = 'none';
        });
    }

    if (form) {
        form.addEventListener('input', () => {
            const formData = new FormData(form);
            const obj = {};
            formData.forEach((value, key) => {
                obj[key] = value;
            });
            sessionStorage.setItem('formData_' + selectedProduct.name, JSON.stringify(obj));
        });
    }

    function restoreFormData() {
        const saved = sessionStorage.getItem('formData_' + selectedProduct.name);
        if (!saved) return;

        try {
            const obj = JSON.parse(saved);
            Object.keys(obj).forEach(key => {
                const field = form.elements[key];
                if (field && field.type !== 'hidden') {
                    field.value = obj[key];
                }
            });
        } catch (error) {
            console.error('Error restoring form data:', error);
        }
    }

    if (applyVoucherBtn) {
        applyVoucherBtn.addEventListener('click', () => {
            if (isVoucherApplied) return;

            const code = voucherCodeInput.value.trim();

            if (code !== '') {
                const discount = originalPrice * 0.10;
                selectedProduct.price = originalPrice - discount;
                isVoucherApplied = true;

                discountAmountDisplay.textContent = `You got ₱${discount.toFixed(2)} off!`;
                updateTotalPrice();
            } else {
                discountAmountDisplay.textContent = '';
                alert("No voucher code entered. This step is optional.");
            }
        });
    }

    // --- New code for search select scroll ---
    const searchBtn = document.querySelector('.search-button');
    const searchSelect = document.getElementById('searchSelect');

    if (searchBtn && searchSelect) {
      searchBtn.addEventListener('click', (e) => {
        e.preventDefault();
        const selectedValue = searchSelect.value;

        if (!selectedValue) {
          alert('Please select a product.');
          return;
        }

        // Map select values to product section IDs
        const idMap = {
          'Phone': 'iphone',
          'Laptop': 'laptops',
          'Airpods': 'airpods',
          'Monitor': 'monitors'
        };

        const targetId = idMap[selectedValue];
        if (!targetId) {
          alert('Product section not found!');
          return;
        }

        const targetSection = document.getElementById(targetId);
        if (targetSection) {
          targetSection.scrollIntoView({ behavior: 'smooth' });
        } else {
          alert('Product section not found!');
        }
      });
    }

    console.log('Shop initialization complete');
});
