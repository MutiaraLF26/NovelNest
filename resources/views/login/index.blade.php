<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <title>Halaman Login</title>
</head>
<body>
<section class="h-screen bg-cover bg-no-repeat bg-center bg-blend-multiply" style="background-image: url('images/bgLoginRegister.jpg');">
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
  <img class="mx-auto h-20 w-auto" src="{{ asset('/images/logoLR.png')}}" alt="Logo">
    <h2 class="mt-2 text-center text-4xl font-bold leading-9 tracking-tight text-gray-900">Log In</h2>
  </div>


  <div class="bg-brown p-6 mt-10 sm:mx-auto sm:w-full sm:max-w-sm rounded-md shadow-md">
    <form class="space-y-6" action="{{ route('authenticate') }}" method="POST">
      @csrf
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
        <div class="mt-2">
          <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        @if ($errors->has('email'))
          <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $errors->first('email') }}</p>
        @endif
      </div>

      <div class="relative"> 
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
        </div>
        <div class="mt-2 relative">
          <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
          <i id="togglePassword" class="fas fa-eye text-gray-400 hover:text-gray-500"></i>
        </div>
        @if ($errors->has('password'))
          <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> {{ $errors->first('password') }}</p>
        @endif
      </div>

      <div>
        <button type="submit" class="flex w-full justify-center text-white bg-yellow-800 hover:bg-yellow-900 focus:ring-4 focus:outline-none focus:ring-yellow-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Log In</button>
      </div>
    </form>

    <p class="mt-10 text-center text-sm text-gray-500">
      Don't have an account?
      <a href="/register" class="text-gray-500 hover:text-gray-900 focus:outline-none font-medium text-sm">Please, Register Here!</a>
    </p>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</section>
</body>

</html>