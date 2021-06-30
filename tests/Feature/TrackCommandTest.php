<?php

namespace Tests\Feature;


use App\Product;
use RetailerWithProductSeeder;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\RefreshDatabase;


class TrackCommandTest extends TestCase
{
    use RefreshDatabase;

    function it_tracks_product_stock()
    {

        // $switch = Product::create(['name' => 'Nintendo Switch']);

        // $bestBuy = Retailer::create(['name' => 'Best Buy']);

        // $this->assertFalse($switch->inStock());

        // $stock = new Stock([
        //     'price' => 10000,
        //     'url' => 'http://foo.com',
        //     'sku' => '12345',
        //     'in_stock' => false
        // ]);

        // $bestBuy->addStock($switch, $stock);

        // $this->assertFalse($stock->fresh()->in_stock);
        $this->seed(RetailerWithProduct::class);

        Http::fake(fn()=>[ 'available' => true,'price'=>29900]);

        $this->artisan('track');

        $this->assertTrue($stock->fresh()->in_stock);

    }

}
