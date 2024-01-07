const template = document.createElement('template');
template.innerHTML = `
<style>
.breadcrumb-container {
    display: flex;
    justify-content: space-between;
    padding-top: 3rem;
}

.breadcrumb-title {
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    font-size: 1.7rem;
    padding-top: .75rem;
}
.breadcrumb {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-end;
    padding: 0;
    font-size: .85rem;
    list-style: none;
}

.breadcrumb-item {
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    font-size: 1.7rem;
}

.breadcrumb-item+.breadcrumb-item {
    padding-left: .5rem;
}
.breadcrumb-item.active {
    color: #adb5bd;
}

.breadcrumb-item a:hover { 
  color: salmon;
}

.breadcrumb-item+.breadcrumb-item::before {
    float: left;
    padding-right: .5rem;
    color: #ced4da;
    content: var(--breadcrumb-divider,  "/") ;
}


.bg-light{
    background-color:rgb(248,249,250) !important;
}
.text-dark {
    color: #130f40;
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

</style>

<section class="bg-light mt-5">
    <div class="container py-5">
          <div class="breadcrumb-container"></div>
    </div>
</section>`;

export default class Breadcrumb extends HTMLElement {
    constructor() {
        super();
        this.shadow = this.attachShadow({mode: 'open'});
        this.shadow.appendChild(template.content);
    }

    get title() {
        return this.getAttribute('title');
    }
    
    get page_title() {
        return this.getAttribute('page_title');
    }

    makeCrumbBlock = () => `
    <div class="breadcrumb-title">${this.title}</div>
            
    <ul class="breadcrumb">
          <li class="breadcrumb-item"><a class="text-dark" href="/">Home</a></li>
          <li class="breadcrumb-item active">${this.page_title}</li>
    </ul>
    </div>`;

    connectedCallback() {
        const crumb = this.shadow.querySelector('.breadcrumb-container');
        crumb.innerHTML = this.makeCrumbBlock()
    }
}
