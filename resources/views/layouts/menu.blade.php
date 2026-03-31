<div class="bg-gray-900 py-12 px-6 min-h-screen">
    <div class="max-w-5xl mx-auto">
        
        <h2 class="text-white text-lg font-semibold mb-6">menu pengaduan</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($members as $member)
                <a href="#" class="flex items-center p-4 bg-gray-800 border border-gray-700 rounded-lg hover:bg-gray-700 transition duration-200">
                    <img class="w-12 h-12 rounded-full object-cover" src="{{ $member['image'] }}" alt="{{ $member['name'] }}">
                    
                    <div class="ml-4">
                        <p class="text-white font-medium">{{ $member['name'] }}</p>
                        <p class="text-gray-400 text-sm">{{ $member['role'] }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>