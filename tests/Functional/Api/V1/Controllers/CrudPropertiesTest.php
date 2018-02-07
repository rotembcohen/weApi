<?php

namespace App\Functional\Api\V1\Controllers;

use App\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Market;
use App\Country;
use App\User;
use App\Property;

class CrudPropertiesTest extends TestCase
{
    
    use DatabaseMigrations;

    private $token = null;

    public function setUp()
    {
        parent::setUp();

        $user = new User([
            'name' => 'Test User',
            'email' => 'test@email.com',
            'password' => '123456'
        ]);
        $user->save();

        $response = $this->post('api/auth/login', [
            'email' => 'test@email.com',
            'password' => '123456'
        ]);

        $response->assertStatus(200);

        $responseJSON = json_decode($response->getContent(), true);
        $this->token = $responseJSON['token'];

    }

    /** @test */
    function user_can_submit_a_new_property() {

        $name = 'Example Property Name';

        $response = $this->post('/api/properties', [
            "name" => $name,
            "desks" => 2373,
            "Sf" => 384619,
            "address1" => "666 Fifth Ave",
            "address2" => "Suite 556",
            "city" => "New York",
            "state" => "NY",
            "postalCode" => "10005",
            "latitude" => "-10.705337",
            "longitude" => "-146.536668",
            "countryId" => 1,
            "regionalCategory" => 76,
            "marketId" => 1,
            "submarketId" => 15,
            "locationId" => 99,
        ], [
            'Authorization' => 'Bearer ' . $this->token
        ]);

        // fwrite(STDOUT,print_r($response->content()));

        $this->assertDatabaseHas('properties', [
            'name' => $name,
        ]);
        
        $response->assertStatus(201)
            ->assertJson(["name"=>$name]);

    }
    
    /** @test */
    function property_is_not_created_if_no_longitude() {
        $name = 'Example Property Name';

        $response = $this->post('/api/properties', [
            "name" => $name,
            "desks" => 2373,
            "Sf" => 384619,
            "address1" => "666 Fifth Ave",
            "address2" => "Suite 556",
            "city" => "New York",
            "state" => "NY",
            "postalCode" => "10005",
            "latitude" => "-10.705337",
            "countryId" => 1,
            "regionalCategory" => 76,
            "marketId" => 1,
            "submarketId" => 15,
            "locationId" => 99,
        ],[
            'Authorization' => 'Bearer ' . $this->token
        ]);

        $response->assertStatus(500);
    }

    /** @test */
    function property_is_created_if_no_second_address() {
        $name = 'Example Property Name';

        $response = $this->post('/api/properties', [
            "name" => $name,
            "desks" => 2373,
            "Sf" => 384619,
            "address1" => "666 Fifth Ave",
            "city" => "New York",
            "state" => "NY",
            "postalCode" => "10005",
            "latitude" => "-10.705337",
            "longitude" => "-146.536668",
            "countryId" => 1,
            "regionalCategory" => 76,
            "marketId" => 1,
            "submarketId" => 15,
            "locationId" => 99,
        ],[
            'Authorization' => 'Bearer ' . $this->token
        ]);

        $response->assertStatus(201);
    }

    /** @test */
    function user_can_edit_an_existing_property() {
        
        $newName = "updated property name";

        $propertyIds = Property::all()->pluck('id')->toArray();
        $randomId = $propertyIds[mt_rand(0, count($propertyIds) - 1)];

        $response = $this->put('/api/properties/'.$randomId, [
            "name" => $newName,
        ],[
            'Authorization' => 'Bearer ' . $this->token
        ]);

        $response->assertStatus(200)->assertSee($newName);

    }

    /** @test */ 
    function property_is_not_edited_if_validation_fails() {
        
        $propertyIds = Property::all()->pluck('id')->toArray();
        $randomId = $propertyIds[mt_rand(0, count($propertyIds) - 1)];

        $response = $this->put('/api/properties/'.$randomId, [
            "name" => null
        ],[
            'Authorization' => 'Bearer ' . $this->token
        ]);

        $response->assertStatus(500);        
    }

    /** @test */
    function property_that_doesnt_exist_cannot_be_viewed() {

        $propertiesCount = Property::count();
        $overflowId = $propertiesCount + 1;

        $response = $this->get('/api/properties/'.$overflowId, [],[
            'Authorization' => 'Bearer ' . $this->token
        ]);

        $response->assertStatus(401);
        
    }

}
