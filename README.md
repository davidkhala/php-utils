# php-utils
[![Build Status](https://travis-ci.com/davidkhala/php-utils.svg?branch=master)](https://travis-ci.com/davidkhala/php-utils)

## 

## Code style
- Standard: PSR(PHP Standard Recommendations) [PSR中文规范](https://www.kancloud.cn/thinkphp/php-fig-psr/3139)
- Tools: VSCode extension [phpfmt](https://marketplace.visualstudio.com/items?itemName=kokororin.vscode-phpfmt)
- package manager tool: use [composer] insteadof [PEAR] because of deprecated
- ORM: use [redbean](https://github.com/gabordemooij/redbean) instead of [doctrine/orm](https://github.com/doctrine/orm/) 
- Restful API Router and middle-ware: [slim] or php native
    - slim
        - Optional segments can only occur at the end of a route:   
            - not ok `/{dbname}/[{tableName}]/[{id}]`,  
            - ok ``/{dbname}/{tableName}/[{id}]``
        - router is slash "/" sensitive
- Request to remote service: [guzzle](https://github.com/guzzle/guzzle) or [php-curl]
    - guzzle dependencies:
    ```php
    guzzlehttp/psr7 suggests installing zendframework/zend-httphandlerrunner (Emit PSR-7 responses)
    guzzlehttp/guzzle suggests installing psr/log (Required for using the Log middleware)
    ```

  
## CICD
- TravisCI
    - Currently Travis CI does not support mod_php for Apache
    - `script` section default to run `phpunit`