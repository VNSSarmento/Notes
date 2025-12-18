<div id="viewNoteModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto transform transition-all">
        <!-- Modal Header -->
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-6 rounded-t-2xl">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-white" id="viewNoteTitle">Visualizar Anotação</h2>
                </div>
                <button onclick="closeViewModal()" class="text-white/80 hover:text-white transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Modal Body -->
        <div class="p-6 space-y-6">
            <!-- Categoria -->
            <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-lg p-4 border border-indigo-100">
                <div class="flex items-center space-x-2 mb-2">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide">Categoria</h3>
                </div>
                <p id="viewNoteCategory" class="text-lg font-medium text-indigo-700"></p>
            </div>

            <!-- Conteúdo -->
            <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
                <div class="flex items-center space-x-2 mb-3">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                    </svg>
                    <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide">Conteúdo</h3>
                </div>
                <div id="viewNoteContent" class="text-gray-800 leading-relaxed whitespace-pre-wrap break-words"></div>
            </div>

            <!-- Data de Criação -->
            <div class="flex items-center justify-between p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-lg border border-gray-200">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span id="updateVerify" class="text-sm font-semibold text-gray-700 uppercase tracking-wide"></span>
                </div>
                <span id="viewNoteCreatedAt" class="text-sm font-medium text-gray-600"></span>
            </div>

            <!-- Botões de Ação -->
            <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-200">
                <button
                    type="button"
                    onclick="closeViewModal()"
                    class="px-6 py-3 border border-gray-300 rounded-lg font-semibold text-gray-700 hover:bg-gray-50 transition">
                    Fechar
                </button>
                <button
                    type="button"
                    onclick="editNoteFromView()"
                    class="px-6 py-3 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-700 transition duration-200 shadow-lg hover:shadow-xl flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    <span>Editar</span>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    let currentNoteId = null;

    function openViewModal() {
        const modal = document.getElementById('viewNoteModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeViewModal() {
        const modal = document.getElementById('viewNoteModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
        currentNoteId = null;
    }

    // Fechar modal ao clicar fora
    document.getElementById('viewNoteModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeViewModal();
        }
    });

    // Fechar modal com tecla ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !document.getElementById('viewNoteModal').classList.contains('hidden')) {
            closeViewModal();
        }
    });

    async function viewNote(id) {
        try {
            const response = await fetch(`/notes/show/${id}`);
            const data = await response.json();

            currentNoteId = id;

            // Preencher os dados no modal
            document.getElementById('viewNoteTitle').textContent = data.notes.title;
            document.getElementById('viewNoteCategory').textContent = data.category.name;
            document.getElementById('viewNoteContent').textContent = data.notes.content;

            // Formatar a data
            if (data.notes.updated_at > data.notes.created_at) {
                const createdAt = new Date(data.notes.updated_at);
                const formattedDate = createdAt.toLocaleDateString('pt-BR', {
                    day: '2-digit',
                    month: 'long',
                    year: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                });
                document.getElementById('viewNoteCreatedAt').textContent = formattedDate;
                document.getElementById('updateVerify').textContent = 'Atualizado em';
            } else {
                const createdAt = new Date(data.notes.created_at);
                const formattedDate = createdAt.toLocaleDateString('pt-BR', {
                    day: '2-digit',
                    month: 'long',
                    year: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                });
                document.getElementById('viewNoteCreatedAt').textContent = formattedDate;
                document.getElementById('updateVerify').textContent = 'Criado em';
            }


            openViewModal();
        } catch (error) {
            console.error('Erro ao carregar a nota:', error);
            alert('Erro ao carregar a nota. Tente novamente.');
        }
    }

    async function editNoteFromView() {
        if (currentNoteId) {
            try {
                // Buscar os dados da nota
                const response = await fetch(`/notes/edit/${currentNoteId}`);
                const data = await response.json();

                // Fechar modal de visualização
                closeViewModal();

                // Preencher o formulário de edição
                document.getElementById('noteId').value = data.note.id;
                document.getElementById('titulo').value = data.note.title;
                document.getElementById('conteudo').value = data.note.content;
                document.getElementById('categoria').value = data.category;

                const form = document.getElementById('formNote');
                form.action = `/notes/update/${currentNoteId}`;

                if (!document.querySelector('#_method')) {
                    form.insertAdjacentHTML('afterbegin', '<input type="hidden" id="_method" name="_method" value="PUT">');
                }

                // Abrir modal de edição
                const modal = document.getElementById('noteModal');
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden';

            } catch (error) {
                console.error('Erro ao carregar nota para edição:', error);
                alert('Erro ao carregar nota para edição. Tente novamente.');
            }
        }
    }
</script>