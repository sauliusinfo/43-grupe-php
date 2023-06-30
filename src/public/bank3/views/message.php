<?php use Bank3\Messages; ?>

<?php if (Messages::ifMessages()) : ?>
  <?php foreach (Messages::getMessages() as $message) : ?>
    <div class="alert alert-<?= $message['type'] ?>" role="alert">
        <?= $message['message'] ?>
    </div>
  <?php endforeach ?>
<?php endif ?>