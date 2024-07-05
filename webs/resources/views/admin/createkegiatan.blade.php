<x-app-layout>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title">Tambah Data Kegiatan</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('kegiatan.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-1">
                                    <label for="name" class="form-label">Nama Kegiatan</label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="p-1">
                                    <label for="deskripsi" class="form-label">Deskripsi Kegiatan</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-12 p-3">
                                    <button class="btn btn-success" type="submit">Tambah</button>
                                    <a href="{{ route('kegiatan.index') }}" class="btn btn-danger">Batal</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
