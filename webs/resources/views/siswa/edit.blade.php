<x-app-layout>
   
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-primary text-white ">
                    <h4 class="card-title">Edit Data Siswa</h4>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('siswa.update') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="col-md-12">
                            <div class="p-3">
                            <label for="" class="form-label">Nama Siswa</label>
                            <input type="text"  name="nama"  class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="p-3">
                            <label for="" class="form-label">Nama Lengkap</label>
                            <input type="text"  name="nama_lengkap"  class="form-control" required>
                            </div>
                        </div>
                        <br>
                            <div class="col-md-5">
                                <div class="p-3">
                                <label for="" class="form-label">Kelas</label>
                                <select class="form-select" name="kelas_id">
                                    <option selected>Pilih...</option>
                                    <?php foreach ($kelas as $k): ?>
                                        <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                    <?php endforeach; ?>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="p-3">
                                <label for="" class="form-label">Jurusan</label>
                                <select class="form-select" name="jurusan_id">
                                    <option selected>Pilih...</option>
                                    <?php foreach ($jurusan as $j): ?>
                                        <option value="{{ $j->id }}">{{ $j->nama }}</option>
                                    <?php endforeach; ?>
                                </select>
                                </div>
                            </div>
                            
                        <div class="col-md-12">
                            <div class="p-3">
                            <label for="" class="form-label">Alamat</label>
                            <textarea class="form-control" placeholder="Masukkan Alamat" id="floatingTextarea2" style="height: 100px"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                        <div class="p-3">  
                            <input type="hidden">
                            <button class="btn-success" type="submit">Simpan</button>
                            <a href="{{'/siswa'}}" class="btn btn-danger  btn-sm">Batal</a>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>