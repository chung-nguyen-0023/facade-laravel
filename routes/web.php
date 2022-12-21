<?php
class Duck
{
    public function swim()
    {
        return 'swimming';
    }

    public function eat()
    {
        return 'eating';
    }
}

class Car {
    public function drive()
    {
        return 'driving';
    }
}

app()->bind('duck', function () {
    return new Duck;
});

app()->bind('car', function() {
    return new Car;
});

class Facade {
    public static function __callStatic($name, $arguments)
    {
        return app()->make(static::getFacadeAccessor())->$name();
    }
}

class DuckFacade extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'duck';
    }
}

class CarFacade extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'car';
    }
}

dd(DuckFacade::swim());
