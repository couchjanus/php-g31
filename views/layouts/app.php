<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Layout</title>
    <link href="/css/main.css" rel="stylesheet">
</head>
<body>
    <!-- App Layout -->
    <header class="page-header">
      <a href="#!" class="brand fas fa-shopping-cart">&nbsp;Shopaholic</a>
      <label for="toggler-btn">&nbsp;<i class="fas fa-bars"></i>&nbsp;</label>
      <input type="checkbox" id="toggler-btn" name="inp">

      <nav class="navbar" id="navbar">
            <!-- navigation -->
            <a href="/">Home</a> 
            <a href="/catalog">Catalog</a> 
            <a href="/blog">Blog</a> 
            <a href="/about">About</a> 
            <a href="/contact">Contact</a> 
      </nav>
      
      <nav class="toolbar">
            <a href="#" class="far fa-heart">(<span id="total-amount-in-wishlist">0</span>)</a>
            <a href="/cart" class="fas fa-dolly-flatbed">(<span id="total-amount-in-cart">0</span>)</a>
            <?php if (Core\Session::instance()->get('userId')):?>
              <a href="/profile" class="fas fa-address-card"></a>
              <a href="/logout" class="fas fa-sign-out-alt"></a>
            <?php else:?>
              <a href="#!" onclick="window.signin.shadowRoot.querySelector('#login').showModal();" class="far fa-user"></a>
            <?php endif?>
            
      </nav>
  </header>  
    
  {{ content }}

<footer-component></footer-component>
<login-component id="signin"></login-component>
<script src="/js/main.js" type="module" defer></script>
</body>
</html>