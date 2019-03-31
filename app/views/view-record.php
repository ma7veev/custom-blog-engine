<div class="blog-post">
   <h2 class="blog-post-title text-center"><?= $record[ 'title' ]; ?></h2>
   <p class="blog-post-meta font-italic"><?= $record[ 'created_at' ]; ?> by
      <span class="font-weight-bold"> <?= $record[ 'author_name' ]; ?></span>
   </p>
    <?= $record[ 'text' ]; ?>
</div>
<?php if ( !empty($comments_list)): ?>
   <hr>
<h3 class="mt-3">Comments</h3>
<?php else: ?>
   <div class="alert alert-info mt-4" role="alert">
      <p>There is no comments yet. You can add one with submitting form below.</p>
   </div>
   
<?php endif; ?>
<h5 class="mt-3">Add a comment:</h5>
<div class="mt-3">
   <?php require_once ('_comment-form.php'); ?>
</div>
<div class="mt-5">
   <?php require_once ('_comments-list.php'); ?>
</div>