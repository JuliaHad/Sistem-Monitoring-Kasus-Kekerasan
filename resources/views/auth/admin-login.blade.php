<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-900 to-slate-900">

<div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md">
    <h1 class="text-3xl font-bold text-center mb-2">🔐 Login Admin</h1>
    <p class="text-gray-500 text-center mb-6">Sistem Monitoring</p>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.login.post') }}">
        @csrf

        <div class="mb-4">
            <label class="block mb-2 font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email') }}"
                   class="w-full border rounded-lg px-4 py-2" required>
        </div>

        <div class="mb-6">
            <label class="block mb-2 font-medium">Password</label>
            <input type="password" name="password"
                   class="w-full border rounded-lg px-4 py-2" required>
        </div>

        <button type="submit"
                class="w-full bg-blue-900 text-white py-3 rounded-lg font-semibold hover:bg-blue-800">
            Login Admin
        </button>
    </form>

    <div class="text-center mt-4">
        <a href="{{ route('login') }}" class="text-blue-700 text-sm">
            Login sebagai User
        </a>
    </div>
</div>

</body>
</html>