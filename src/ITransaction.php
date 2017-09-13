<?php
namespace Common
{
    /**
     * Транзакция.
     *
     * @package Common
     */
    interface ITransaction
    {
        /**
         * Запускает транзакцию.
         *
         * @return void
         */
        public function start();

        /**
         * Подтверждает изменения после успешного окончания транзакции.
         *
         * @return void
         */
        public function commit();

        /**
         * Отменяет изменения, если во время транзакции произошла ошибка.
         *
         * @return void
         */
        public function rollback();
    }
}