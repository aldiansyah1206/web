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

                    <form class="row g-2" method="POST" action="{{ route('pembina.store') }}">
                        @csrf
                    
                        <div class="col-md-12 p-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    
                        <div class="col-md-6 p-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    
                        <div class="col-md-6 p-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        
                        <div class="col-md-6 p-3">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role_id" required>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="col-md-6 p-3">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="p">Perempuan</option>
                                <option value="l">Laki-laki</option>
                            </select>
                        </div>
                    
                        <div class="col-md-6 p-3">
                            <label for="no_hp">No HP</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp">
                        </div>
                    
                        <div class="col-md-6 p-3">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                    
                        <div class="col-md-12 p-3">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                        </div>
                        <div class="col-md-12 p-3">
                            <div class="p-2">  
                                <input type="hidden">
                                <button class="btn btn-success" type="submit">Tambah</button>
                                <a href="{{'/siswa'}}" class="btn btn-danger">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
