# Интерфейс "Транзакция"

Интерфейс, объявляющий паттерн транзакции. *Транзакция* - это операция, которая должна быть выполнена только полностью. Если произошла ошибка, изменения, внесенные во время транзакции, должны быть отменены. Библиотека является частью пакета [php-common](https://github.com/gleb-mihalkov/php-common).

* [Документация](https://gleb-mihalkov.github.io/php-common-transaction/)

## Использование

Если вы хотите просто пометить класс как транзакцию, то реализуйте интерфейс `ITransaction`:

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

Но мы настойчиво рекомендуем добавлять типаж `TTransaction`, который запрещает использование методов транзакции в неверном порядке:

```php
require 'vendor/autoload.php';
use Common\ITransaction;
use Common\TTransaction;

class MyTransaction implements ITransaction
{
    // Начинает транзакцию.
    protected function _start() { echo 'Start'.PHP_EOL; }
    
    // Подтверждает изменения при успешном завершении транзакции.
    protected function _commit() { echo 'Commit'.PHP_EOL; }
    
    // Отменяет изменения, если транзация завершилась неудачно.
    protected function _rollback() { echo 'Rollback'.PHP_EOL; }
}

$trans = new MyTransaction();
$trans->start(); // >_ Start
$trans->commit(); // >_ Commit
$trans->rollback(); // Exception!
```