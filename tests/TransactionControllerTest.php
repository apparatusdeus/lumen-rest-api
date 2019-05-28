<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use PHPUnit\Framework\Assert;

class TransactionControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_get_all_transactions()
    {
        $this->get('/api/v1/transaction');

        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                '*' => [
                    'name',
                    'cnp',
                    'updated_at',
                    'created_at',
                    'customerId'
                ]
            ]
        );
    }

    public function test_create_transaction()
    {
        $this->post('/api/v1/transaction', ['customerId' => 1, 'amount' => 135.00]);

        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                '*' => [
                    'name',
                    'cnp',
                    'updated_at',
                    'created_at',
                    'customerId'
                ]
            ]
        );
    }

    public function test_get_transaction()
    {
        $this->get('/api/v1/transaction/1');
        echo $this->response->content();

        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                '*' => [
                    'name',
                    'cnp',
                    'updated_at',
                    'created_at',
                    'customerId'
                ]
            ]
        );
    }
}
