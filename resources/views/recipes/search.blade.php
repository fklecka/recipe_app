@extends('layouts.app')

@section('content')
<div class="flex flex-wrap justify-center lg:justify-start mx-2">
    @foreach ($recipes as $recipe) 
        @include('partials.recipe_demo')
    @endforeach
</div>



@endsection