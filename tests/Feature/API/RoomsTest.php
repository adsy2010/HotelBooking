<?php


namespace Tests\Feature\API;


use Tests\TestCase;

class RoomsTest extends TestCase
{
    /*
     * Main Route Tests
     */
    private $baseUrl = '/api/rooms';

    public function testAPIRouteIndex()
    {
        $response = $this->get($this->baseUrl);

        $response->assertStatus(200);
    }

    public function testAPIRouteCreate()
    {
        $response = $this->post($this->baseUrl);

        $response->assertStatus(200);
    }

    public function testAPIRouteDelete()
    {
        $id = -1;
        $response = $this->delete($this->baseUrl.'/'.$id);

        $response->assertStatus(200);
    }

    public function testAPIRouteUpdate()
    {
        $id = -1;
        $response = $this->put($this->baseUrl.'/'.$id);

        $response->assertStatus(200);
    }

    public function testAPIRouteShow()
    {
        $id = -1;
        $response = $this->get($this->baseUrl.'/'.$id);

        $response->assertStatus(200);
    }

    /*
     * Test API functions
     */

    public function testAPI()
    {

        //INSERT INITIAL DATA
        $testData = [
            'premise' => 1,
            'roomType' => 2,
            'room' => '102',
        ];

        $testData2 = [
            'premise' => 2,
            'roomType' => 1,
            'room' => '202',
        ];

        $retrieveIndex = $this->json('get', $this->baseUrl);
        $createResponse = $this->json('post', $this->baseUrl, $testData);
        $id = $createResponse->json('data.id');
        $retrieveResponse1 = $this->json('get', $this->baseUrl.'/'.$id);
        $updateResponse = $this->json('put', $this->baseUrl.'/'.$id, $testData2);
        $retrieveResponse2 = $this->json('get', $this->baseUrl.'/'.$id);
        $deleteResponse = $this->json('delete', $this->baseUrl.'/'.$id);

        $retrieveIndex->assertJsonPath('status', 'ok');
        $createResponse->assertJsonPath('status', 'ok');
        $retrieveResponse1->assertJsonPath('status', 'ok');
        $retrieveResponse2->assertJsonPath('status', 'ok');
        $updateResponse->assertJsonPath('status', 'ok');
        $deleteResponse->assertJsonPath('status', 'ok');
        $deleteResponse->assertJsonPath('data', "{$id}");
    }
}
