<?php

namespace App\Entity;

#use App\Entity\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * @dataProvider pricesForFoodProduct
     */
    public function testcomputeTVAFoodProduct($product, $price, $expected)
    {
        $product = new Product($product, Product::FOOD_PRODUCT, $price);

        $this->assertSame($expected, $product->computeTVA());
    }
    public function pricesForFoodProduct()
    {
        return [
            ['Fromage',0, 0.0],
            ['Fromage',20, 1.1],
            ['Fromage',100, 5.5]
        ];
    }
    public function testcomputeTVAOtherProduct()
    {
        $product = new Product('Moule à gaufre', Product::OTHER_PRODUCT, 25);

        $this->assertSame(4.9, $product->computeTVA());
    }
    public function testNegativePriceComputeTVA()
    {
        $product = new Product('Fromage', Product::FOOD_PRODUCT, -20);

        $this->expectException('LogicException');

        $product->computeTVA();
    }
}
