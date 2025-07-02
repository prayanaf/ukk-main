<div class="py-12">
    <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-lg p-6">

            <h2 class="text-xl font-semibold text-gray-800 mb-4">Tambah Data Industri</h2>

            <!-- Form Livewire -->
            <form wire:submit.prevent="save">
                <!-- Nama -->
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700">Nama</label>
                    <input type="text" id="nama" wire:model="nama" class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('nama') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <!-- Bidang Usaha -->
                <div class="mb-4">
                    <label for="bidang_usaha" class="block text-gray-700">Bidang Usaha</label>
                    <input type="text" id="bidang_usaha" wire:model="bidang_usaha" class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('bidang_usaha') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <!-- Alamat -->
                <div class="mb-4">
                    <label for="alamat" class="block text-gray-700">Alamat</label>
                    <textarea id="alamat" wire:model="alamat" class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4"></textarea>
                    @error('alamat') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <!-- Kontak -->
                <div class="mb-4">
                    <label for="kontak" class="block text-gray-700">Kontak</label>
                    <input type="text" id="kontak" wire:model="kontak" class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('kontak') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="text" id="email" wire:model="email" class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <!-- Website -->
                <div class="mb-4">
                    <label for="website" class="block text-gray-700">Website</label>
                    <input type="text" id="website" wire:model="website" class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('website') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <!-- Submit Buttons -->
                <div class="mt-6 text-right">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Simpan
                    </button>
                    <button type="button" wire:click="$emit('backToList')" class="px-6 py-2 bg-gray-400 text-white rounded-md hover:bg-gray-500">
                        Kembali
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
