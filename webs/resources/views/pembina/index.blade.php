<x-app-layout>
    <div class="row">
        <div class="col-lg-12"> 
            <h4 class="text-bold">Data Pembina</h4>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a class="btn btn-success"  href="{{ route('pembina.create') }}" >+Tambah</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col"class="text-center">No</th>
                                    <th scope="col">Nama </th>
                                    <th scope="col">Email</th> 
                                    <th scope="col">Role</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">No Hp</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                <tbody>
                                    <?php $current_page = $pembina->currentPage(); ?>
                                    <?php $per_page = $pembina->perPage(); ?>
                                    <?php $no = 1 + ($per_page * ($current_page - 1)); ?>
                                    @if($pembina->count() > 0)
                                        @foreach ($pembina as $p)
                                            @if($p)
                                                <tr>
                                                    <td>{{ $no }}</td>
                                                    <td>{{ $p->name}}</td>
                                                    <td>{{ $p->email ? $p->email : '-' }}</td>
                                                    <td>{{ $p->role?->name?? '-' }}</td>
                                                    <td>{{ $p->jenis_kelamin }}</td>
                                                    <td>{{ $p->no_hp ? $p->no_hp: '-' }}</td>
                                                    <td>
                                                        @if($p->gambar)
                                                            <img src="{{ asset('storage/' . $p->gambar) }}" alt="Gambar" width="50" height="50">
                                                        @else
                                                            <p>Tiada gambar</p>
                                                        @endif
                                                    </td>
                                                    <td>{{ $p->alamat ? $p->alamat : '-' }}</td>
                                                    <td>
                                                        <a href="{{"pembina/profil" }}" class="btn btn-primary  btn-sm">Lihat</a>
                                                        <a class="btn btn-warning btn-smb" href="{{ route("pembina.edit", $p->id) }}">Edit</a>
                                                        <div>
                                                            <form action="{{ route("pembina.destroy", $p->id) }}" method="POST">
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
                            </thead>
                        </table>
                    </div>
                </div>
                {{ $pembina->links() }}
            </div>
        </div>
    </div>

</x-app-layout>