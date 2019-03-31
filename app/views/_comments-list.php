<?php if ( !empty($comments_list)): ?>
    <h4>Users comments:</h4>
    <?php foreach ($comments_list as $comment): ?>

   <blockquote class="blockquote">
      <p class="mb-0"><?= $comment[ 'text' ]; ?></p>
      <footer class="blockquote-footer"><?= $comment[ 'author_name' ]; ?></footer>
   </blockquote>
<?php endforeach; ?><?php endif; ?>
