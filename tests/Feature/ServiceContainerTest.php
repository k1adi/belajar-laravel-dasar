<?php

namespace Tests\Feature;

use App\Data\Foo;
use App\Data\Person;
use Tests\TestCase;

class ServiceContainerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        // Dependency injection with service container
        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        self::assertEquals('Foo', $foo1->foo());
        self::assertEquals('Foo', $foo2->foo());
        self::assertNotSame($foo1, $foo2);
    }

    public function test_bind()
    {
        // $person = $this->app->make(Person::class);
        // self::assertNotNull($person);

        // method bind(key, closure)
        // key = Object / class
        // closure = Nested function (declration function inside function)
        $this->app->bind(Person::class, function($app) {
            return new Person("Rizki", "Adi"); // Create new object
        });

        // Ketika menjalankan make maka closure akan otomatis di panggil
        $person1 = $this->app->make(Person::class); //closure() -> new Person("Rizki", "Adi");
        $person2 = $this->app->make(Person::class); //closure() -> new Person("Rizki", "Adi");

        self::assertEquals("Rizki", $person1->firstname);
        self::assertEquals("Rizki", $person2->firstname);
        self::assertNotSame($person1, $person2);
    }

    public function test_singleton()
    {
        // method singleton(bind, closure)
        // cara membuat object baru beserta cara pembuatannya
        $this->app->singleton(Person::class, function($app) {
            return new Person("Rizki", "Adi"); // Create one object
        });

        // Ketika menjalankan make maka closure akan otomatis di panggil
        $person1 = $this->app->make(Person::class); // new Person("Rizki", "Adi"); if not exists
        $person2 = $this->app->make(Person::class); // return existing object

        self::assertEquals("Rizki", $person1->firstname);
        self::assertEquals("Rizki", $person2->firstname);
        self::assertSame($person1, $person2);
    }
}
