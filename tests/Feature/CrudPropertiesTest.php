<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Market;
use App\Country;

class CrudPropertiesTest extends TestCase
{
    
    use RefreshDatabase;

    /** @test */
    function user_can_submit_a_new_property() {

        $name = 'Example Property Name';

        $response = $this->post('/properties', [
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
        ]);

        $this->assertDatabaseHas('properties', [
            'name' => $name,
        ]);
        
        $response->assertStatus(201)
            ->assertJson(["name"=>$name]);

    }
    
    /** @test */
    function property_is_not_created_if_no_longitude() {
        $name = 'Example Property Name';

        $response = $this->post('/properties', [
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
        ]);

        $response->assertStatus(500);
    }

    /** @test */
    function property_is_created_if_no_second_address() {
        $name = 'Example Property Name';

        $response = $this->post('/properties', [
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
        ]);

        $response->assertStatus(201);
    }

    // /** @test */
    // function user_can_edit_an_existing_property() {}

    // /* @test */ 
    // function property_is_not_edited_if_validation_fails() {}

    // /** @test */
    // function error_if_property_doesnt_exist() {}

    // /** @test */
    // function user_can_view_sorted_property_list() {}


}
