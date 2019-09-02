## Notes
- `R::nuke();` [dialect:mysql] clear all tables but database remains
- `R::wipe($table);` [dialect:mysql] clear all row but table remains
- [table name restriction] only lowercase alpha-numeric is allowed in table name; `A-_` are not supported.
- [column restriction]
    - column name ending with `_id` is reserved and not allowed to use.
    - camelCased column will automatically convert to snake_case
    - primary key need to be "id" 
## sample
```php
$book = R::dispense("book");
$book->author = "Santa Claus";
$book->title = "Secrets of Christmas";
$id = R::store( $book );
```
