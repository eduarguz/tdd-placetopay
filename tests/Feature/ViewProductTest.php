<?php

namespace Tests\Feature;

use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_see_the_product()
    {
        //Arrange
        // Crear Producto
        $product = Product::create([
            'title' => 'WIP Snapback Hat',
            'description' => 'You only need two Git commit messages: `init` and `wip`. Anything else is adding baggage to your team. It\'s controversial. It\'s an "antipattern". It\'s a way of life.',
            'image_url' => 'https://static-2.gumroad.com/res/gumroad/4086820334527/asset_previews/5345e2809b9d4fc4ec9a2d78f90ae5d1/retina/IMG_1921_20%281%29.JPG',
            'price' => '3500000',
            'store_name' => 'The Laravel Elithe Shop',
        ]);

        //Act
        // User visits the page
        $this->withoutExceptionHandling();
        $response = $this->get('products/'.$product->id);

        //Assert
        // See product name
        // See product title ...
        $response->assertSuccessful();
        $response->assertViewIs('products.show');
        $response->assertSee('WIP Snapback Hat');
        $response->assertSee(e('You only need two Git commit messages: `init` and `wip`. Anything else is adding baggage to your team. It\'s controversial. It\'s an "antipattern". It\'s a way of life.'));
        $response->assertSee('https://static-2.gumroad.com/res/gumroad/4086820334527/asset_previews/5345e2809b9d4fc4ec9a2d78f90ae5d1/retina/IMG_1921_20%281%29.JPG');
        $response->assertSee('$35.000 COP');
        $response->assertSee('The Laravel Elithe Shop');
    }
}
