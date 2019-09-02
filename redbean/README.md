## Notes
- `R::nuke();` [dialect:mysql] clear all tables but database remains
- `R::wipe($table);` [dialect:mysql] clear all row but table remains

## sample
```php
$book = R::dispense("book");
$book->author = "Santa Claus";
$book->title = "Secrets of Christmas";
$id = R::store( $book );
```
