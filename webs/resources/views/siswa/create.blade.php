<x-app-layout>
   
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-primary text-white ">
                <h4 class="card-title">Tambah Data Siswa</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('siswa.store') }}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Siswa</label>
                        <input type="text"  name="nama"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text"  name="nama_lengkap"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Kelas</label>
                        <input type="text" name="kelas"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Jurusan</label>
                        <input type="text" name="jurusan" class="form-control" required >
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <input type="text" name="jenis_kelamin" class="form-control" required >
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control" required >
                    </div>
                    <input type="hidden">
                    <button class="btn-primary" type="submit">Tambah</button>
                    <a href="{{'/siswa'}}" class="btn btn-danger  btn-sm">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>