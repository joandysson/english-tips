<?php

use App\Models\Category;
use App\Models\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase {


    /**
    public function setUp()
    {
        parent::setUp();
    }

    protected function setdown()
    {
        //
    }
    */

    public function testIndex() {
        $category = (new Category())::create([
            'name' => 'test',
            'code' => 2
        ]);

        $data = (new Product())::create([
            'name' => 'Product 1',
            'description' => 'Description 1',
            'sku' => 'sku 1',
            'quantity' => 1,
            'price' => '10.00',
        ]);

        print_r($data); exit;

        $this->assertTrue(true);
    }
}
