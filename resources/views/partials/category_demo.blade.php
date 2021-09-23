<a href="{{route('recipes.categorized', $category->id)}}" class="hover:no-underline hover:text-current">
    <div class="recipe_demo rounded-2xl w-72 mt-4 border mx-4 shadow h-32">
        <div class="w-full h-20 overflow-hidden">
            <img class="object-cover h-20 w-full object-center rounded-t-xl" src="{{asset('/storage/category/'.$category->img_url)}}" alt="">
        </div>
        <h2 class="text-lg my-2 text-center">{{$category->name}}</h2>
    </div>
</a>