# php-utils
[![Build Status](https://travis-ci.com/davidkhala/php-utils.svg?branch=master)](https://travis-ci.com/davidkhala/php-utils)



## Code style
- Standard: PSR(PHP Standard Recommendations) [PSR中文规范](https://www.kancloud.cn/thinkphp/php-fig-psr/3139)
- Tools: VSCode extension [phpfmt](https://marketplace.visualstudio.com/items?itemName=kokororin.vscode-phpfmt)
- package manager tool: use [composer] insteadof [PEAR] because of deprecated
- ORM: use [redbean](https://github.com/gabordemooij/redbean) instead of [doctrine/orm](https://github.com/doctrine/orm/) 

## CICD
- TravisCI
    - Currently Travis CI does not support mod_php for Apache
    - `script` section default to run `phpunit`