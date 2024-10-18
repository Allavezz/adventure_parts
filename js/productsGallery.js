const productCards = document.querySelectorAll('.products__card');
const paginationContainer = document.querySelector('.products__pagination');
const productsPerPage = 12;
let currentPage = 1;
const totalPages = Math.ceil(productCards.length / productsPerPage);

// Function to display products based on current page
function displayProducts(page) {
	const start = (page - 1) * productsPerPage;
	const end = page * productsPerPage;

	productCards.forEach((product, index) => {
		if (index >= start && index < end) {
			product.classList.remove('products__card--hide');
		} else {
			product.classList.add('products__card--hide');
		}
	});
}

// Function to create pagination buttons
function createPagination() {
	paginationContainer.innerHTML = ''; // Clear previous pagination buttons

	for (let i = 1; i <= totalPages; i++) {
		const button = document.createElement('button');
		button.textContent = i;
		button.classList.add('products__pag-buttons');

		// Highlight the current page button
		if (i === currentPage) {
			button.classList.add('products__pag-buttons--active');
		}

		// Add click event to each button
		button.addEventListener('click', function () {
			currentPage = i; //Update current page
			displayProducts(currentPage); // Display products for the selected page
			updatePaginationButtons(); // Update button states
		});

		paginationContainer.appendChild(button);
	}
}

// Function to update the pagination button states
function updatePaginationButtons() {
	const buttons = document.querySelectorAll('.products__pag-buttons');
	buttons.forEach((button, index) => {
		button.classList.remove('products__pag-buttons--active'); // Remove active class from all
		if (index + 1 === currentPage) {
			button.classList.add('products__pag-buttons--active');
		}
	});
}

// Initialize the pagination
displayProducts(currentPage);
createPagination();
