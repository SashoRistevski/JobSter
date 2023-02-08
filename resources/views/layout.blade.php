<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{asset('/images/favicon-16x16.png')}}" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    @vite('resources/js/app.js')


    <title>JobSteer | Find Tech Jobs & Projects</title>
</head>
<body class="container mx-auto mb-48">
<nav class="flex justify-between items-center mb-5 mt-2">

    <a href="/listings">
        <img class="w-24 h-22" src="{{asset('images/logo-no-background.png')}}" alt=""
        /></a>
    <ul class="flex space-x-6 mr-6 text-lg">
        <li>
            <a href="register.html" class="hover:text-laravel"
            ><i class="fa-solid fa-user-plus"></i> Register</a
            >
        </li>
        <li>
            <a href="login.html" class="hover:text-laravel"
            ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                Login</a
            >
        </li>
    </ul>
</nav>
<main>
@yield('content')
</main>
<footer
    class=" container mx-auto fixed bottom-3 items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
    <p class="ml-2">Copyright &copy; {{date('Y')}}, All Rights reserved</p>

    <a href="/listings/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Post Job</a>
</footer>
</body>
</html>
