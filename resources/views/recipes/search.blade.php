@extends('layouts.app')

@section('content')
<div class="grid grid-cols-4 content-center mx-4">
    @foreach ($recipes as $recipe) 
        @include('partials.recipe_demo')
    @endforeach
</div>

@endsection