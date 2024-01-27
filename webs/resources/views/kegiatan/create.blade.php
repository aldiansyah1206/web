<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Kegiatan</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('kegiatan.store') }}">
                            @csrf
    
                            <div class="form-group">
                                <label for="keterangan">Keterangan Kegiatan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    value="{{ old('keterangan') }}" required autofocus>
                            </div>
    
                            <div class="form-group">
                                <label for="tgl_mulai">Tgl Mulai</label>
                                <input type="text" class="form-control" id="tgl_mulai" name="tgl_mulai"
                                    value="{{ old('tgl_mulai') }}" required>
                            </div>
    
                            <div class="form-group">
                                <label for="tgl_selesai">Tgl Selesai</label>
                                <input type="text" class="form-control" id="tgl_selesai" name="tgl_selesai"
                                    value="{{ old('tgl_selesai') }}" required>
                            </div>
    
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
