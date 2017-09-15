<?php
namespace Common
{
    /**
     * Исключение, возникающее при попытке запустить уже запущенную транзакцию.
     */
    class TransactionStartedException extends TransactionException
    {
        /**
         * Создает экземпляр класса.
         *
         * @param ITransaction $transaction Транзакция, которая вызвала исключение.
         */
        public function __construct(ITransaction $transaction)
        {
            parent::__construct($transaction, 'Transaction is already started.');
        }
    }
}