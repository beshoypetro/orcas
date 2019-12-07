<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Requests;

class RequestsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_requests()
    {
        $requests = factory(Requests::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/requests', $requests
        );

        $this->assertApiResponse($requests);
    }

    /**
     * @test
     */
    public function test_read_requests()
    {
        $requests = factory(Requests::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/requests/'.$requests->id
        );

        $this->assertApiResponse($requests->toArray());
    }

    /**
     * @test
     */
    public function test_update_requests()
    {
        $requests = factory(Requests::class)->create();
        $editedRequests = factory(Requests::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/requests/'.$requests->id,
            $editedRequests
        );

        $this->assertApiResponse($editedRequests);
    }

    /**
     * @test
     */
    public function test_delete_requests()
    {
        $requests = factory(Requests::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/requests/'.$requests->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/requests/'.$requests->id
        );

        $this->response->assertStatus(404);
    }
}
