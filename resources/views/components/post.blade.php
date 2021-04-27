@props(['post'=>$post])

<div class="mb-4">
    <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{$post->user->username}}</a>
    <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>

    <p class="mb-2">{{$post->body}}</p>

    
    @can('delete', $post)<!--authentication/same userid-->
        <form action="{{ route('posts.destroy', $post) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500">Delete Post</button>
        </form>
    @endcan
    

    
    <div class="flex items-center"> 
        @auth <!--for checking user has been log in-->

            @if (!$post->likedBy(auth()->user()))
                <form action="{{ route('posts.likes',$post) }}" method="POST" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500">Like</button>
                </form>
            @else
                <form action="{{ route('posts.likes',$post) }}" method="POST" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Unlike</button>
                </form>
            @endif

        @endauth

        <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }} </span>

    </div><!--like and unlike-->

</div>