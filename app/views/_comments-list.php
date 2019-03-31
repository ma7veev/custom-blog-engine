<?php if ( !empty($comments_list)): ?>
   <hr>
    <h5>Users comments:</h5>
    <?php foreach ($comments_list as $comment): ?>

   <blockquote class="blockquote">
      <p class="mb-0"><?= $comment[ 'text' ]; ?></p>
      <footer class="blockquote-footer"><?= $comment[ 'author_name' ]; ?></footer>
   </blockquote>
<?php endforeach; ?><?php endif; ?>
