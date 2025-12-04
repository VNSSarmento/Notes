@extends('layout.main')
@section('content')

<div class="bg-gradient-to-br from-black to-indigo-800 min-h-screen">
    <!-- Header -->
    <header class="bg-white/10 backdrop-blur-md border-b border-white/20">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-indigo-600 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold text-white">Notes</h1>
                </div>
                
                <div class="flex items-center space-x-4">
                    <button class="text-white hover:text-indigo-200 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                    <div class="relative">
                        <button class="flex items-center space-x-2 text-white hover:text-indigo-200 transition">
                            <div class="w-8 h-8 bg-indigo-500 rounded-full flex items-center justify-center">
                                <span class="text-sm font-semibold">U</span>
                            </div>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <!-- Welcome Section -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-white mb-2">Bem-vindo de volta!</h2>
            <p class="text-indigo-200">Você tem 8 anotações salvas</p>
        </div>

        <!-- Action Buttons -->
        <div class="mb-8 flex flex-wrap gap-4">
            <button onclick="openModal()" class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Nova Anotação</span>
            </button>
            
            <button class="bg-white/10 backdrop-blur-md text-white px-6 py-3 rounded-lg font-semibold hover:bg-white/20 transition duration-200 border border-white/20 flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                </svg>
                <span>Filtrar</span>
            </button>
        </div>

        <!-- Notes Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Note Card 1 -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 overflow-hidden group">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800 line-clamp-2 flex-1">Ideias para o Projeto</h3>
                        <button class="text-gray-400 hover:text-indigo-600 transition opacity-0 group-hover:opacity-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <p class="text-gray-600 text-sm line-clamp-3 mb-4">Implementar sistema de tags para melhor organização das notas. Adicionar busca avançada e filtros personalizados.</p>
                    
                    <div class="flex items-center justify-between text-xs text-gray-400 pt-4 border-t border-gray-100">
                        <span>2 horas atrás</span>
                        <span class="bg-indigo-100 text-indigo-600 px-2 py-1 rounded-full text-xs font-medium">Trabalho</span>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-indigo-500 to-purple-500 h-1 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
            </div>

            <!-- Note Card 2 -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 overflow-hidden group">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800 line-clamp-2 flex-1">Lista de Compras</h3>
                        <button class="text-gray-400 hover:text-indigo-600 transition opacity-0 group-hover:opacity-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <p class="text-gray-600 text-sm line-clamp-3 mb-4">Leite, ovos, pão, frutas, café, arroz, feijão, macarrão e outros itens essenciais para a semana.</p>
                    
                    <div class="flex items-center justify-between text-xs text-gray-400 pt-4 border-t border-gray-100">
                        <span>5 horas atrás</span>
                        <span class="bg-indigo-100 text-indigo-600 px-2 py-1 rounded-full text-xs font-medium">Pessoal</span>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-indigo-500 to-purple-500 h-1 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
            </div>

            <!-- Note Card 3 -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 overflow-hidden group">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800 line-clamp-2 flex-1">Reunião de Planejamento</h3>
                        <button class="text-gray-400 hover:text-indigo-600 transition opacity-0 group-hover:opacity-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <p class="text-gray-600 text-sm line-clamp-3 mb-4">Definir metas do trimestre, revisar KPIs, discutir estratégias de crescimento e alinhar expectativas da equipe.</p>
                    
                    <div class="flex items-center justify-between text-xs text-gray-400 pt-4 border-t border-gray-100">
                        <span>1 dia atrás</span>
                        <span class="bg-indigo-100 text-indigo-600 px-2 py-1 rounded-full text-xs font-medium">Reuniões</span>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-indigo-500 to-purple-500 h-1 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
            </div>

            <!-- Note Card 4 -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 overflow-hidden group">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800 line-clamp-2 flex-1">Aprender Laravel</h3>
                        <button class="text-gray-400 hover:text-indigo-600 transition opacity-0 group-hover:opacity-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <p class="text-gray-600 text-sm line-clamp-3 mb-4">Estudar Eloquent ORM, middleware, autenticação, validação de dados e boas práticas de desenvolvimento.</p>
                    
                    <div class="flex items-center justify-between text-xs text-gray-400 pt-4 border-t border-gray-100">
                        <span>2 dias atrás</span>
                        <span class="bg-indigo-100 text-indigo-600 px-2 py-1 rounded-full text-xs font-medium">Estudos</span>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-indigo-500 to-purple-500 h-1 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
            </div>

            <!-- Note Card 5 -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 overflow-hidden group">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800 line-clamp-2 flex-1">Receita de Bolo</h3>
                        <button class="text-gray-400 hover:text-indigo-600 transition opacity-0 group-hover:opacity-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <p class="text-gray-600 text-sm line-clamp-3 mb-4">3 ovos, 2 xícaras de açúcar, 1 xícara de óleo, 2 xícaras de farinha, 1 colher de fermento. Assar por 40 minutos.</p>
                    
                    <div class="flex items-center justify-between text-xs text-gray-400 pt-4 border-t border-gray-100">
                        <span>3 dias atrás</span>
                        <span class="bg-indigo-100 text-indigo-600 px-2 py-1 rounded-full text-xs font-medium">Receitas</span>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-indigo-500 to-purple-500 h-1 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
            </div>

            <!-- Note Card 6 -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 overflow-hidden group">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800 line-clamp-2 flex-1">Metas do Ano</h3>
                        <button class="text-gray-400 hover:text-indigo-600 transition opacity-0 group-hover:opacity-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <p class="text-gray-600 text-sm line-clamp-3 mb-4">Aprender 3 novas tecnologias, fazer exercícios regularmente, ler 12 livros e viajar para 2 países novos.</p>
                    
                    <div class="flex items-center justify-between text-xs text-gray-400 pt-4 border-t border-gray-100">
                        <span>1 semana atrás</span>
                        <span class="bg-indigo-100 text-indigo-600 px-2 py-1 rounded-full text-xs font-medium">Objetivos</span>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-indigo-500 to-purple-500 h-1 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
            </div>

            <!-- Note Card 7 -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 overflow-hidden group">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800 line-clamp-2 flex-1">Livros para Ler</h3>
                        <button class="text-gray-400 hover:text-indigo-600 transition opacity-0 group-hover:opacity-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <p class="text-gray-600 text-sm line-clamp-3 mb-4">Clean Code, Design Patterns, Domain Driven Design, The Pragmatic Programmer e Refactoring.</p>
                    
                    <div class="flex items-center justify-between text-xs text-gray-400 pt-4 border-t border-gray-100">
                        <span>1 semana atrás</span>
                        <span class="bg-indigo-100 text-indigo-600 px-2 py-1 rounded-full text-xs font-medium">Leitura</span>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-indigo-500 to-purple-500 h-1 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
            </div>

            <!-- Note Card 8 -->
            <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 overflow-hidden group">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800 line-clamp-2 flex-1">Treino da Semana</h3>
                        <button class="text-gray-400 hover:text-indigo-600 transition opacity-0 group-hover:opacity-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                            </svg>
                        </button>
                    </div>
                    
                    <p class="text-gray-600 text-sm line-clamp-3 mb-4">Segunda: Peito e Tríceps. Quarta: Costas e Bíceps. Sexta: Pernas e Ombros. Cardio 3x por semana.</p>
                    
                    <div class="flex items-center justify-between text-xs text-gray-400 pt-4 border-t border-gray-100">
                        <span>2 semanas atrás</span>
                        <span class="bg-indigo-100 text-indigo-600 px-2 py-1 rounded-full text-xs font-medium">Fitness</span>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-indigo-500 to-purple-500 h-1 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
            </div>
        </div>
    </div>

    <!-- Modal -->
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
            <form class="p-6 space-y-6">
                <!-- Categoria -->
                <div>
                    <label for="categoria" class="block text-sm font-medium text-gray-700 mb-2">Categoria</label>
                    <select 
                        id="categoria"
                        name="categoria"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition">
                        <option value="">Selecione uma categoria</option>
                        <option value="Trabalho">Trabalho</option>
                        <option value="Pessoal">Pessoal</option>
                        <option value="Estudos">Estudos</option>
                        <option value="Reuniões">Reuniões</option>
                        <option value="Objetivos">Objetivos</option>
                        <option value="Leitura">Leitura</option>
                        <option value="Fitness">Fitness</option>
                        <option value="Receitas">Receitas</option>
                        <option value="Ideias">Ideias</option>
                        <option value="Outros">Outros</option>
                    </select>
                </div>

                <!-- Título -->
                <div>
                    <label for="titulo" class="block text-sm font-medium text-gray-700 mb-2">Título</label>
                    <input 
                        type="text" 
                        id="titulo"
                        name="titulo"
                        placeholder="Digite o título da anotação"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition"
                        required>
                </div>

                <!-- Conteúdo -->
                <div>
                    <label for="conteudo" class="block text-sm font-medium text-gray-700 mb-2">Conteúdo</label>
                    <textarea 
                        id="conteudo"
                        name="conteudo"
                        rows="8"
                        placeholder="Escreva o conteúdo da sua anotação..."
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition resize-none"
                        required></textarea>
                    <p class="text-xs text-gray-500 mt-2">Dica: Use formatação markdown para melhor organização</p>
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
    </script>
</div>

@endsection