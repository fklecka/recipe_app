@extends('layouts.app')

@section('content')
<div class="grid grid-cols-4 content-center mx-4">
    @foreach ($categories as $category) 
        @include('partials.category_demo')
    @endforeach
    @auth
    @if(auth()->user()->is_admin === 1)
    <a href="{{route('categories.create')}}">
        <div class="recipe_demo rounded-2xl mt-4 border mx-4 shadow h-30">
            <div class="w-full h-32 overflow-hidden flex justify-center items-center flex-col">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  Neue Kategorie erstellen
            </div>
        </div>
    </a>
    @endif
    @endauth
</div>



@endsection