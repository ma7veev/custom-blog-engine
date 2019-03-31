<form action="/submit-record" method="POST">
   <div class="form-group">
      <label for="author_name">Ваше имя:</label>
      <input name="author_name" type="text" class="form-control">
   </div>
   <div class="form-group">
      <label for="title">Тема заметки:</label>
      <input name="title" type="textarea" class="form-control">
   </div>
   <div class="form-group">
      <label for="text">Текст:</label>
      <textarea name="text"  class="form-control"></textarea>
   </div>
   <button class="btn btn-warning" type="submit">Отправить</button>
</form>