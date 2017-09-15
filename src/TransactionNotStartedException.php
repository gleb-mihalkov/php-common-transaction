<?php
namespace Common
{
    /**
     * Исключение, возникающее при попытке завершить еще не запущенную транзакцию.
     */
    class TransactionNotStartedException extends TransactionException
    {
        /**
         * Создает экземпляр класса.
         *
         * @param ITransaction $transaction Транзакция, которая вызвала исключение.
         */
        public function __construct(ITransaction $transaction)
        {
            parent::__construct($transaction, 'Transaction is not started.');
        }
    }
}