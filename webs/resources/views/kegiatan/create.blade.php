<x-app-layout>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-primary text-white ">
                    <h4 class="card-title">Tambah Data Kegiatan</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('kegiatan.store') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-1">
                                    <label for="" class="form-label">Nama Kegiatan</label>
                                    <input type="text" name="nama" id="nama" class="form-control" required>
                                </div>
                                <div class="p-1">
                                    <label for="" class="form-label">Daftar Siswa</label>

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th scope="col"class="text-center">No</th>
                                                    <th scope="col">Nama </th>
                                                    <th scope="col">Kelas</th>
                                                    <th scope="col">Jurusan</th>
                                                    <th scope="col"class="text-center"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($siswa->count() > 0)
                                                    @foreach ($siswa as $s)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $s->nama ? $s->nama : '-' }}</td>
                                                            <td>{{ $s->kelas ? $s->kelas->nama : '-' }}</td>
                                                            <td>{{ $s->jurusan ? $s->jurusan->nama : '-' }}</td>
                                                            <td>
                                                                <input type="checkbox" name="siswa[]" value="{{ $s->id }}" />
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="8" class="text-center">Tidak ada data</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="p-2">
                                    <input type="hidden">
                                    <button class="btn btn-success" type="submit">Tambah</button>
                                    <a href="{{ '/kelas' }}" class="btn btn-danger  btn-sm">Batal</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
