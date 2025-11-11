@extends('layouts.app')
@section('title','Carreras')

@section('content')
<h1 class="text-2xl font-semibold mb-6">Carreras</h1>

<div class="bg-white rounded-2xl shadow overflow-hidden">
  <table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
      <tr>
        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-100">
      @forelse($carreras as $c)
        <tr><td class="px-4 py-3">{{ $c->id }}</td><td class="px-4 py-3">{{ $c->nombre }}</td></tr>
      @empty
        <tr><td class="px-4 py-6 text-center text-gray-500" colspan="2">Sin registros.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>

<div class="mt-4">{{ $carreras->links() }}</div>
@endsection