const contactTemplate = document.createElement('template');

contactTemplate.innerHTML = `<style>
@import url('https://fonts.googleapis.com/css2?family=Libre+Franklin:ital,wght@0,600;0,700;1,400;1,700;1,800&family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Nunito:ital,wght@0,400;0,600;1,400&family=Poppins:ital,wght@0,100;0,300;0,400;0,500;0,600;1,100;1,300;1,400;1,500;1,600&family=Roboto:ital,wght@0,300;0,400;0,700;1,400;1,700&display=swap');

* {
    margin: 0;
    padding: 0;
    border: 0;
    outline: 0;
    text-decoration: none;
    box-sizing: border-box;
}


.contact-wrapper {
    display: flex;
    flex-direction: row;
    
    
}

.contact-main {
    flex: 1 0 auto;
    width: 50%
    padding: 0 1rem;

}

.contact-sidebar {
    border: #ced4da 1px dotted;
    flex: 1 0 auto;
    width: 50%
    padding: 0 1rem;
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

form {
    margin: 0;
    padding: 0;
}

label {
    display: inline-block;
}

.form-label {
    margin-bottom: .5rem;
}

textarea.form-control {
    min-height: calc(1.5em + .75rem + 2px);
    margin-bottom: 1rem;
}

.form-control {
    display: block;
    width: 100%;
    padding: .375rem .75rem;
    line-height: 1.5;
    border: 1px solid #ced4da;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out; 
}

.form-control:focus {
    border-color: #eed8a5;
    outline: 0;
    box-shadow: 0 0 0 .25rem rgba(220, 177, 74, 0.25);
}

.form-control::placeholder {
    color: #adb5bd;
}

.input-group {
    display: flex;
    flex-wrap: wrap;
}

.input-group div {
    padding: 0%;
    margin: 0%;
    flex: 1;
}

.form-control:focus {
    color: #212529;
    background-color: #fff;
    border-color: #eed8a5;
    outline: 0;
    box-shadow: 0 0 0 .25rem rgba(220, 177, 74, 0.25);
}

.form-control::placeholder {
    color: #adb5bd;
    opacity: 1;
}

.btn {
    font-size: 1.2rem;
    line-height: 1.5;
    text-align: center;
    text-decoration: none;
    vertical-align: middle;
    background-color: transparent;
    border: 1px solid transparent;
    padding: .375rem .75rem;
}

.btn-primary {
    color: white;
    background-color: salmon;
    border-color: salmon;
    border-radius: 5%;
}

.btn-primary:hover {
    color: salmon;
    font-weight: 700;
    background-color: #fff;
    border-color: salmon;
}
</style>

<section class="container py-5">
    <div class="contact-wrapper">
        <div class="contact-main">
            <form class="form" id="contact-form" method="post" action="/contact">
              <div class="form-container">
                <div class="input-group">  
                  <div class="">
                      <label class="form-label" for="name">Your firstname *</label>
                      <input class="form-control" type="text" name="name" id="name" placeholder="Enter your firstname" required="required">
                  </div>
                  <div class="">
                    <label class="form-label" for="surname">Your lastname *</label>
                    <input class="form-control" type="text" name="surname" id="surname" placeholder="Enter your  lastname" required="required">
                    </div>
                </div>
                
                <div class="input-group">
                  <label class="form-label" for="email">Your email *</label>
                  <input class="form-control" type="email" name="email" id="email" placeholder="Enter your  email" required="required">
                </div>
                
                <div class="input-group">
                  <label class="form-label" for="message">Your message for us *</label>
                  <textarea class="rounded form-control" rows="4" name="message" id="message" placeholder="Enter your message" required="required"></textarea>
                </div>
                <div class="input-group">
                  <button class="btn btn-primary" type="submit">Send message</button>
                </div>
              </div>
            </form>
        </div>
        
        <div class="contact-sidebar px-4">
            
        </div>
    </div>
</section>`;

export default class Contact extends HTMLElement {
    constructor() {
      super();
      this.shadow = this.attachShadow({mode: 'open'});
      this.shadow.appendChild(contactTemplate.content);
    }
    
    makeContacts = (item) => {
        let content = `<h3>${item.title}</h3>`;
        for (let [key, value] of Object.entries(item)){
            if (!(key == 'title')) {
                if (key == 'email') {
                    value = `<a class="btn btn-link" href="mailto:">${value}</a>`;
                }
                content += `<p>${value}</p>`;
            }
        }
        return content;
    } 

    get contacts() {
        return this.getAttribute('contacts');
    }
        
    connectedCallback() {
        let addressBox =  this.shadow.querySelector('.contact-sidebar');
        let content = '';
        for (let [key, value] of Object.entries(contacts)) {
            content += this.makeContacts(value);
        }
        addressBox.innerHTML = content;
    
    }
}
