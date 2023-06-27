<!-- NAV -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= URL ?>">:: Black Bank ::</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
              data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

        <?php if (isset($_SESSION['name'])) : ?>
          
          <li class="nav-item">
            <a class="nav-link" href="<?= URL . 'bank' ?>">Accounts</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="<?= URL . 'bank/create' ?>">Add Client</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="<?= URL . 'logout' ?>">Logout</a>  
            <?php else : ?>
            <a class="nav-link" href="<?= URL . 'login' ?>">Login</a>
            <?php endif ?>
          </li>

        </ul>
      </div>
  </div>
</nav>
