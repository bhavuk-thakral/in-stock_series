<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TrackCommandTest extends TestCase
{
    use RefreshDatabase;

    function it_tracks_product_stock()
    {

        $switch = Product::create(['name' => 'Nintendo Switch']);

        $bestBuy = Retailer::create(['name' => 'Best Buy']);

        $this->assertFalse($switch->inStock());

        $stock = new Stock([
            'price' => 10000,
            'url' => 'http://foo.com',
            'sku' => '12345',
            'in_stock' => false
        ]);

        $bestBuy->addStock($switch, $stock);

        $this->assertFalse($stock->fresh()->in_stock);

        Http::fake(function() {
            return ['foo' => 'bar'];
        });
        
        $this->artisan('track');

        

        $this->assertTrue($stock->fresh()->in_stock);

    }

}
