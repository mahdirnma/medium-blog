<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="w-svw h-svh flex justify-center items-center bg-gray-200">
    <div class="w-2/6 h-5/6 bg-white rounded-xl flex flex-col items-center justify-start">
        <h1 class="text-3xl pt-5">ثبت نام</h1>
        <form action="{{route('register')}}" method="post" class="w-5/6 flex flex-col items-end justify-start">
            @csrf
            <label for="name" class="mt-2">نام</label>
            <input type="text" name="name" id="name" class="w-full h-10 bg-gray-100 rounded mt-5">
            <label for="email" class="mt-10">ایمیل</label>
            <input type="email" name="email" id="email" class="w-full h-10 bg-gray-100 rounded mt-5">
            <label for="password" class="mt-5">رمز عبور</label>
            <input type="password" name="password" id="password" class="w-full h-10 bg-gray-100 rounded mt-5">
{{--
            <label for="confirmPassword" class="mt-5">تکرار رمز عبور</label>
            <input type="password" name="confirmPassword" id="confirmPassword" class="w-full h-10 bg-gray-100 rounded mt-5">
--}}
            <input type="submit" value="ثبت نام" class="w-full h-12 cursor-pointer text-gray-100 bg-gray-600 rounded mt-8">
        </form>
    </div>
    @if($errors->any())
        <div class="bg-amber-500">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif

</div>
</body>
</html>
