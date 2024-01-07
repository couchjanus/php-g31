const productItemTemplate = (product) => `
<div class="product" data-id="${product.id}">
    <div class="icons">
        <a href="#" class="fas fa-shopping-cart add-to-cart"></a>
        <a href="#" class="fas fa-heart add-to-wishlist"></a>
        <a href="#productView" class="fas fa-eye detail"></a>
    </div>
    <div class="image">
        <div class="badge text-white bg-${product.badge.bg}">${product.badge.title}</div>
        <img src="${product.image}">
    </div>

    <div class="content">
        <h3>${product.name}</h3>
              <div><span class="price">${product.price}</span></div>
        </div>
    </div>
`;

export function populateProductList(products) {
	let content = "";
	for (const item of products) {
  		content += productItemTemplate(item);
	}
	return content;
}

export function addProductToCart(cart, product, amount = 1){
    let inCart = cart.some(element => element.id === product.id);
	if (inCart){
	    cart.forEach(item => {
	        if(item.id === product.id) {
	            item.amount += amount;
	        }
	    })
	}else{
	    let cartItem = {...product, amount: amount};
	        cart = [...cart, cartItem];
	}
	saveCart(cart);
}

export function addProductToCartButton(cart) {
    let addToCartButtons = document.querySelectorAll(".add-to-cart");

    if (addToCartButtons) {
        addToCartButtons.forEach((element) => {
            element.addEventListener('click', (event) => {
                let productId = event.target.closest('.icons').dataset.id;
                addProductToCart(cart, {id: productId});

            });
        });
    }
}