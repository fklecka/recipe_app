@extends('layouts.app')

@section('content')
<form action="{{route('categories.store')}}" method="POST" class="flex flex-col items-center" enctype="multipart/form-data">
    @csrf
    <div class="bg-gray-200 p-4 rounded-lg mt-4">
        <div class="flex flex-col mb-2">
            <label for="image">Kategoriefoto</label>
            <input type="file" name="image" id="image" class="h-8 rounded-lg">
        </div>
        <div class="flex flex-col mb-2">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="h-8 rounded-lg pl-2">
        </div>
    </div>
    <div class="flex justify-center mt-4">
        <button type="submit" class="border rounded py-2 px-24 bg-gray-300">Speichern</button>
    </div>
</form>

@endsection