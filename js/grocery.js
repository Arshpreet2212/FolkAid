const form = document.querySelector('form');
const storeList = document.querySelector('#store-list');

form.addEventListener('submit', event => {
	event.preventDefault(); // Prevent form submission
	
	const location = form.elements.location.value;
	const url = `https://api.yelp.com/v3/businesses/search?term=grocery&location=${location}`;
	const apiKey = '1qvfog8NZOO6tXJi1pBDYDq-NBgIUREOG8657IXcQG1mJGzGFE5woVxMDC0YChLrxS0L5wkvzLev16noW6YpGPxOeD7c7zT06PYHt65GlLBeHoZuakz0hcTPRBE1ZHYx'; // Replace with your own Yelp API key
	
	fetch(url, {
		headers: {
			Authorization: `Bearer ${apiKey}`,
			'Content-Type': 'application/json'
		}
	})
	.then(response => response.json())
	.then(data => {
		storeList.innerHTML = ''; // Clear previous results
		
		if (data.businesses.length === 0) {
			storeList.innerHTML = '<li>No stores found</li>';
			return;
		}
		
		data.businesses.forEach(store => {
			const li = document.createElement('li');
			const name = document.createElement('h3');
			name.textContent = store.name;
			const address = document.createElement('p');
			address.textContent = `${store.location.address1}, ${store.location.city}, ${store.location.state}, ${store.location.zip_code}`;
			const phone = document.createElement('p');
			phone.textContent = store.phone;
			li.append(name, address, phone);
			storeList.append(li);
		});
	})
	.catch(error => {
		console.error(error);
		storeList.innerHTML = '<li>An error occurred, please try again later</li>';
	});
});
