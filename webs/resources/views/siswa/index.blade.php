<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <h4 class="text-bold">Data Siswa</h4>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a class="btn btn-success" href="{{ route("siswa.create") }}">+ Tambah</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Kegiatan</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">No Hp</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($siswa->count() > 0)
                                    @foreach ($siswa as $s)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $s->name ?? '-' }}</td>
                                            <td>{{ $s->email ?? '-' }}</td>
                                            <td>
                                                @foreach ($s->roles as $role)
                                                    {{ $role->name }}
                                                @endforeach
                                            </td>
                                            <td>{{ $s->kelas->name ?? '-' }}</td>
                                            <td>{{ $s->jurusan->name ?? '-' }}</td>
                                            <td>{{ $s->kegiatan->name }}</td>
                                            <td>{{ $s->jenis_kelamin ?? '-' }}</td>
                                            <td>{{ $s->no_hp ?? '-' }}</td>
                                            <td>
                                                @if($s->image)
                                                    <img src="{{ asset('images/' . $s->image) }}" alt="Gambar" width="50">
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{ $s->alamat ?? '-' }}</td>
                                            <td>
                                                <a href="{{"siswa/profil" }}" class="btn btn-primary btn-sm">Lihat</a>
                                                <a href="{{ route('siswa.edit', $s->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="11" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $siswa->links('pagination::simple-bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
