@extends('layout.main')
@section('title')
Login
@endsection
@section('content')
<div class="bg-gradient-to-br from-black to-indigo-800 min-h-screen flex items-center justify-center p-4">
<div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-8">
    <!-- Logo e Título -->
    <div class="text-center mb-8">

        <div class="inline-flex items-center justify-center w-16 h-16 bg-indigo-600 rounded-full mb-4">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
            </svg>
        </div>
        <h1 class="text-3xl font-bold text-gray-800">Notes</h1>
        <p class="text-gray-500 mt-2">Entre na sua conta</p>
    </div>

    <!-- Formulário -->
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="space-y-6">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input
                    type="email"
                    id="email"
                    value="{{ old('email') }}"
                    name="email"
                    class=" 
                    @error('email')
                        border-red-500 ring-red-500 focus:border-red-500 focus:ring-red-500
                    @enderror
                    w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition"
                    placeholder="seu@email.com">
                @error('email')
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg" role="alert">
                    <span class="font-medium">{{ $message }}</span>
                </div>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Senha</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    value="{{ old('password') }}"
                    class="
                    @error('password')
                        border-red-500 ring-red-500 focus:border-red-500 focus:ring-red-500
                    @enderror
                    w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition"
                    placeholder="••••••••">
                @error('password')
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg" role="alert">
                    <span class="font-medium">{{ $message }}</span>
                </div>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center">
                    <input type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                    <span class="ml-2 text-sm text-gray-600">Lembrar-me</span>
                </label>
                <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800 transition">Esqueceu a senha?</a>
            </div>

            <!--Se quisermos o erro em uma caixinha usa esse aqui -->
            <!--@error('password')
            <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">
                <svg class="flex-shrink-0 inline w-5 h-5 me-3 text-red-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10A8 8 0 1 1 2 10a8 8 0 0 1 16 0Zm-8-4a.75.75 0 0 0-.75.75v3.5a.75.75 0 0 0 1.5 0v-3.5A.75.75 0 0 0 10 6Zm0 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                </svg>
                <span class="sr-only">Erro</span>
                <div>
                    <span class="font-medium">Erro! </span>Preencha esse carai direito.
                    @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                    @endforeach
                </div>
            </div>
            @enderror -->
            @if (session('loginError'))
            <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg" role="alert">
                <span class="font-medium">{{ session('loginError') }}</span>
            </div>
            @endif

            <button
                type="submit"
                onclick="handleLogin()"
                class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700 transition duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                Entrar
            </button>

            <div class="text-center text-sm text-gray-600">
                Não tem uma conta?
                <a href="#" class="text-indigo-600 hover:text-indigo-800 font-semibold transition">Cadastre-se</a>
            </div>
        </div>

        <!-- Divider -->
        <div class="relative my-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-4 bg-white text-gray-500">ou continue com</span>
            </div>
        </div>

        <!-- Social Login -->
        <div class="grid grid-cols-2 gap-4">
            <button class="flex items-center justify-center px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                <svg class="w-5 h-5" viewBox="0 0 24 24">
                    <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                    <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                    <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                    <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                </svg>
                <span class="ml-2 text-sm font-medium text-gray-700">Google</span>
            </button>
            <button class="flex items-center justify-center px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                <svg class="w-5 h-5" fill="#1877F2" viewBox="0 0 24 24">
                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                </svg>
                <span class="ml-2 text-sm font-medium text-gray-700">Facebook</span>
            </button>
        </div>
    </form>
</div>
</div>
@endsection