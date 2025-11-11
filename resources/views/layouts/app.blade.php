<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@yield('title','Gestión')</title>
  {{-- Vite (si ya lo usas) --}}
  @vite(['resources/css/app.css','resources/js/app.js'])
  {{-- Fallback rápido por si Vite no corre: quítalo si ya compilas con Vite --}}
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-50 text-gray-900">
  <div class="max-w-5xl mx-auto p-6">
    <nav class="mb-6 text-sm">
      <a class="text-blue-600 hover:underline" href="{{ route('estudiantes.index') }}">Estudiantes</a>
      <span class="mx-2">•</span>
      <a class="text-blue-600 hover:underline" href="{{ route('carreras.index') }}">Carreras</a>
    </nav>
    @yield('content')
  </div>
</body>
</html>

