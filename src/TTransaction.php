<?php
namespace Common
{
    /**
     * Типаж, обеспечивающий правильную очередность выполнения методов транзакции.
     */
    trait TTransaction
    {
        /**
         * Показывает, запущена ли транзакция в данный момент.
         *
         * @var bool
         */
        private $_isStarted = false;

        /**
         * Показывает, отменена ли транзакция.
         *
         * @var bool
         */
        private $_isRollbacked = false;

        /**
         * Показывает, подтверждена ли транзакция.
         *
         * @var bool
         */
        private $_isCommitted = false;

        /**
         * Показывает, запущена ли транзакция.
         *
         * @return bool Да или нет.
         */
        public function isStarted()
        {
            return $this->_isStarted;
        }

        /**
         * Показывает, отменена ли транзакция.
         *
         * @return bool Да или нет.
         */
        public function isRollbacked()
        {
            return $this->_isRollbacked;
        }

        *
         * Показывает, подтверждена ли транзакция.
         *
         * @return bool Да или нет.
         
        public function isCommitted()
        {
            return $this->_isCommitted;
        }

        /**
         * Показывает, завершена ли транзакция.
         *
         * @return bool Да или нет.
         */
        public function isFinished()
        {
            return $this->isCommitted() || $this->isRollbacked();
        }



        /**
         * Запускает транзакцию.
         *
         * @return void
         */
        public function start()
        {
            if ($this->isFinished())
            {
                throw new TransactionFinishedException($this);
            }

            if ($this->isStarted())
            {
                throw new TransactionStartedException($this);
            }

            $this->_isStarted = true;
            $this->_start();
        }

        /**
         * Запускает транзакцию. Виртуальный метод.
         *
         * @return void
         */
        protected function _start() {}

        /**
         * Отменяет транзакцию.
         *
         * @return void
         */
        public function rollback()
        {
            if ($this->isFinished())
            {
                throw new TransactionFinishedException($this);
            }

            if (!$this->isStarted())
            {
                throw new TransactionNotStartedException($this); 
            }

            $this->_isRollbacked = true;
            $this->_rollback();
        }

        /**
         * Отменяет транзакцию. Виртуальный метод.
         *
         * @return void
         */
        protected function _rollback() {}

        /**
         * Подтверждает транзакцию.
         *
         * @return void
         */
        public function commit()
        {
            if ($this->isFinished())
            {
                throw new TransactionFinishedException($this);
            }

            if (!$this->isStarted())
            {
                throw new TransactionNotStartedException($this);
            }

            $this->_isCommitted = true;
            $this->_commit();
        }

        /**
         * Подтверждает транзакцию. Виртуальный метод.
         *
         * @return void
         */
        protected function _commit() {}
    }
}