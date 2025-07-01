@extends('layout.app')
@section('title')
    posts
@endsection
@section('content')
    <div class="w-full h-[88%] bg-gray-200 flex items-center justify-center">
        <div class="w-[90%] h-5/6 bg-white rounded-xl pt-3 flex flex-col items-center">
            <div class="w-[90%] h-1/5 flex justify-between items-center border-b">
                <a href="{{route('posts.create')}}" class="px-10 py-3 rounded-xl font-light text-white bg-gray-800">add post +</a>
                <h2 class="text-xl">post</h2>
            </div>
            <div class="w-[90%] h-3/5 flex flex-col justify-center">
                <table class="w-full min-h-full border border-gray-400">
                    <thead>
                    <tr class="h-12 border border-gray-400 border-b-2 border-b-gray-400">
                        <td class="text-center">delete</td>
                        <td class="text-center">update</td>
                        <td class="text-center">writer</td>
                        <td class="text-center">tags</td>
                        <td class="text-center">category</td>
                        <td class="text-center">description</td>
                        <td class="text-center">title</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td class="text-center">
                                <form action="{{route('posts.destroy',compact('post'))}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-green-600">delete</button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="{{route('posts.edit',compact('post'))}}" method="get">
                                    @csrf
                                    <button type="submit" class="text-cyan-600">update</button>
                                </form>
                            </td>
                            <td class="text-center">{{$post->user->name}}</td>
                            <td class="text-center">
                                @foreach($post->tags as $tag)
                                    {{$tag->title}} ,
                                @endforeach
                            </td>
                            <td class="text-center">{{$post->category->title}}</td>
                            <td class="text-center">{{$post->description}}</td>
                            <td class="text-center">{{$post->title}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-5">{{$posts->links()}}</div>
        </div>
@endsection
