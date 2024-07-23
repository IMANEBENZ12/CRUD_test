document.getElementById('search-bar').addEventListener('input', function() {
    const query = this.value.toLowerCase();
    const results = document.getElementById('search-results');
    results.innerHTML = '';

    if (query.length > 0) {
        fetch('search.php?q=' + query)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    data.forEach(product => {
                        const productElement = document.createElement('div');
                        productElement.textContent = product.name + ' - ' + product.price + ' USD';
                        results.appendChild(productElement);
                    });
                } else {
                    results.textContent = 'No products found.';
                }
            });
    }
});
