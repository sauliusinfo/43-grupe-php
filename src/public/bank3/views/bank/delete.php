<section>
  <div class="container-fluid hero d-flex flex-column align-items-center py-3">
    <h3 class="text-light text-center mt-5 py-3">Are you sure you want to delete this account?</h3>
    
    <form action="/bank/destroy/<?= $bank['id'] ?>" method="post">
      <div class="mb-3">
        <Label for="name">Name</Label>
        <input type="text" name="name" id="name" class="form-control bg-transparent text-white" 
          value="<?= $bank['name']?>" readonly>
      </div>
      <div class="mb-3">
        <label for="surname">Surname</label>
        <input type="text" name="surname" id="surname" class="form-control bg-transparent text-white" 
          value="<?= $bank['surname'] ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="card-id">Card ID</label>
        <input type="text" name="card-id" id="card-id" class="form-control bg-transparent text-white" 
          value="<?= $bank['card-id'] ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="account-nr">Account Number</label>
        <input type="text" name="account-nr" id="account-nr" class="form-control bg-transparent text-white" 
          value="<?= $bank['account-nr'] ?>" readonly>
      </div>
      <div class="mb-3">
        <button type="button" class="btn btn-outline-success" style="width: 100%"
          onclick="window.location.href='/bank'">No</button>
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-outline-danger" style="width: 100%">Yes</button>
      </div>
    </form>

  </div>
</section>