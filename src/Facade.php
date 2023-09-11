<?php

namespace LaravelTrello;

final class Facade extends \Illuminate\Support\Facades\Facade {

    protected static function getFacadeAccessor(): string {

        return 'trello';

    } //end getFacadeAccessor()

} //end class
