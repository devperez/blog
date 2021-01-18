<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inscription</title>

        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    </head>
    <body class="bg-gray-200 flex content-center justify-center h-full items-center">
        <div class="bg-white shadow-lg max-w-lg md:flex">
            <img class="flex-1 w-full h-40 md:h-full" src="{{asset('img/autumn.jpg')}}">
            <form action="{{route('auth.create')}}" method="GET" class="flex-1 p-4 md:flex md:flex-col justify-center">
                @csrf
                <h1 class="text-2xl font-bold text-gray-800 mb-2 text-center">- Inscription -</h1>
                <span class="text-red-900">@error('password'){{$message}} @enderror</span>
                <span class="text-red-900">@error('email'){{$message}} @enderror</span>                    
                <div class="mb-4">
                    <label class="block text-gray-600 mb-2" for="username">Votre e-mail :</label>
                    <input class="border-2 border-gray-500 focus:ring-1 ring-gray-800" type="email" id="email" value="{{old('email')}}" name="email" placeholder="Votre email">
                </div>
                <div>
                    <label class="block text-gray-600 mb-2" for="password">Votre mot de passe :</label>
                    <input class="border-2 border-gray-500 focus:ring-1 ring-gray-800" type="password" id="password" value="{{old('password')}}" name="password" placeholder="Votre mot de passe">
                </div>
               <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Créer un compte</button>
               <br />
               <a class="text-blue-600 text-center" href="login"><p>Déjà inscrit(e) ? Connectez-vous !</p></a>
            </form>
            <div class="results">
                @if(Session::get('success'))
                <div class="text-green-500">
                    {{Session::get('success')}}
                </div>
            @endif
            @if(Session::get('fail'))
            <div class="text-red-900">
                {{Session::get('fail')}}
            </div>
            @endif
            </div>
        </div>
    </body>
</html>