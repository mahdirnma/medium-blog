@extends('layout.app3')
@section('title')
    posts
@endsection
@section('content')
    <div class="w-full h-[88%] bg-gray-200 flex items-center justify-center">
        <div class="w-[90%] h-5/6 bg-white rounded-xl pt-3 flex flex-col items-center">
            <div class="w-[90%] h-1/5 flex justify-between items-center border-b">
                <h2 class="text-xl">post</h2>
            </div>
            <div class="w-[90%] h-3/5 flex flex-col justify-center">
                <table class="w-full min-h-full border border-gray-400">
                    <thead>
                    <tr class="h-12 border border-gray-400 border-b-2 border-b-gray-400">
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
