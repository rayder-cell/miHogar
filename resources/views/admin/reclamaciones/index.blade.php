@extends('layouts.admin')

@section('content')
<div class="p-6">

    {{-- Cabecera --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-white">📋 Libro de Reclamaciones</h1>
            <p class="text-sm text-gray-400 mt-1">
                Total registradas: <span class="text-yellow-400 font-semibold">{{ $total }}</span>
            </p>
        </div>

        {{-- Buscador --}}
        <form method="GET" action="{{ route('admin.reclamaciones.index') }}"
              class="flex items-center gap-2">
            <input
                type="text"
                name="buscar"
                value="{{ request('buscar') }}"
                placeholder="Buscar por nombre, DNI, tipo..."
                class="bg-gray-800 border border-gray-600 text-white text-sm rounded-lg px-4 py-2 w-72
                       focus:outline-none focus:border-yellow-500 placeholder-gray-500"
            />
            <button type="submit"
                class="bg-yellow-500 hover:bg-yellow-400 text-black font-bold text-sm px-4 py-2 rounded-lg transition">
                Buscar
            </button>
            @if(request('buscar'))
                <a href="{{ route('admin.reclamaciones.index') }}"
                   class="text-gray-400 hover:text-white text-sm px-2 transition">✕ Limpiar</a>
            @endif
        </form>
    </div>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="bg-green-500/15 border border-green-500/30 text-green-400 text-sm px-4 py-3 rounded-lg mb-5">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Tabla --}}
    @if($reclamaciones->isEmpty())
        <div class="text-center py-20 text-gray-500">
            <p class="text-4xl mb-3">📭</p>
            <p class="text-sm">No hay reclamaciones registradas aún.</p>
        </div>
    @else
        <div class="overflow-x-auto rounded-xl border border-gray-700">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-800 text-gray-400 uppercase text-xs tracking-wider">
                    <tr>
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Nombre</th>
                        <th class="px-4 py-3">DNI</th>
                        <th class="px-4 py-3">Correo</th>
                        <th class="px-4 py-3">Teléfono</th>
                        <th class="px-4 py-3">Tipo</th>
                        <th class="px-4 py-3">Detalle</th>
                        <th class="px-4 py-3">Fecha</th>
                        <th class="px-4 py-3 text-center">Acción</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700/50">
                    @foreach($reclamaciones as $rec)
                    <tr class="bg-gray-900 hover:bg-gray-800/60 transition">
                        <td class="px-4 py-3 text-gray-500 font-mono text-xs">{{ $rec->id }}</td>

                        <td class="px-4 py-3 text-white font-medium">{{ $rec->nombre }}</td>

                        <td class="px-4 py-3 text-gray-300 font-mono">{{ $rec->dni }}</td>

                        <td class="px-4 py-3 text-gray-300">
                            <a href="mailto:{{ $rec->correo }}"
                               class="hover:text-yellow-400 transition">{{ $rec->correo }}</a>
                        </td>

                        <td class="px-4 py-3 text-gray-300 font-mono">{{ $rec->telefono }}</td>

                        <td class="px-4 py-3">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold
                                @if($rec->tipo === 'Queja')   bg-orange-500/15 text-orange-400 border border-orange-500/30
                                @elseif($rec->tipo === 'Reclamo') bg-red-500/15 text-red-400 border border-red-500/30
                                @else bg-blue-500/15 text-blue-400 border border-blue-500/30 @endif">
                                {{ $rec->tipo }}
                            </span>
                        </td>

                        <td class="px-4 py-3 text-gray-400 max-w-xs">
                            {{-- Detalle truncado con modal --}}
                            <span class="line-clamp-2 cursor-pointer hover:text-white transition"
                                  onclick="abrirDetalle('{{ addslashes($rec->nombre) }}', '{{ addslashes($rec->detalle) }}')">
                                {{ Str::limit($rec->detalle, 80) }}
                            </span>
                        </td>

                        <td class="px-4 py-3 text-gray-400 text-xs whitespace-nowrap">
                            {{ $rec->created_at->format('d/m/Y') }}<br>
                            <span class="text-gray-600">{{ $rec->created_at->format('H:i') }}</span>
                        </td>

                        <td class="px-4 py-3 text-center">
                            <form method="POST"
                                  action="{{ route('admin.reclamaciones.destroy', $rec->id) }}"
                                  onsubmit="return confirm('¿Eliminar esta reclamación? Esta acción no se puede deshacer.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500/15 hover:bg-red-500/30 text-red-400 border border-red-500/30
                                           text-xs font-semibold px-3 py-1.5 rounded-lg transition">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Paginación --}}
        <div class="mt-5">
            {{ $reclamaciones->links() }}
        </div>
    @endif
</div>

{{-- Modal para ver detalle completo --}}
<div id="modal-detalle"
     class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 backdrop-blur-sm"
     style="display:none!important;">
    <div class="bg-gray-900 border border-gray-700 rounded-xl p-6 max-w-lg w-full mx-4 shadow-2xl">
        <div class="flex items-start justify-between mb-4">
            <h3 class="text-white font-bold text-base" id="modal-nombre"></h3>
            <button onclick="cerrarDetalle()"
                class="text-gray-500 hover:text-white text-xl leading-none transition">✕</button>
        </div>
        <p id="modal-texto"
           class="text-gray-300 text-sm leading-relaxed whitespace-pre-wrap bg-gray-800 rounded-lg p-4">
        </p>
    </div>
</div>

<script>
function abrirDetalle(nombre, detalle) {
    document.getElementById('modal-nombre').textContent = 'Detalle — ' + nombre;
    document.getElementById('modal-texto').textContent  = detalle;
    const modal = document.getElementById('modal-detalle');
    modal.style.removeProperty('display');
    modal.style.display = 'flex';
}
function cerrarDetalle() {
    document.getElementById('modal-detalle').style.display = 'none';
}
// Cerrar al hacer click fuera
document.getElementById('modal-detalle').addEventListener('click', function(e) {
    if (e.target === this) cerrarDetalle();
});
</script>
@endsection