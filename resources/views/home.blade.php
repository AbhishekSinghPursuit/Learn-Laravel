<!-- mention where to go this below section - go to main section of layouts -->
@extends('layouts.main')

@push('title')
    <title>Home</title>
@endpush

<!-- create a section with the same name "main-section" which is yeild by main section  -->
@section('main-section')
<h1 class="text-center">
    Home Page 
</h1>
@endsection
