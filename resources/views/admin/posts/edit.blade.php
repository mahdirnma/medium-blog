@extends('layout.app')
@section('title')
    edit post
@endsection
@section('content')
    <div class="w-full h-[88%] bg-gray-200 flex items-center justify-center">
        <div class="w-[90%] h-5/6 bg-white rounded-xl pt-3 flex flex-col items-center">
            <div class="w-[90%] h-1/5 flex justify-end items-center border-b">
                <h2 class="text-xl">edit post</h2>
            </div>
            <div class="flex w-full h-4/5">
                <form action="{{route('posts.update',compact('post'))}}" method="post" enctype="multipart/form-data" class="w-full h-full flex flex-row-reverse">
                    @csrf
                    @method('put')
                    <div class="w-1/2 h-full flex flex-col items-end pr-20 relative">
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="title" class="font-semibold ml-5">: title</label>
                            <input type="text" name="title" value="{{$post->title}}" id="value" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('title')
                                <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="description" class="font-semibold ml-5">: description</label>
                            <textarea name="description" id="description" cols="3" rows="3" class="w-2/5 h-32 rounded outline-0 pb-2 pt-1 px-2 border border-gray-400">{{$post->description}}</textarea>
                            @error('description')
                                <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <input type="submit" value="Update" class="absolute bottom-2 -left-10 text-white bg-gray-700 py-3 px-7 cursor-pointer rounded">
                    </div>
                    <div class="w-1/2 h-full flex flex-col items-end pr-20">
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="category" class="font-semibold ml-5">: category</label>
                            <select name="category_id" id="category" class="w-2/5 h-8 rounded outline-0 pb-2 pt-1 px-2 border border-gray-400">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$category->id==$post->category_id?'selected':''}}>{{$category->title}}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="writer" class="font-semibold ml-5">: writer</label>
                            <select name="writer_id" id="writer" class="w-2/5 h-8 rounded outline-0 pb-2 pt-1 px-2 border border-gray-400">
                                @foreach($writers as $writer)
                                    <option value="{{$writer->id}}" {{$writer->id==$post->user_id?'selected':''}}>{{$writer->name}}</option>
                                @endforeach
                            </select>
                            @error('writer')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <p class="font-semibold ml-5">: tags</p>
                            @foreach($tags as $tag)
                                <label for="">
                                    <input type="checkbox" name="tags[]" id="tags" value="{{$tag->id}}">
                                    {{$tag->title}}
                                </label>
                            @endforeach
                            @error('tags')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
