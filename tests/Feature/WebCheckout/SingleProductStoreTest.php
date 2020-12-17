<?php

namespace Tests\Feature\WebCheckout;

use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SingleProductStoreTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_see_the_single_product()
    {
        $product = factory(Product::class)->create();

        $response = $this->get(route('product.index'));

        $response->assertOk()
            ->assertSee($product);
    }
}
