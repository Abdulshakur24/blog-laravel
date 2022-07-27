<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <title>LaraGigs | Find Laravel Jobs & Projects</title>
</head>

<body class="max-w-[1440px] mx-auto">
    <x-flash-message />
    <nav class="flex justify-between items-center mb-4">
        <a href="/"><img class=" w-16 lg:w-24" src="{{ asset('images/logo.png') }}" alt=""
                class="logo" /></a>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
                <li>
                    <span class="hidden md:block">Welcome {{ auth()->user()->name }}!</span>
                </li>
                <li>
                    <a href="/listings/manage" class="hover:text-laravel flex items-center">
                        <i class="fa-solid fa-gear mr-2"></i>
                        Manage
                    </a>
                </li>
                <li>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="flex items-center ">
                            <i class="fa-solid fa-arrow-right-from-bracket mr-2"></i>
                            Logout
                        </button>
                    </form>
                </li>
            @else
                <li>
                    <a href="/register" class="hover:text-laravel flex items-center">
                        <i class="fa-solid fa-user-plus mr-2 hidden md:block"></i>
                        Register
                    </a>
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel flex items-center">
                        <i class="fa-solid fa-arrow-right-to-bracket mr-2 hidden md:block"></i>
                        Login
                    </a>
                </li>
                @endif
            </ul>
        </nav>

        <main class="mb-20">
            {{ $slot }}
        </main>

        <footer
            class="flex items-center justify-center max-w-[1440px] max-h-[40px] mx-auto fixed bottom-0 left-0 right-0 w-full font-bold bg-laravel text-white opacity-90">
            <p class="ml-2 grow text-center">Copyright &copy; 2022, All Rights reserved</p>

            <a href="/listings/create" class="bg-black text-white py-2 px-5">Post Job</a>
        </footer>
    </body>

    </html>
