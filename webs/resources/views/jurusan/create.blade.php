<x-app-layout>
    <form action="{{ route('jurusan.store') }}" method="POST">
        @method('POST')
        @csrf
        <input placeholder="Nama jurusan" name="nama" id="nama" />
        
        <button type="submit">Tambah</button>
    </form>
</x-app-layout>
