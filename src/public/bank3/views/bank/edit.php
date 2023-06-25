<section>
  <div class="container-fluid hero d-flex flex-column align-items-center py-3">
    <h3 class="text-light text-center mt-5 py-3">Edit client data</h3>
    
    <form action="/bank/update/<?= $bank['id'] ?>" method="post">
      <div class="mb-3">
        <Label for="name"><span style="color: crimson;">*</span>Name</Label>
        <input type="text" name="name" id="name" class="form-control bg-transparent text-white" 
          value="<?= $bank['name']?>" required>
      </div>
      <div class="mb-3">
        <label for="surname"><span style="color: crimson;">*</span>Surname</label>
        <input type="text" name="surname" id="surname" class="form-control bg-transparent text-white" 
          value="<?= $bank['surname'] ?>" required>
      </div>
      <div class="mb-3">
        <label for="card-id"><span style="color: crimson;">*</span>Card ID</label>
        <input type="text" name="card-id" id="card-id" class="form-control bg-transparent text-white" 
          value="<?= $bank['card-id'] ?>" required>
      </div>
      <div class="mb-3">
        <label for="account-nr"><span style="color: crimson;">*</span>Account Number</label>
        <input type="text" name="account-nr" id="account-nr" class="form-control bg-transparent text-white" 
          value="<?= $bank['account-nr'] ?>" required>
      </div>
      <div class="mb-3">
        <label for="amount">Amount</label>
        <input type="number" name="amount" id="amount" class="form-control bg-transparent text-white" 
          value="<?= $bank['amount'] ?>">
          <p style="color: crimson; text-align: right;">* Required field</p>
      </div>
      <div>
        <button type="submit" class="btn btn-outline-success add" style="width: 100%"></button>
      </div>
    </form>

  </div>
</section>