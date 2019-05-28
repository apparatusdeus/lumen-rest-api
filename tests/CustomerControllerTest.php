<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use PHPUnit\Framework\Assert;

class CustomerControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_get_all_customers()
    {
        $this->get('/api/v1/customer');

        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                '*' => [
                    'name',
                    'cnp',
                    'updated_at',
                    'created_at',
                    'id'
                ]
            ]
        );
    }

    public function test_create_customer()
    {
        $this->post('/api/v1/customer', ['name' => 'James', 'cnp' => 'Something']);

        $this->seeStatusCode(200);

        $json = json_decode('{' . explode('{', $this->response->content())[1], true);

        $this->seeJsonStructure(
            [
                'name',
                'cnp',
                'updated_at',
                'created_at',
                'id'
            ],
            $json
        );
    }

    public function test_get_customer()
    {
        $this->get('/api/v1/customer/1');

        $json = json_decode('{' . explode('{', $this->response->content())[1], true);

        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                'name',
                'cnp',
                'updated_at',
                'created_at',
                'id'
            ],
            $json
        );
    }
}
