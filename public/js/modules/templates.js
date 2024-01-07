const productItemTemplate = (product) => `
    <article class="product" data-id="${product.id}">
        <div class="icons" data-id="${product.id}">
            <a href="#" class="fas fa-shopping-cart add-to-cart"></a>
            <a href="#" class="fas fa-heart add-to-wishlist"></a>
            <a href="#productView" class="fas fa-eye detail"></a>
        </div>

        <div class="image">
            <div class="badge text-white bg-${product.badge.bg}">${product.badge.title}</div>
            <img src="${product.image}">
        </div>

        <div class="content">
            <p>${product.name}</p>
            <div class="price">
                $<span>${product.price}</span>
            </div>
        </div>
    </article>
`;

export const modalTemplate = (product) =>`
<div class="modal" id="productView">
    <div class="modal-dialog">
      <a href="#!" title="Close" class="close btn-close fas fa-times"></a>
      <div class="modal-body">
        <aside><img src="${product.image}"></aside>
        <main>
          <div class="info-container">
            <div class="info-header"><h2>${product.name}</h2></div>

            <div class="info-price">$${product.price}</div>
            <div class="info-shipping">Free shipping</div>
                    
            <div class="info-button to-cart" data-id="${product.id}">
                <a href="#!" class="btn btn-submit add-to-cart"><i class="fas fa-cart-plus"></i> Add to Cart</a>
            </div>

            <h3 class="qty-header py-2">Amount:</h3>     
                        
            <div class="qty qty-buttons">
                <div class="number-input quantity" data-id="${product.id}">
                    <button class="btn btn-dec">-</button>
                    <input class="quantity-result"
                                    type="number" 
                                    value="1"
                                    min="1"
                                    max="10"
                                    required 
                                    />
                    <button class="btn btn-inc">+</button>
                </div>
            </div>

            <div class="info-description">${product.description}</div>
            <a class="btn btn-link text-dark text-decoration-none" href="#!" data-id="${product.id}"><i class="far fa-heart add-to-wishlist"></i>Add to wish list</a>
          </div>
        </main>
      </div>
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

const makeTitle = (icon, title) => `
<h3><svg class="svg-icon mb-4 text-primary svg-icon-light">
    <use xlink:href="#${icon}"> </use>
</svg> ${title}</h3>`;

export const makeContacts = (item) => {
    let content = makeTitle(item.icon, item.title);
    for (let [key, value] of Object.entries(item)){
        if (!(key == 'icon' || key == 'title')) {
            if (key == 'email') {
                value = `<a class="btn btn-link" href="mailto:">${value}</a>`;
            }
            content += `<p>${value}</p>`;
        }
    }
    return content;
} 


