# Интерфейс "Транзакция"

Интерфейс, объявляющий паттерн транзакции. *Транзакция* - это операция, которая должна быть выполнена только полностью. Если произошла ошибка, изменения, внесенные во время транзакции, должны быть отменены. Библиотека является частью пакета [php-common](#).

* [Документация](https://gleb-mihalkov.github.io/php-common-transaction/)

## Использование

```php
require 'vendor/autoload.php';
use Common\ITransaction;

class MyTransaction implements ITransaction
{
    // Начинает транзакцию.
    public function start() {}
    
    // Подтверждает изменения при успешном завершении транзакции.
    public function commit() {}
    
    // Отменяет изменения, если транзация завершилась неудачно.
    public function rollback() {}
}
```