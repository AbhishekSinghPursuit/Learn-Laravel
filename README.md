<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<!-- <p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p> -->

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## What I have learned today?

### Routing without Controllers
```php
File: /routes/web.php

<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/test/{name}/{id?}', function ($name, $id=null){ // here id is optional
    // echo "Hello Engineers...";
    // echo "Hello... ".$name." ".$id; // display parameters on the url /test/

    $html_string = "<h1>HTML</h1>";
    $data = compact('name', 'id', 'html_string'); // compact parameters in data
    return view('test')->with($data);  // send data to test blade template
});

Route::post('/demo', function (){
    echo "Testing the routes for post";
});

Route::any('/any', function(){
    echo "Testing the route using any";
});

Route::put('user/{id}', function (){

});

```

### Blade Templates Components
```html
File: /resources/views/test.blade.php

<body>
    <h1>
        Using laravel...
    </h1>
    <h1>
        Data comming from URL /test/ parameters through get method
    </h1>
    <!-- default value is "Engineer"  -->
    <h2> Name: {{$name ?? "Engineer"}}</h2>
    
    <h2> Id: {{$id}}</h2>
    <h2> Time: {{date('H:i:s', time())}}</h2>
    <h2> Date: {{date('d-m-Y')}}</h2>

    <!-- also print executed html strings -->
    <p>{!! $html_string !!}</p>

    <!-- if-else in blade  -->
     <p>
    @if($id=="1")
        {{"Id is correct!"}}
    @elseif($id !="")
        {{"Id is not empty!"}}
    @else 
        {{ "Id is empty!"}}
    @endif
    </p>

    <!-- execute only condition is false -->
     <p>
    @unless($id=="1")
        {{"Id is not 1"}}
    @endunless
    </p>

    <!-- if variable is set then execute  -->
     @isset($id)
        {{$id." id is set!"}}
    @endisset

    <!-- for loop in laravel  -->
     <br>
     @for ($i = 1; $i<=5; $i++)
        <p>User - {{$i}} </p>
    @endfor

    <!-- while loop in laravel  -->
     <br>
     @php 
     $i = 0;
     @endphp
     @while ($i<5)
        <p>Product - {{$i}} </p>
        @php $i++ @endphp
    @endwhile

    <!-- foreach for php arrays  -->
     @php
        $continents = array(
            "Africa",
            "Antarctica",
            "Asia",
            "Europe",
            "North America",
            "Australia",
            "South America"
        );
        echo "<pre>";
        print_r($continents);
    @endphp
    <h3>Continents: </h3>
    <select>
    @foreach ($continents as $key => $continent)
        <option value="{{$key}}"> {{$continent}} </option>
    @endforeach
    </select>

    <!-- break and continue in blade  -->
     @foreach($continents as $continent)
     {{-- if the value is Asia, we will break the loop --}}
        @if($continent=="Asia")
            <strong> India is on this Continent - {{$continent}}</strong>
            @break
        @else
            <p> {{$continent}}</p>
        @endif
    @endforeach

</body>
```

### Controllers
```bash
php artisan make:controller DemoController
php artisan make:controller SingleActionController --invokable
php artisan make:controller PhotoController --resource
```

### Routes with Controllers
```php
use App\Http\Controllers\DemoController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\PhotoController;

// route for calling index function of DemoController class on / url
Route::get('/', [DemoController::class, 'index']); // one way for calling specific function
Route::get('/about', 'App\Http\Controllers\DemoController@about');

// calling SingleActionController - it calls only particular function __invoke() by default
Route::get('/courses', SingleActionController::class);

// Resource controller provde some predefine function like index, edit, show, store, destroy
Route::resource('/photo', PhotoController::class);
```

<!-- ## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)** -->

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
