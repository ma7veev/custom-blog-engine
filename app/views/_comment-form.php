<form action="/submit-comment" method="POST">
   <input type="hidden" value="<?= $record[ 'id' ]; ?>" name="record_id">
   <div class="form-group">
      <label for="author_name">Ваше имя:</label>
      <input name="author_name" type="text" class="form-control">
   </div>
   <div class="form-group">
      <label for="text">Комментарий:</label>
      <input name="text" type="textarea" class="form-control">
   </div>
   <button class="btn btn-warning" type="submit">Отправить</button>
</form>