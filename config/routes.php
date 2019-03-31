<?php
    return [
          'index'          => 'RecordsController@last',
          '/'              => 'RecordsController@last',
          'view-record'    => 'RecordsController@viewOne',
          'add-record'     => 'RecordsController@addNew',
          'submit-record'  => 'RecordsController@submitNew',
         // 'add-comment'    => 'CommentsController@addNew',
          'submit-comment' => 'CommentsController@submitNew',
    ];