<?php
namespace Common
{
    use LogicException;

    /**
     * Исключение при неправильном использовании транзакции.
     */
    class TransactionException extends LogicException
    {
        /**
         * Транзакция, которая вызвала исключение.
         *
         * @var ITransaction
         */
        private $_transaction;

        /**
         * Получает транзакцию, во время которой возникло исключение.
         *
         * @return ITransaction Транзакция.
         */
        public function getTransaction()
        {
            return $this->_transaction;
        }

        /**
         * Создает экземпляр класса.
         *
         * @param ITransaction $transaction Транзакция, которая вызвала исключение.
         * @param string       $message     Сообщение об ошибке.
         */
        public function __construct(ITransaction $transaction, string $message)
        {
            parent::__construct($message);
            $this->_transaction = $transaction;
        }
    }
}