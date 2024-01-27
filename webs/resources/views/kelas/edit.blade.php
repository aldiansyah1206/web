<x-app-layout>
    <form action="{{ URL('kelas.update' . $kelas->id) }}" method="POST">
        @method('PATCH')
        @csrf
        <input placeholder="Nama kelas" value="{{ $kelas->nama }}" name="nama" id="nama"  onfocus="this.oldvalue = this.value;" onchange="onChangeTest(this);this.oldvalue = this.value;"  />
        <button type="submit">Perbarui</button>
    </form>
</x-app-layout>
