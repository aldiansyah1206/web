<x-app-layout>
   
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-primary text-white ">
                    <h4 class="card-title">Edit Data Siswa</h4>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('siswa.update', $siswa) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="col-md-12">
                            <div class="p-3">
                                <label for="" class="form-label">Nama Siswa</label>
                                <input value="{{ $siswa->nama }}" type="text"  name="nama"  class="form-control" required onfocus="this.oldvalue = this.value;" onchange="onChangeTest(this);this.oldvalue = this.value; >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="p-3">
                                <label for="" class="form-label">Nama Lengkap</label>
                                <input type="text"  name="nama_lengkap"  class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3">
                                <label for="" class="form-label">Email</label>
                                <input type="text"  name="email"  class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3">
                                <label for="" class="form-label">Password</label>
                                <input type="text"  name="password"  class="form-control" required>
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
                            <div class="col-md-6">
                                <div class="p-3">
                                    <label for="" class="form-label">Jenis Kelamin</label>
                                    <select id="jenis_kelamin" name="jenis_kelamin" id="jenis_kelamin"class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-2sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>Pilih...</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        <div class="col-md-12">
                            <div class="p-3">
                                <label for="" class="form-label">Alamat</label>
                                <textarea class="form-control" placeholder="Masukkan Alamat"  name="alamat" id="floatingTextarea2" style="height: 100px"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="p-3">  
                                <input type="hidden">
                                <button class="btn-success" type="submit">Perbaharui</button>
                                <a href="{{'/siswa'}}" class="btn btn-danger  btn-sm">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>