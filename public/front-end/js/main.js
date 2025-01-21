//  for a country selection 

const countryButton = document.querySelector('.country-btn');
const dropdownMenu = document.querySelector('.dropdown-menu');
const dropdownItems = dropdownMenu.querySelectorAll('a');

// Toggle dropdown visibility
countryButton.addEventListener('click', () => {
  dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
});

// Update button text and hide dropdown when an item is clicked
dropdownItems.forEach((item) => {
  item.addEventListener('click', (event) => {
    event.preventDefault(); // Prevent link default action
    const selectedCountry = item.dataset.country;
    countryButton.textContent = selectedCountry; // Update button text
    dropdownMenu.style.display = 'none'; // Hide dropdown

  });
});

// Close dropdown when clicking outside
document.addEventListener('click', (event) => {
  if (!event.target.closest('.dropdown')) {
    dropdownMenu.style.display = 'none';
  }
});

// for a lang selection 

const langButton = document.querySelector('.lang-btn');

// Function to toggle language
langButton.addEventListener('click', () => {
  if (langButton.textContent === 'ENG') {
    langButton.textContent = 'AR'; // Change to Arabic
    //  document.body.setAttribute('dir', 'rtl'); 
    //  document.body.lang = 'ar'; 
  } else {
    langButton.textContent = 'ENG';
    //  document.body.setAttribute('dir', 'ltr'); 
    //  document.body.lang = 'en'; 
  }
});

// nav link active
const navLinks = document.querySelectorAll('.nav-link');


navLinks.forEach(link => {
  link.addEventListener('click', function (event) {
    event.preventDefault();


    navLinks.forEach(nav => nav.classList.remove('active'));


    this.classList.add('active');
  });
});






// counter increment
document.addEventListener('DOMContentLoaded', () => {
  // Function to handle quantity increment and decrement
  const setupQuantityControls = (container) => {
    const decrementButton = container.querySelector('.quantity-btn.decrement');
    const incrementButton = container.querySelector('.quantity-btn.increment');
    const quantityCount = container.querySelector('.quantity-count');

    // Set initial count
    let count = parseInt(quantityCount.textContent);

    // Decrement button
    decrementButton.addEventListener('click', () => {
      if (count > 1) { // Prevent going below 1
        count--;
        quantityCount.textContent = count;
      }
    });

    // Increment button
    incrementButton.addEventListener('click', () => {
      count++;
      quantityCount.textContent = count;
    });
  };

  // Initialize all quantity selectors
  document.querySelectorAll('.quantity-selector').forEach((container) => {
    setupQuantityControls(container);
  });
});




// navbr cart box
// cart-pop-box
// Get the elements
const cartIcon = document.getElementById('cart-icon');
const cartBox = document.getElementById('cart-box');
const closeButton = document.getElementById('close-btn-cart-box');

// Toggle the cart box when the cart icon is clicked
cartIcon.addEventListener('click', () => {
  cartBox.classList.add('active'); // Show the box
});

// Close the cart box when the close button is clicked
closeButton.addEventListener('click', () => {
  cartBox.classList.remove('active'); // Hide the box
});


