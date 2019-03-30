test view
   <div class="row mb-2">
       <?php foreach ($records as $record): ?>
      <div class="col-md-6">
         <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
               <strong class="d-inline-block mb-2 text-primary"><?= $record['author_name']; ?></strong>
               <h3 class="mb-0">
                  <a class="text-dark" href="#"><?= $record['title']; ?></a>
               </h3>
               <div class="mb-1 text-muted">Nov 12</div>
              
               <p class="card-text mb-auto"><?= $record['text']; ?></p>
               <a href="/view-record?id=<?= $record['id']; ?>">Continue reading</a>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block"
                 data-src="holder.js/200x250?theme=thumb"
                 alt="Card image cap">
         </div>
      </div>
       <?php endforeach; ?>
   </div>
