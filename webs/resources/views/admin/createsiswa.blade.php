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
                        <div class="col-md-12 p-3">
                                <label for="name" class="form-label">Nama Siswa</label>
                                <input type="text"  name="name"  class="form-control" required>
                        </div>
                        <div class="col-md-12 p-3">                        
                                <label for="email" class="form-label">Email</label>
                                <input type="text"  name="email"  class="form-control" required>
                        </div>
                        <div class="col-md-12 p-3">
                            <div class="form-group" >
                                <label for="password" class="form-label">Password</label>
                                <x-text-input id="password" placeholder="Password" class="form-control form-control-user"
                                                type="password" name="password" required autocomplete="current-password"/>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                        </div>
                        <br>
                        <div class="col-md-6 p-3">
                            <label for="no_hp" class="form-label">No Hp</label>
                            <input type="text"  name="no_hp"  class="form-control" required>
                        </div>
                        <br>
                        <div class="col-md-6 p-3">
                            <label for="kelas">Kelas</label>
                            <select class="form-control" id="kelas_id" name="kelas_id" required>
                                @foreach ($kelas as $k)
                                    <option value="{{ $k->id }}">{{ $k->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="col-md-6 p-3">
                            <label for="jurusan">Jurusan</label>
                            <select class="form-control" id="jurusan_id" name="jurusan_id" required>
                                @foreach ($jurusan as $j)
                                    <option value="{{ $j->id }}">{{ $j->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="col-md-6 p-3">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="p">Perempuan</option>
                                <option value="l">Laki-laki</option>
                            </select>
                        </div>
                        <br>
                        <div class="col-md-12 p-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" placeholder="Masukkan Alamat"  name="alamat" id="floatingTextarea2" style="height: 100px"></textarea>
                        </div>
                        <div class="col-md-12 p-3">
                                <input type="hidden">
                                <button class="btn-success" type="submit">Tambah</button>
                                <a href="{{'/siswa'}}" class="btn btn-danger  btn-sm">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>