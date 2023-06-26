<section>
  <div class="container-fluid hero d-flex flex-column align-items-center py-3">
    <h3 class="text-light text-center mt-5 py-3">Create new client</h3>
    
    <form action="/bank/store" method="post">
      <div class="mb-3">
        <input type="text" name="name" id="name" class="form-control bg-transparent text-white" 
          placeholder="* name" required>
      </div>
      <div class="mb-3">
        <input type="text" name="surname" id="surname" class="form-control bg-transparent text-white" 
          placeholder="* surname" required>
      </div>
      <div class="mb-3">
        <input type="text" name="card-id" id="card-id" class="form-control bg-transparent text-white" 
          placeholder="* card id" required>
      </div>
      <div class="mb-3">
        <input type="text" name="account-nr" id="account-nr" class="form-control bg-transparent text-white" 
          placeholder="* account number" required>
        <p style="color: crimson; text-align: right;">* Required field</p>
      </div>
      <div>
        <button type="submit" class="btn btn-outline-success add" style="width: 100%"></button>
      </div>
    </form>

  </div>
</section>