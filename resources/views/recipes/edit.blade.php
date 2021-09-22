@extends('layouts.app')

@section('content')

<form action="{{ route('recipes.update', $recipe->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="flex justify-center">
        <div class="form-content w-1/4 mt-4 bg-gray-200 p-4 rounded-lg">
            <fieldset>
                <legend>Beschreibung</legend>
                <div class="flex flex-col mb-2">
                    <label for="image">Rezeptfoto</label>
                    <img class="object-cover h-30 w-full object-bottom rounded-xl" src="{{asset('/storage/recipes/'.$recipe->image_url)}}" alt="">
                    <input type="file" name="image" id="image">
                </div>
                <div class="flex flex-col mb-2">
                    <label for="title" class="mb-0">Titel</label>
                    <input type="text" name="title" id="title" class="h-8 rounded-lg pl-2" value="{{$recipe->title}}">
                </div>
                <div class="flex flex-col mb-2">
                    <label for="category" class="mb-0">Kategorie</label>
                    <select name="category" id="category" class="h-8 rounded-lg pl-1">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}"@if($recipe->category === $category->id) selected @endif>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col mb-2">
                    <label for="description" class="mb-0">Beschreibung</label>
                    <textarea name="description" id="description" cols="30" rows="5" style="resize: none; overflow:scroll" class=" p-2 rounded-lg">{{$recipe->description}}</textarea>
                </div>
            </fieldset>
        </div>
        <div class="form-content w-1/4 mt-4 ml-4 bg-gray-200 p-4 rounded-lg">
            <fieldset>
                <legend>Zutaten</legend>
                <div class="flex flex-col mb-4 ingredients">
                    @foreach ($recipe->ingredients as $ingredient)
                    <div class="flex items-center mb-2">
                        <input type="text" name="ingredients[]" id="ingredients" class="h-8 rounded-lg w-full pl-2" value="{{$ingredient}}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 delete_input cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </div>
                    @endforeach
                </div>
                <p class="flex mt-2 add_ingredient cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                      </svg>
                      Eintrag hinzufügen
                </p>
            </fieldset>
        </div>
        <div class="form-content w-1/4 mt-4 ml-4 bg-gray-200 p-4 rounded-lg">
            <fieldset>
                <legend>Arbeitsschritte</legend>
                <div class="flex flex-col mb-4 steps">
                    @foreach ($recipe->steps as $step)
                    <div class="flex items-center mb-2">
                        <textarea name="steps[]" id="steps" cols="30" rows="4" class="rounded-lg w-full resize-none px-2">{{$step}}</textarea>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 delete_input cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </div>
                    @endforeach
                </div>
                <p class="flex mt-2 add_step cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                      </svg>
                      Eintrag hinzufügen
                </p>
            </fieldset>
        </div>
    </div>
    <div class="flex justify-center mt-4">
        <button type="submit" class="border rounded py-2 px-24 bg-gray-300">Speichern</button>
    </div>
</form>
@endsection