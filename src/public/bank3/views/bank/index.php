<?php
usort($banks, function($a, $b) {
  return strcmp($a['surname'], $b['surname']);
});
?>

<section>
  <div class="container-fluid hero d-flex flex-column align-items-center py-3 gradient-custom">
    <h3 class="text-light text-center mt-5 py-3">Accounts</h3>
    
    <table class="table table-dark table-sm table-transparent">
      
      <thead>
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>SURNAME</th>
          <th>CARD ID</th>
          <th>ACCOUNT NR</th>
          <th>AMOUNT, EUR</th>
          <!-- <th style="text-align: center;">ADD EUR</th> -->
          <!-- <th style="text-align: center;">TAKE OUT EUR</th> -->
          <!-- <th style="text-align: center;">DEL. ACC.</th> -->
          <th></th>
          <th></th>
        </tr>
      </thead>
      
      <tbody>
        <?php if (empty($banks)) : ?>
          <p style="color: crimson;">No Accounts found</p>
          <?php else: ?>
            <?php foreach ($banks as $bank) : ?>
              <tr>
                <td><?= $bank['id'] ?></td>
                <td><?= $bank['name'] ?></td>
                <td><?= $bank['surname'] ?></td>
                <td><?= $bank['card-id'] ?></td>
                <td><?= $bank['account-nr'] ?></td>
                <td><?= $bank['amount']?></td>
                <td>
                  <div class="text-center">
                    <button type="button" class="btn btn-outline-success edit"
                      onclick="window.location.href='/bank/edit/<?= $bank['id'] ?>'"></button>
                  </div>
                </td>
                <td>
                  <div class="text-center">
                    <button type="button" class="btn btn-outline-danger delete"
                      onclick="window.location.href='/bank/delete/<?= $bank['id'] ?>'"
                      <?= ($bank['amount'] > 0) ? 'disabled' : ''?>></button>
                  </div>
                </td>
              </tr>
            <?php endforeach ?>
        <?php endif ?>
      </tbody>

    </table>

    <button type="button" class="btn btn-outline-danger">Support</button>
  </div>
</section>