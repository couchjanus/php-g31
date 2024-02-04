"use strict";

import { Store } from '/js/modules/store.js';
import {populateProductList, addProductToCartButton} from '/js/modules/catalog.js';
import { populateShoppingCart, renderCart } from '/js/modules/cart.js';
import { cartItemsAmount, fetchData, isAuth} from '/js/modules/helpers.js';
import { detailButton} from '/js/modules/modal.js';

import { populateCategories, renderCategory, renderSelect, renderShowOnly } from '/js/modules/categories.js';

import Footer from '/js/components/footer.js';
customElements.define('footer-component', Footer);
import Login from '/js/components/login.js';
customElements.define('login-component', Login);

import Divider from '/js/components/divider.js';
customElements.define('divider-component', Divider);

import Breadcrumb from './components/breadcrumb.js';
customElements.define('breadcrumb-component', Breadcrumb);

import Contact from './components/contact.js';
customElements.define('contact-component', Contact);

import Services from './components/services.js';
customElements.define('services-component', Services);

import Carousel from './components/carousel.js';
customElements.define('carousel-component', Carousel);

let cart = [];
let wishlist = [];

function main() {

	cart = Store.init('basket');
	wishlist = Store.init('wishlist');
	cartItemsAmount(cart);

	// const url = 'https://my-json-server.typicode.com/couchjanus/db';
	const url = "http://cms.my";

	const productContainer = document.querySelector('.product-container');
	fetchData(`${url}/products`)
    .then(products => {
		// console.log("products", products);
		if (productContainer) {
			productContainer.innerHTML = populateProductList(products);	
			addProductToCartButton(cart);
			// addProductToWishListButton();
			detailButton(cart, products);

			const selectPicker = document.querySelector('.selectpicker');
			if(selectPicker) {
				renderSelect(selectPicker, products, productContainer, cart);
			}

			const showOnly = document.querySelector(".show-only");
			if (showOnly) {
				renderShowOnly(showOnly, products, productContainer);
			}
			
			const categoryContainer = document.getElementById('category-container');
			if(categoryContainer) {
				fetchData(`${url}/categories`)
                .then(categories => {
					populateCategories(categoryContainer, categories);
					renderCategory(productContainer, '#category-container', products, cart);
				});
			}
		}

		const carouselComponent = document.querySelector('carousel-component');

		if(carouselComponent){
			const carousel = carouselComponent.shadowRoot.getElementById('carousel');
			const slider = carousel.querySelector('.slider');
			const slideTrack = slider.querySelector('.slide-track');
			const slides = slideTrack.querySelector('.slide');
			console.log(slides);
			// console.log(categoryItems.firstElementChild.firstElementChild.childNodes.ch);
			// const items = carouselComponent.querySelectorAll('.category-item');
			// console.log(items);

		}

		const cartPage = document.getElementById('cart-page');
		if(cartPage) {
			const shoppingCartItems = cartPage.querySelector('.shopping-cart-items');
			// console.log(products);
			shoppingCartItems.innerHTML = populateShoppingCart(cart, products);
			renderCart(shoppingCartItems, cart);
			isAuth(url).then(auth => {
				console.log(auth);
			  if(auth) {
			
				document.getElementById('checkout').addEventListener("click", () => {
					let inCart = [];
					Store.get("basket").forEach(item =>{
						inCart.push({
							id:parseInt(item.id),
							amount: parseInt(item.amount)
						});
					});

					console.log(inCart);
					console.log(JSON.stringify({
						cart: inCart
					}));
					fetch("api/checkout", {
						method: "POST",
						headers: {
							"Content-Type": "application/json"
						},
						body: JSON.stringify({
							cart: inCart
						})
					})
					.then(
						response => {
							console.log(response);
							Store.clear();
							document.location.replace("/profile");
						}
					)
					.catch(error => console.log(error));


				}) //checkout
						
			  }
		    })
		}

	}); //fetchData
 }

 if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", () => {
        main();
    });
} else {
    main();
}
