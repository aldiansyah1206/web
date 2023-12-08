<x-app-layout>
    <form action="{{ route("jurusan.update", $jurusan) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input placeholder="Nama jurusan" value={{ $jurusan->nama }} name="nama" id="nama" />
        <button type="submit">Perbarui</button>
    </form>
</x-app-layout>
