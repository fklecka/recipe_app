<a href="{{route('recipes.show', $recipe->id)}}" class="hover:no-underline hover:text-current">
    <div class="recipe_demo rounded-2xl mt-4 border mx-4 shadow h-96">
        <div class="w-full h-48 overflow-hidden">
            <img class="object-cover h-48 w-full object-bottom rounded-t-xl" src="{{asset('/storage/recipes/'.$recipe->image_url)}}" alt="">
        </div>
        <h2 class="text-lg mx-4 my-2">{{$recipe->title}}</h2>
        <hr>
        <p class="mx-4 my-2 overflow-scroll">{{$recipe->description}}</p>
    </div>
</a>
