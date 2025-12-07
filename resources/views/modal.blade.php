<div id="noteModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto transform transition-all">
        <!-- Modal Header -->
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-6 rounded-t-2xl">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-white">Nova Anotação</h2>
                </div>
                <button onclick="closeModal()" class="text-white/80 hover:text-white transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Modal Body -->
        <form class="p-6 space-y-6" method="post" action="{{ route('notes.create') }}">
            @csrf
            <!-- Categoria -->
            <div>
                <label for="categoria" class="block text-sm font-medium text-gray-700 mb-2">Categoria</label>
                <select
                    id="categoria"
                    name="category"
                    class="
                    @error('category')
                    border-red-500 ring-red-500 focus:border-red-500 focus:ring-red-500
                    @enderror
                    w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition">
                    <option id="categoria" value="">Selecione uma categoria</option>
                    @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('category') == $categoria->id ? 'selected' : '' }}>{{ $categoria->name }}</option>
                    @endforeach
                </select>
                @error('category')
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg" role="alert">
                    <span class="font-medium">{{ $message }}</span>
                </div>
                @enderror
            </div>

            <!-- Título -->
            <div>
                <label for="titulo" class="block text-sm font-medium text-gray-700 mb-2">Título</label>
                <input
                    type="text"
                    id="titulo"
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="Digite o título da anotação"
                    class="
                    @error('title')
                    border-red-500 ring-red-500 focus:border-red-500 focus:ring-red-500
                    @enderror
                    w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition"
                    required>
                @error('title')
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg" role="alert">
                    <span class="font-medium">{{ $message }}</span>
                </div>
                @enderror
            </div>

            <!-- Conteúdo -->
            <div>
                <label for="conteudo" class="block text-sm font-medium text-gray-700 mb-2">Conteúdo</label>
                <textarea
                    id="conteudo"
                    name="content"
                    rows="8"
                    placeholder="Escreva o conteúdo da sua anotação..."
                    class="
                    @error('content')
                    border-red-500 ring-red-500 focus:border-red-500 focus:ring-red-500
                    @enderror
                    w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition resize-none"
                    required> {{ old('content') }}</textarea>
                <p class="text-xs text-gray-500 mt-2">Dica: Use formatação markdown para melhor organização</p>
                @error('content')
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg" role="alert">
                    <span class="font-medium">{{ $message }}</span>
                </div>
                @enderror
            </div>

            <!-- Botões -->
            <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-200">
                <button
                    type="button"
                    onclick="closeModal()"
                    class="px-6 py-3 border border-gray-300 rounded-lg font-semibold text-gray-700 hover:bg-gray-50 transition">
                    Cancelar
                </button>
                <button
                    type="submit"
                    class="px-6 py-3 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 transition duration-200 shadow-lg hover:shadow-xl flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Salvar Anotação</span>
                </button>
            </div>
        </form>
    </div>
    @if ($errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            openModal();
        });
    </script>
    @endif

</div>



<script>
    function openModal() {
        const modal = document.getElementById('noteModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal = document.getElementById('noteModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }

    // Fechar modal ao clicar fora
    document.getElementById('noteModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });

    // Fechar modal com tecla ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });

    async function editNote(id) {

        const response = await fetch(`/notes/edit/${id}`);
        const data = await response.json();

        document.getElementById('titulo').value = data.note.title;
        document.getElementById('conteudo').value = data.note.content;
        document.getElementById('categoria').value = data.category;

        const form = document.querySelector('#noteModal form');
        form.action = `/notes/${id}`;

        if (!document.querySelector('#_method')) {
            form.insertAdjacentHTML('afterbegin', '<input type="hidden" id="_method" name="_method" value="PUT">');
        }

        openModal();
    }
</script>
</div>