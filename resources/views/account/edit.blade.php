
@extends('layouts.app')

@section('content')

<form action="{{route('account.update', auth()->user())}}" method="post">
    @csrf
    @method('put')
    <div class="flex justify-center">
        <div class="form-content w-1/4 mt-4 bg-gray-200 p-4 rounded-lg">
            <h2 class="text-xl mb-2">Account bearbeiten</h2>
            <div class="flex flex-col mb-2">
                <label for="name" class="mb-0">Name</label>
                <input type="text" name="name" id="name" class="h-8 rounded-lg pl-2" value="{{auth()->user()->name}}">
            </div>
            <div class="flex flex-col mb-2">
                <label for="email" class="mb-0">E-Mail</label>
                <input type="email" name="email" id="email" class="h-8 rounded-lg pl-2" value="{{auth()->user()->email}}">
            </div>
            <div class="flex justify-center mt-4">
                <button type="submit" class="border rounded py-2 px-24 bg-gray-300">Speichern</button>
            </div>
        </div>
    </div>
</form>
@endsection