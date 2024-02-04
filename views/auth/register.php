<style>
 .signup-row {
   display: grid;
   grid-template-columns: repeat(2, 1fr);
 }
</style>
<div class="container py-5 px-4">
 <div class="row py-5 px-5">
   <h2 class="hero-heading">Register</h2>
   <form class="mb-5" action="/signup" method="POST">
     <p class="mb-4">Personal information</p>   
     <div class="signup-row">
         <div class="mb-3">
             <label class="form-label">First name</label>
             <input class="form-control" type="text" name="first_name" placeholder="Enter your first name">
         </div>
         <div class="mb-3">
             <label class="form-label">Last name</label>
             <input class="form-control" type="text" name="last_name" placeholder="Enter your last name">
         </div>
         <div class="mb-3">  <label class="form-label">Email address</label>
             <input class="form-control" type="email" name="email" placeholder="Enter your email address">
         </div>
         <div class="mb-3">  <label class="form-label">Telephone</label>
             <input class="form-control" type="tel" name="phone_number" placeholder="Enter your phone number">
         </div>
     </div>
     <div class="signup-row">
         <div class="mb-3">  <label class="form-label">Password</label>
             <input class="form-control" type="password" name="password" placeholder="Password">
         </div>
         <div class="mb-3">   <label class="form-label">Confirm password</label>
             <input class="form-control" type="password" placeholder="Confirm password" name="confirmpassword">
         </div>
     </div>
     <div class="row"> <button class="btn btn-primary" type="submit">Create your account</button></div>
   </form>
 </div>
</div>
