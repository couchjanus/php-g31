<breadcrumb-component title="Shopping Cart" page_title="Tour cart"></breadcrumb-component>
<section id="cart-page">
      
      <div class="container">
        <div class="cart-wrapper">
          <div class="cart-content">
            <div class="table-responsive mb-4">
                
                <table class="table text-nowrap">
                  
                  <thead class="bg-light py-5">
                    <tr class="table-row">
                      <th class="p-3"></th>
                      <th class="py-3 align-middle"><strong class="text-uppercase">Product</strong></th>
                      <th class="py-3 align-middle"><strong class="text-uppercase">Price</strong></th>
                      <th class="py-3 align-middle"><strong class="text-uppercase">Quantity</strong></th>
                      <th class="py-3 align-middle"><strong class="text-uppercase">Total</strong></th>
                      <th class="p-3"></th>
                    </tr>
                  </thead>
                  
                  <tbody class="shopping-cart-items"></tbody>
                </table>
            </div>
            
          </div>

          <div class="cart-sidebar">
              
            <div class="card bg-light">
                <div class="card-body">
                  <h4 class="text-uppercase mb-4">Cart total</h4>
                  <ul class="list-unstyled">
                    <li class="d-flex align-items-center justify-content-between">
                      <strong class="text-uppercase">Subtotal: </strong>&nbsp;
                      <span class="cart-subtotal">250</span>
                    </li>
                    <li class="d-flex align-items-center justify-content-between">
                      <strong class="text-uppercase">Tax: </strong>&nbsp;
                      <span class="cart-tax">25</span>
                    </li>
                    <li class="border-bottom my-2"></li>
                    <li class="d-flex align-items-center justify-content-between mb-4">
                      <strong class="text-uppercase">Total:</strong>&nbsp;
                      <span class="cart-total">275</span>
                    </li>
                    <li>
                      <form action="#">
                        <div class="input-group">
                          <input class="form-control" type="text" placeholder="Enter your coupon">
                          <button class="btn btn-primary w-100" type="submit"> <i class="fas fa-gift"></i>&nbsp;Apply coupon</button>
                        </div>
                      </form>
                    </li>
                  </ul>
                </div>
            </div>

          </div>

          <div class="cart-footer bg-light">
              <nav class="text-center">
                  <a class="btn btn-link text-dark" href="/"><i class="fas fa-long-arrow-alt-left"></i> Continue shopping</a>
                  <a class="btn btn-outline-dark checkout" href="#!" id="checkout"> Procceed to checkout<i class="fas fa-long-arrow-alt-right"></i></a>
              </nav>
            
          </div>

        </div>
      </div>
</section>
<divider-component></divider-component>