@extends('layouts.app')

@section('content')

<div class="flex m-2 justify-center bg-gray-100 rounded-xl shadow">
    <div class="md:max-w-3xl md:min-w-3xl">
        <div class="w-full h-80 overflow-hidden">
            <img class="object-cover h-80 w-full object-bottom rounded-t-xl" src="{{asset('/storage/recipes/'.$recipe->image_url)}}" alt="">
        </div>
        <h1 class="text-3xl bg-transparent ml-4 my-4">{{$recipe->title}}</h1>
        <hr>
        <p class="m-4 text-lg">{{$recipe->description}}</p>
        <hr>
        <div class="p-4">
            <h2 class=" mb-3 text-lg">Zutaten:</h2>
            <ul>
                @if($recipe->ingredients !== null)
                    @foreach ($recipe->ingredients as $ingredient)
                        <li class="mb-2">{{$ingredient}}</li>
                    @endforeach
                @endif
            </ul>
        </div>
        <hr>
        <div class="p-4">
            <h2 class="mb-3 text-lg">Zubereitung:</h2>
            <ul class="mx-3">
                @if($recipe->steps !== null)
                    @foreach ($recipe->steps as $step)
                        <li class="mb-4 list-decimal">{{$step}}</li>
                    @endforeach
                @endif
            </ul>
        </div>
        @auth
            @if(Auth()->user()->id === $recipe->user_id || Auth()->user()->is_admin === 1)
                <div class="mx-4 pb-4 flex items-center justify-center">
                    <a href="{{route('recipes.edit', $recipe->id)}}" class="rounded px-3 py-2 bg-gray-300 mr-2 hover:text-current hover:no-underline">Rezept bearbeiten</a>
                    <form action="{{route('recipes.destroy', $recipe->id)}}" method="POST" onsubmit="return confirm('Rezept wirklich löschen?')">
                        @csrf
                        @method('delete')
                        <button type="submit" class="rounded px-3 py-2 bg-red-400">Rezept löschen</button>
                    </form>
                </div>
            @endif
        @endauth
    </div>
    

</div>


@endsection