<style>
  .alert {
    position: absolute;
    margin: 75px 15px;
  }
  .alert-success {
    background: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
  }
  .alert-danger {
    background: #f8d7da;
    border-color: #f5c6cb;
    color: #721c24;
  }
</style>

<?php use Bank3\Messages; ?>

<?php if (Messages::ifMessages()) : ?>
  <?php foreach (Messages::getMessages() as $message) : ?>
    <div class="alert alert-<?= $message['type'] ?>" role="alert">
        <?= $message['message'] ?>
    </div>
  <?php endforeach ?>
<?php endif ?>