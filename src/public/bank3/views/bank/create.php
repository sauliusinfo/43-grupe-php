<section>
  <div class="container-fluid hero d-flex flex-column align-items-center py-3 gradient-custom">
    <h3 class="text-light text-center mt-5 py-3">Create new client</h3>
    
    <form action="/bank/store" method="post">
      <div class="mb-3">
        <input type="text" name="name" id="name" class="form-control bg-transparent text-white" 
          placeholder="* name" value="<?= $old['name'] ?? '' ?>" required>
      </div>
      <div class="mb-3">
        <input type="text" name="surname" id="surname" class="form-control bg-transparent text-white" 
          placeholder="* surname" value="<?= $old['surname'] ?? '' ?>" required>
      </div>
      <div class="mb-3">
        <input type="text" name="card-id" id="card-id" class="form-control bg-transparent text-white" 
          placeholder="* card id" value="<?= $old['card-id'] ?? '' ?>" required>
          <p style="color: crimson; text-align: right;">* Required field</p>
      </div>
      <div>
        <button type="submit" class="btn btn-outline-success add" style="width: 100%"></button>
      </div>
    </form>

  </div>
</section>