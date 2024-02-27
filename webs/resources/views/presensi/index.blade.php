<x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Presensi</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('presensi.store') }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="nama_siswa" class="col-md-4 col-form-label text-md-right">Nama Siswa</label>
    
                                <div class="col-md-6">
                                    <input id="nama_siswa" type="text" class="form-control @error('nama_siswa') is-invalid @enderror" name="nama_siswa" value="{{ old('nama_siswa') }}" required autocomplete="nama_siswa" autofocus>
    
                                    @error('nama_siswa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="tanggal" class="col-md-4 col-form-label text-md-right">Tanggal</label>
    
                                <div class="col-md-6">
                                    <input id="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal') }}" required autocomplete="tanggal" autofocus>
    
                                    @error('tanggal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="kehadiran" class="col-md-4 col-form-label text-md-right">Kehadiran</label>
    
                                <div class="col-md-6">
                                    <select id="kehadiran" class="form-control @error('kehadiran') is-invalid @enderror" name="kehadiran" required autocomplete="kehadiran" autofocus>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Izin">Izin</option>
                                        <option value="Alfa">Alfa</option>
                                    </select>
    
                                    @error('kehadiran')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>