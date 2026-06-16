<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">

    <form action="/admin/login" method="POST"
          class="bg-white p-8 rounded-xl shadow-md w-96">

        @csrf

        <h1 class="text-2xl font-bold mb-6 text-center">
            Login Admin
        </h1>

        <input type="email"
               name="email"
               placeholder="Email"
               class="w-full border p-3 rounded mb-4">

        <input type="password"
               name="password"
               placeholder="Password"
               class="w-full border p-3 rounded mb-4">

        <button class="w-full bg-indigo-600 text-white p-3 rounded">
            Login
        </button>

    </form>

</body>
</html>