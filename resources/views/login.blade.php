<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    @if ($errors->has('message'))
        <div class="mb-4 text-red-600 text-center">
            {{ $errors->first('message') }}
        </div>
    @endif
    <form method="POST" action="/login" class="bg-white p-8 rounded shadow-md w-96">
        @csrf
        <h2 class="text-2xl mb-6 text-center">Iniciar Sesión</h2>
        <div class="mb-4">
            <label class="block mb-1">Correo</label>
            <input type="email" name="email" class="w-full border px-3 py-2 rounded" required>
        </div>
        <div class="mb-6">
            <label class="block mb-1">Contraseña</label>
            <input type="password" name="password" class="w-full border px-3 py-2 rounded" required>
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Entrar</button>
    </form>
</body>
</html>