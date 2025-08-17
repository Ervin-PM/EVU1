<!DOCTYPE html>
<html>
<head>
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    @if ($errors->any())
        <div class="mb-4 text-red-600 text-center">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="/register" class="bg-white p-8 rounded shadow-md w-96">
        @csrf
        <h2 class="text-2xl mb-6 text-center">Registro</h2>
        <div class="mb-4">
            <label class="block mb-1">Nombre</label>
            <input type="text" name="name" class="w-full border px-3 py-2 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Correo</label>
            <input type="email" name="email" class="w-full border px-3 py-2 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Contraseña</label>
            <input type="password" name="password" class="w-full border px-3 py-2 rounded" required>
        </div>
        <div class="mb-6">
            <label class="block mb-1">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" class="w-full border px-3 py-2 rounded" required>
        </div>
        <button type="submit" class="w-full bg-green-500 text-white py-2 rounded">Registrar</button>
    </form>
</body>
</html>