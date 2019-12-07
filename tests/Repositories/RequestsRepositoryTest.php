<?php namespace Tests\Repositories;

use App\Models\Requests;
use App\Repositories\RequestsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class RequestsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var RequestsRepository
     */
    protected $requestsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->requestsRepo = \App::make(RequestsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_requests()
    {
        $requests = factory(Requests::class)->make()->toArray();

        $createdRequests = $this->requestsRepo->create($requests);

        $createdRequests = $createdRequests->toArray();
        $this->assertArrayHasKey('id', $createdRequests);
        $this->assertNotNull($createdRequests['id'], 'Created Requests must have id specified');
        $this->assertNotNull(Requests::find($createdRequests['id']), 'Requests with given id must be in DB');
        $this->assertModelData($requests, $createdRequests);
    }

    /**
     * @test read
     */
    public function test_read_requests()
    {
        $requests = factory(Requests::class)->create();

        $dbRequests = $this->requestsRepo->find($requests->id);

        $dbRequests = $dbRequests->toArray();
        $this->assertModelData($requests->toArray(), $dbRequests);
    }

    /**
     * @test update
     */
    public function test_update_requests()
    {
        $requests = factory(Requests::class)->create();
        $fakeRequests = factory(Requests::class)->make()->toArray();

        $updatedRequests = $this->requestsRepo->update($fakeRequests, $requests->id);

        $this->assertModelData($fakeRequests, $updatedRequests->toArray());
        $dbRequests = $this->requestsRepo->find($requests->id);
        $this->assertModelData($fakeRequests, $dbRequests->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_requests()
    {
        $requests = factory(Requests::class)->create();

        $resp = $this->requestsRepo->delete($requests->id);

        $this->assertTrue($resp);
        $this->assertNull(Requests::find($requests->id), 'Requests should not exist in DB');
    }
}
