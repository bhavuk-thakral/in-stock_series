<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /** @test */


    public function it_checks_stocks_for_product_at_retailers()
    {
        $switch=Project::create(['name'=>'Nintendo Switch']);

        $bestbuy=Retailer::create(['name'=>'Best Buy']);

        $switch->instock();
        $bestbuy->havestock();

    }
}
