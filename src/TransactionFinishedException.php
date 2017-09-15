<?php
namespace Common
{
    /**
     * Исключение, возникающее при попытке запустить или завершить уже завершенную транзакцию.
     */
    class TransactionFinishedException extends TransactionException
    {
        /**
         * Создает экземпляр класса.
         *
         * @param ITransaction $transaction Транзакция, которая вызвала исключение.
         */
        public function __construct(ITransaction $transaction)
        {
            parent::__construct($transaction, 'Transaction is already finished.');
        }
    }
}