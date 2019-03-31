<div class="blog-post">
   <h2 class="blog-post-title text-center"><?= $record[ 'title' ]; ?></h2>
   <p class="blog-post-meta font-italic"><?= $record[ 'created_at' ]; ?> by
      <span class="font-weight-bold"> <?= $record[ 'author_name' ]; ?></span>
   </p>
    <?= $record[ 'text' ]; ?>
</div>
<?php if ( !empty($comments_list)): ?>
<h2 class="mt-3">Comments</h2>
<?php else: ?>
   <div class="alert alert-info mt-4" role="alert">
      <p>There is no comments yet. You can add one with submitting form below.</p>
   </div>
   
<?php endif; ?>
<h4 class="mt-3">Add comment:</h4>
<div class="mt-3">
   <?php require_once ('_comment-form.php'); ?>
</div>
<div class="mt-5">
   <?php require_once ('_comments-list.php'); ?>
</div>