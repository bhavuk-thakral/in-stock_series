<?php

namespace Tests\Feature;

use App\Stock;
use App\Product;
use App\Retailer;
use Tests\TestCase;
use RetailerWithProductSeeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TrackCommandTest extends TestCase
{
   
    use RefreshDatabase;
    function it_tracks_product_stock()
    {
       
        $this->seed(RetailerWithProductSeeder::class);

       
        $this->assertFalse(Product::first()->inStock());

        $this->assertFalse($switch->inStock());
        
        Http::fake(fn() => ['available' => true, 'price' => 29900]);

        

        $this->artisan('track')
            ->expectsOutput('All done!');

        $this->assertFalse($stock->in_stock);

        $this->assertTrue($stock->fresh()->in_stock);
       
    }
}