<?php


namespace app\tests;

use app\models\entities\Product;
use PHPUnit\Framework\TestCase;

class ProviderProductTest extends TestCase
    /**
     * @dataProvider providerConstructor
     */
{
    public function testProduct($somename, $somedesc) {
        $product = new Product($somename, $somedesc, 55);
        $this->assertEquals($somename, $product->name);
        $this->assertEquals($somedesc, $product->description);

    }

    public function providerConstructor($somename){
        return [
            ['Чай', 'Цейлонский'],
            [15, 16],
            [false, true]
        ];
    }

}