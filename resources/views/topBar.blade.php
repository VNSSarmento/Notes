<header class="bg-white/10 backdrop-blur-md border-b border-white/20">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-indigo-600 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold text-white"><a href="{{ route('home') }}">Notes</a></h1>
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
                                <span class="text-sm font-semibold">{{ strtoupper(substr(session('user.name'),0,1)) }}</span>
                            </div>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                    </div>
                    <a class="text-1xl font-bold text-white cursor-pointer hover:text-blue-400" href="{{ route('logout') }}">logout</a>
                </div>
            </div>
        </div>
    </header>