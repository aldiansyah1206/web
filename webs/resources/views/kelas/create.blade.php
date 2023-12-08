<x-app-layout>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-primary text-white ">
                    <h4 class="card-title">Tambah Data Kelas</h4>
                </div>
                <form action="{{ route("kelas.store") }}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-3">
                                <input placeholder="Nama kelas" name="nama" id="nama"/>
                                <select class="form-select" name="jurusan_id">
                                    <?php foreach ($jurusan as $j): ?>
                                        <option value="{{ $j->id }}">{{ $j->nama }}</option>
                                    <?php endforeach; ?>
                                </select>
                                <button type="submit">Tambah</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
   
</x-app-layout>