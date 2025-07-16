<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing Laravel Project</title>
</head>
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
</html>