
@extends('layout.main')

@section('title')
Home
@endsection

@section('content')

<div class="bg-gradient-to-br from-black to-indigo-800 min-h-screen">

    @include('topBar')

    <div class="container mx-auto px-4 py-8">
        <div class="mb-8 flex flex-col">
            <h2 class="text-3xl font-bold text-white mb-2">Bem-vindo de volta {{ session('user.name') }}!</h2>
            <p class="text-indigo-200">{{'Você tem '.count($notes).' anotações salvas'}}</p>
        </div>

        <div class="mb-8 flex flex-wrap gap-4 border-b border-gray-500">
            <a href="{{ route('home')}}" class="mb-3 bg-white/10 backdrop-blur-md text-white px-6 py-3 rounded-3xl hover:rounded-xl font-semibold hover:bg-white/20 transition-all duration-300 border border-white/20 flex items-center space-x-2">
                <span>+</span>
            </a>

            @foreach ($categoryNotes as $cat)
            <a href="{{ route('home',['category' => Crypt::encrypt($cat->id)]) }}" class="mb-3 bg-white/10 backdrop-blur-md text-white px-6 py-3 rounded-lg hover:rounded-xl font-semibold hover:bg-white/20 transition-all duration-300 border border-white/20 flex items-center space-x-2">
                <span>{{$cat->name}}</span></a>
            @endforeach

            <a href="{{ route('home')}}" class="mb-3 bg-white/10  backdrop-blur-md text-white px-6 py-3 rounded-lg font-semibold hover:bg-white/20 transition duration-200 border border-white/20 flex items-center space-x-2">
                <span>X</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                </svg>
            </a>
        </div>

        @if(session('success'))
        <div id="alert" class="flex justify-between bg-green-500 text-white px-4 py-3 rounded mb-4">
            <span>{{ session('success') }}</span>
            <button onclick="document.getElementById('alert').remove()">X</button>
        </div>
        @elseif(session('deleteNote'))
        <div id="alert" class="flex justify-between bg-green-500 text-white px-4 py-3 rounded mb-4">
            <span>{{ session('deleteNote') }}</span>
            <button onclick="document.getElementById('alert').remove()">X</button>
        </div>
        @elseif(session('noteUpdate'))
        <div id="alert" class="flex justify-between bg-green-500 text-white px-4 py-3 rounded mb-4">
            <span>{{ session('noteUpdate') }}</span>
            <button onclick="document.getElementById('alert').remove()">X</button>
        </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <div onclick="openModal()" class="bg-gradient-to-br from-indigo-600 to-purple-600 rounded-xl shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 overflow-hidden group cursor-pointer">
                <div class="p-6 h-full flex flex-col items-center justify-center text-center min-h-[210px]">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Nova Anotação</h3>
                    <p class="text-indigo-100 text-sm">Clique aqui para criar uma nova anotação</p>
                </div>
                <div class="bg-white h-1 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
            </div>

            @foreach ($notes as $note)

            @include('note')

            @endforeach
        </div>
        @if ($notes->lastPage() <= 1)
            <div class="mt-6 flex justify-center">
    </div>
    @else
    <div class="mt-6 flex justify-center">
        <nav aria-label="Page navigation example" class="flex items-center justify-center mt-6">

            <ul class="flex items-center space-x-1">

                <li>
                    <a href="{{ $notes->previousPageUrl() }}"
                        class="px-3 py-2 text-sm rounded bg-gray-200 hover:bg-gray-300 {{ $notes->onFirstPage() ? 'pointer-events-none opacity-50' : '' }}">
                        Previous
                    </a>
                </li>

                @for ($i = 1; $i <= $notes->lastPage(); $i++)
                    <li>
                        <a href="{{ $notes->url($i) }}"
                            class="px-3 py-2 text-sm rounded 
                    {{ $notes->currentPage() == $i ? 'bg-indigo-600 text-white' : 'bg-gray-200 hover:bg-gray-300' }}">
                            {{ $i }}
                        </a>
                    </li>
                    @endfor

                    <li>
                        <a href="{{ $notes->nextPageUrl() }}"
                            class="px-3 py-2 text-sm rounded bg-gray-200 hover:bg-gray-300 {{ !$notes->hasMorePages() ? 'pointer-events-none opacity-50' : '' }}">
                            Next
                        </a>
                    </li>
            </ul>
        </nav>
    </div>
    @endif
</div>

@include('modal')

@endsection