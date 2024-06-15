<x-app-layout>
   
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                @if($errors->any())
                <div class="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                       <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-header bg-primary text-white ">
                    <h4 class="card-title">Tambah Data Siswa</h4>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="{{ route('siswa.store') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="col-md-12">
                            <div class="p-3">
                                <label for="" class="form-label">Nama Siswa</label>
                                <input type="text"  name="name"  class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="p-3">
                                <label for="" class="form-label">Email</label>
                                <input type="text"  name="email"  class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3">
                                <div class="form-group" >
                                    <label for="" class="form-label">Password</label>
                                    <x-text-input id="password" placeholder="Password" class="form-control form-control-user"
                                                    type="password"
                                                    name="password"
                                                    required autocomplete="current-password" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-6">
                            <div class="p-3">
                                <label for="" class="form-label">No Hp</label>
                                <input type="text"  name="no_hp"  class="form-control" required>
                            </div>
                        </div>
                            <div class="col-md-4">
                                <div class="p-3">
                                <label for="" class="form-label">Kelas</label>
                                <div>
                                    <select class="form-select" name="kelas_id">
                                        <option selected>Pilih...</option>
                                        <?php foreach ($kelas as $k): ?>
                                            <option value="{{ $k->id }}">{{ $k->name }}</option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-4">
                                <div class="p-3">
                                <label for="" class="form-label">Jurusan</label>
                                <div>
                                    <select class="form-select" name="jurusan_id" >
                                        <option selected>Pilih...</option>
                                        <?php foreach ($jurusan as $j): ?>
                                            <option value="{{ $j->id }}">{{ $j->name }}</option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                </div>
                            </div>
    
                            <div class="col-md-4">
                                <div class="p-3">
                                    <label for="" class="form-label">Jenis Kelamin</label>
                                    <div>
                                    <select id="jenis_kelamin" name="jenis_kelamin" id="jenis_kelamin"class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-2sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>Pilih...</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    </div>
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
                                <button class="btn-success" type="submit">Tambah</button>
                                <a href="{{'/siswa'}}" class="btn btn-danger  btn-sm">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>