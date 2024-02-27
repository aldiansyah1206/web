<x-app-layout>
    <div class="row">
        <div class="col-lg-12"> 
            <h4 class="text-bold">Data Siswa</h4>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a class="btn btn-success"  href=" {{ route("siswa.create") }}">+Tambah</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col"class="text-center">No</th>
                                    <th scope="col">Nama </th>
                                    <th scope="col">Email</th> </th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $current_page = $siswa->currentPage(); ?>
                                <?php $per_page = $siswa->perPage(); ?>
                                <?php $no = 1 + ($per_page * ($current_page - 1)); ?>
                                @if($siswa->count() > 0)
                                    @foreach ($siswa as $s)
                                        @if($s)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $s->nama ? $s->nama : '-' }}</td>
                                                <td>{{ $s->email ? $s->email : '-' }}</td>
                                                <td>{{ $s->kelas ? $s->kelas->nama : '-' }}</td>
                                                <td>{{ $s->jurusan ? $s->jurusan->nama : '-' }}</td>
                                                <td>{{ $s->jenis_kelamin ? $s->jenis_kelamin : '-' }}</td>
                                                <td>{{ $s->alamat ? $s->alamat : '-' }}</td>
                                                <td>
                                                    <a href="{{"siswa/profil" }}" class="btn btn-primary  btn-sm">Lihat</a>
                                                    <a class="btn btn-warning btn-smb" href="{{ route("siswa.edit", $s->id) }}">Edit</a>
                                                    <div>
                                                        <form action="{{ route("siswa.destroy", $s->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-smb">Hapus</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td colspan="8" class="text-center">Data kosong</td>
                                            </tr>
                                        @endif
                                        <?php $no++; ?>
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
                {{ $siswa->links('pagination::simple-bootstrap-5')}}
            </div>
        </div>
    </div>

</x-app-layout>