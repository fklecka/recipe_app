@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center py-4">
    <div>
        <div class="account info mb-8">
            <h2 class="text-xl mb-2">Account Info</h2>
            <table>
                <tr>
                    <td class="font-bold">Name:</td>
                    <td>{{auth()->user()->name}}</td>
                </tr>
                <tr>
                    <td class="font-bold">E-Mail:</td>
                    <td>{{auth()->user()->email}}</td>
                </tr>
            </table>
            <div class="py-2">
                <td><a href="{{route('password.update')}}" class="py-1 px-2 bg-gray-300 rounded">Passwort zurücksetzen</a></td>
            </div>
        </div>
        <div class="account recipes">
            <h2 class="text-xl my-2">Rezepte</h2>
            <table class="table-auto">
                @foreach ($recipes as $recipe)
                <tr class="border">
                    <td>
                        <img class="object-cover h-14 w-24 object-bottom" src="{{asset('/storage/recipes/'.$recipe->image_url)}}" alt="">
                    </td>
                    <td class="px-8">
                        <a href="{{route('recipes.show', $recipe->id)}}" class="text-lg">{{$recipe->title}}</a>
                    </td>
                    <td class="border-left pl-3">
                        <a href="{{route('recipes.edit', $recipe->id)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </td>
                    <td class="px-2">
                        <form action="{{route('recipes.destroy', $recipe->id)}}" method="POST" onsubmit="return confirm('Rezept wirklich löschen?')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="rounded px-2 py-3">                            
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hover:fill-red" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                              </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>




@endsection