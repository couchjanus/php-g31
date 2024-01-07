const template = document.createElement('template');

template.innerHTML = 
`<style>
@import url('https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,600;0,700;1,400;1,700;1,800&family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Nunito:ital,wght@0,400;0,600;1,400&family=Poppins:ital,wght@0,100;0,300;0,400;0,500;0,600;1,100;1,300;1,400;1,500;1,600&family=Roboto:ital,wght@0,300;0,400;0,700;1,400;1,700&display=swap');

.bg-cover {
    background-size: cover !important;
}

.bg-center {
    background-position: center center !important;
}

.bg-fixed {
    background-attachment: fixed !important;
}

.container {
    width: 97%;
    margin: 0 auto;  
}

.mt-5 {
    margin-top: 3rem;
}


.py-5 {
    padding: 3rem 0;
}

.px-4 {
    padding-left: 2rem;
    padding-right: 2rem;
}

.text-right {
    text-align: right;
}


</style>
<section class="divider bg-cover bg-center bg-fixed py-5 mt-5" style="background: url(/images/divider-bg.jpg)">
    <div class="container py-5 px-4 text-right">
        <p>New actions and events</p>
        <h2>Notify me for events please </h2>
        <a href="shop.html">Subscribe</a>
    </div>
</section>`;

export default class Divider extends HTMLElement {
    constructor() {
      super();
    }
  
    connectedCallback() {
      const shadowRoot = this.attachShadow({ mode: 'closed' });
  
      shadowRoot.appendChild(template.content);
    }
}
