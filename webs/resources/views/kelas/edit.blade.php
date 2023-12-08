<x-app-layout>
    <form action="{{ url('/kelas/' . $kelas->id) }}" method="POST">
        @method('POST')
        @csrf
        <input placeholder="Nama kelas" value="{{ $kelas->nama }}" name="nama" id="nama"/>
        <select name="jurusan_id">
            <?php foreach ($jurusan as $j): ?>
                <option value="{{ $j->id }}" @if($kelas->jurusan && $kelas->jurusan->id == $j->id) selected @endif>{{ $j->nama }}</option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Perbarui</button>
    </form>
</x-app-layout>