import { Store } from '/js/modules/store.js';

export const findItem = (items, id) => items.find(item => item.id == id);

export const filterItem = (items, id) => items.filter(item => item.id != id);

const changeStyle = (item) => item.classList.add(["not-empty"]);


export function cartItemsAmount(cart) {
    const totalInCart = document.getElementById('total-amount-in-cart');
    if (!+totalInCart.innerText) {
        changeStyle(totalInCart);
    }
    totalInCart.textContent = cart.reduce((prev, cur) => prev + cur.amount, 0);
}


export function saveCart(cart){
    Store.set('basket', cart);
    cartItemsAmount(cart);
}


function saveWishList(wishlist){
    Store.set('wishlist', wishlist);
}

export async function fetchData(url){
    return await fetch(url, {
        method: 'GET',
        headers: {'Content-Type': 'application/json'}
    }).then(response => {
        if(response.status >= 400){
            return response.json().then(err => {
                const error = new Error('Something went wrong!')
                error.data = err
                throw error
            })
        }
        return response.json()
    })
}

export async function isAuth(url) {
    return await fetch(`${url}/api/auth`, {
        method: 'GET',
        headers: {'Content-Type': 'application/json'}
    })
    .then(response => response.json());
}