<x-app-layout>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title">Edit Data Pembina</h4>
                </div>
                <div class="card-body">

                    <form class="row g-3" method="POST" action="{{ route('pembina.update', $pembina->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="col-md-12 p-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $pembina->name) }}" required>
                        </div>
                        
                        <div class="col-md-12 p-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $pembina->email) }}" required>
                        </div>
                        
                        <div class="col-md-4 p-3">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="p" {{ old('jenis_kelamin', $pembina->jenis_kelamin) == 'p' ? 'selected' : '' }}>Perempuan</option>
                                <option value="l" {{ old('jenis_kelamin', $pembina->jenis_kelamin) == 'l' ? 'selected' : '' }}>Laki-laki</option>
                            </select>
                        </div>
                        <div class="col-md-4 p-3">
                            <label for="kegiatan">Kegiatan</label>
                            <select class="form-control" id="kegiatan_id" name="kegiatan_id" required>
                                <option value="">Pilih Kegiatan </option>
                                @foreach ($kegiatan as $keg)
                                    <option value="{{ $keg->id }}" {{ old('kegiatan_id', $pembina->kegiatan_id) == $keg->id ? 'selected' : '' }}>{{ $keg->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 p-3">
                            <label for="no_hp">No HP</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp', $pembina->no_hp) }}">
                        </div>
                        
                        <div class="col-md-12 p-3">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" required>{{ old('alamat', $pembina->alamat) }}</textarea>
                        </div>
                        <div class="col-md-12 p-3">
                            <button class="btn btn-success" type="submit">Update</button>
                            <a href="{{ route('pembina.index') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
