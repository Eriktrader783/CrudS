@extends('layouts.app')
@section('title','Estudiantes')

@section('content')
<h1 class="text-3xl font-semibold mb-6">Estudiantes</h1>

@if(session('ok'))
  <div class="mb-4 p-3 rounded-lg bg-green-50 text-green-700 border border-green-200">
    {{ session('ok') }}
  </div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
  {{-- FORMULARIO --}}
  <div class="bg-white rounded-2xl shadow p-6">
    <h2 class="text-xl font-semibold mb-4">Nuevo</h2>

    <form method="POST" action="{{ route('estudiantes.store') }}" class="space-y-4">
      @csrf

      <div>
        <label class="block text-sm font-medium mb-1" for="nombre">Nombre</label>
        <input id="nombre" name="nombre" type="text" required
               class="w-full rounded-lg border-gray-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-200"
               value="{{ old('nombre') }}">
        @error('nombre') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
      </div>

      <div>
        <label class="block text-sm font-medium mb-1" for="correo">Correo</label>
        <input id="correo" name="correo" type="email" required
               class="w-full rounded-lg border-gray-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-200"
               value="{{ old('correo') }}">
        @error('correo') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
      </div>

      <div>
        <label class="block text-sm font-medium mb-1" for="carrera_id">Carrera</label>
        <select id="carrera_id" name="carrera_id" required
                class="w-full rounded-lg border-gray-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-200">
          <option value="" disabled selected>Selecciona una carrera</option>
          @foreach($carreras as $c)
            <option value="{{ $c->id }}" @selected(old('carrera_id')==$c->id)>{{ $c->nombre }}</option>
          @endforeach
        </select>
        @error('carrera_id') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
      </div>

      <div>
        <label class="block text-sm font-medium mb-1" for="semestre">Semestre</label>
        <input id="semestre" name="semestre" type="number" min="1" max="12" required
               class="w-full rounded-lg border-gray-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-200"
               value="{{ old('semestre') }}">
        @error('semestre') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
      </div>

      <div class="flex gap-3 pt-2">
        <button type="submit" class="px-5 py-2.5 rounded-lg bg-blue-600 text-white hover:bg-blue-700 shadow">
          Guardar
        </button>
        <a href="{{ route('estudiantes.index') }}" class="px-4 py-2 rounded-lg border hover:bg-gray-100">
          Limpiar
        </a>
      </div>
    </form>
  </div>

  {{-- TABLA --}}
  <div>
    <h2 class="text-xl font-semibold mb-4">Registrados</h2>

    <div class="bg-white rounded-2xl shadow overflow-hidden">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre</th>
            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Correo</th>
            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Carrera</th>
            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Semestre</th>
            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acciones</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-100">
          @forelse($estudiantes as $e)
            <tr class="hover:bg-gray-50">
              <td class="px-4 py-3 text-sm text-gray-600">{{ $e->id }}</td>
              <td class="px-4 py-3 text-sm">{{ $e->nombre }}</td>
              <td class="px-4 py-3 text-sm">{{ $e->correo }}</td>
              <td class="px-4 py-3 text-sm">{{ $e->carrera->nombre ?? '—' }}</td>
              <td class="px-4 py-3 text-sm">{{ $e->semestre }}</td>
              <td class="px-4 py-3 text-sm">
                <form action="{{ route('estudiantes.destroy',$e) }}" method="POST"
                      onsubmit="return confirm('¿Eliminar?')">
                  @csrf @method('DELETE')
                  <button class="text-red-600 hover:underline">Eliminar</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="px-4 py-6 text-center text-gray-500">Aún no hay estudiantes.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="mt-4">
      {{ $estudiantes->links() }}
    </div>
  </div>
</div>
@endsection