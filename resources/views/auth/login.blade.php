<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="w-svw h-svh flex justify-center items-center bg-gray-200">
    <div class="w-2/6 h-5/6 bg-white rounded-xl flex flex-col items-center justify-start">
        <h1 class="text-3xl pt-8">لاگین</h1>
        <form action="{{route('login')}}" method="post" class="w-5/6 flex flex-col items-end justify-start mt-10">
            @csrf
            <label for="email" class="mt-10">ایمیل</label>
            <input type="email" name="email" id="email" class="w-full h-10 bg-gray-100 rounded mt-3">
            @if($errors->has('email'))
                <p class="text-red-600 mt-2">{{$errors->first('email')}}</p>
            @endif
            <label for="password" class="mt-10">رمز عبور</label>
            <input type="password" name="password" id="password" class="w-full h-10 bg-gray-100 rounded mt-3">
            @if($errors->has('password'))
                <p class="text-red-600 mt-2">{{$errors->first('password')}}</p>
            @endif
            <input type="submit" value="ورود" class="mt-10 w-full h-12 text-gray-100 bg-gray-600 rounded  cursor-pointer">
        </form>
        <a href="{{route('register.form')}}" class="mt-10">ثبت نام نکرده اید؟</a>
    </div>
</div>
</body>
</html>
