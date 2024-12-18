
# Http Request

- library [guzzle](https://github.com/guzzle/guzzle)
- library [ext-curl]

## Restful API router/middle-ware

slim

- Optional segments can only occur at the end of a route:
- not ok `/{dbname}/[{tableName}]/[{id}]`,  
- ok ``/{dbname}/{tableName}/[{id}]``
- router is slash "/" sensitive

php native
