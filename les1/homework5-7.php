<?php
// Задание 5

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();

// Х статичен по отношению к классу, и каждый новый экземпляр увеличивает значение

echo PHP_EOL;

// Задание 6

class A2 {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B2 extends A2 {
}
$a1 = new A2();
$b1 = new B2();
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();

// возможно потому что при наследование, наследуется статичность по отношению к новому классу, т.е. дочерний B2 получает свою статичную Х по отношениею к нему

echo PHP_EOL;

class A3 {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B3 extends A3 {
}
$a1 = new A3;
$b1 = new B3;
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();

// эм...тоже что и в предыдущем случае, отсутствуют скобки с аргументами?
