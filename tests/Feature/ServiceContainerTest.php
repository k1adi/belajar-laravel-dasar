<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use App\Data\Person;
use App\Services\HelloService;
use App\Services\HelloServiceIndonesia;
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

    public function test_instance()
    {
        $person = new Person("Rizki", "Adi");
        $this->app->instance(Person::class, $person);

        $person1 = $this->app->make(Person::class); // $person
        $person2 = $this->app->make(Person::class); // $person

        self::assertEquals("Rizki", $person1->firstname);
        self::assertEquals("Rizki", $person2->firstname);
        self::assertSame($person1, $person2);
    }

    public function test_dependency_injection()
    {
        $this->app->singleton(Foo::class, function($app) {
            return new Foo();
        });
        $this->app->singleton(Bar::class, function($app) {
            $foo = $app->make(Foo::class);
            return new Bar($foo);
        });

        $foo = $this->app->make(Foo::class);
        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        self::assertSame($bar1, $bar2);
    }

    public function test_interface_to_class()
    {
        // Kode tidak kompleks
        // $this->app->singleton(HelloService::class, HelloServiceIndonesia::class);

        // Jika kode lebih kompleks
        $this->app->singleton(HelloService::class, function ($app) {
            return new HelloServiceIndonesia();
        });

        $helloService = $this->app->make(HelloService::class);

        self::assertEquals('Halo Rizki', $helloService->hello('Rizki'));
    }
}
