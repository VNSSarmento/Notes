<div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 overflow-hidden group relative" x-data="{ open: false }">

    <div class="p-6">
        <div class="flex items-start justify-between mb-4">

            <h3 class="text-xl font-bold text-gray-800 line-clamp-2 flex-1">
                {{ $note['title'] }}
            </h3>

            <button
                @click="open = !open"
                class="text-gray-400 hover:text-indigo-600 transition opacity-0 group-hover:opacity-100 relative">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z">
                    </path>
                </svg>
            </button>

            <div
                x-show="open"
                @click.outside="open = false"
                x-transition
                class="absolute right-4 top-12 w-32 bg-white rounded-lg shadow-lg border z-50">
                <button onclick="editNote({{ $note->id }})" class="w-full text-left block px-4 py-2 hover:bg-gray-100">Editar</button>
                <button onclick="viewNote({{ $note->id }})" class="w-full text-left block px-4 py-2 hover:bg-gray-100">Visualizar</button>
                <form method="POST" action="{{ route('notes.delete',['id' => Crypt::encrypt($note->id)]) }}" onsubmit="return confirm('Tem certeza que deseja excluir essa nota?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-100">
                        Excluir
                    </button>
                </form>
            </div>

        </div>

        <p class="text-gray-600 text-sm line-clamp-3 mb-4">{{ $note->content }}</p>

        <div class="flex items-center justify-between text-xs text-gray-400 pt-4 border-t border-gray-100">
            @if ($note->created_at != $note->updated_at)
            @if ($note->diferencaDeDias() > 1)
            <span> Atualizado a {{ floor($note->diferencaDeDias()) }} dias atrás</span>
            @else
            <span>Atualizado Hoje</span>
            @endif
            @else
            @if ($note->diferencaDeDias() > 1)
            <span>{{ floor($note->diferencaDeDias()) }} dias atrás</span>
            @else
            <span>Hoje</span>
            @endif
            @endif

            <span class="bg-indigo-100 text-indigo-600 px-2 py-1 rounded-full text-xs font-medium">
                {{ $note->category->name }}
            </span>
        </div>
    </div>

    <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-indigo-500 to-purple-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>

</div>