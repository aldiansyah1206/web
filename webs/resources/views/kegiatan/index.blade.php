<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <h4 class="text-bold">Kegiatan</h4>
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <a class="btn btn-success my-3 mt-2" href="{{ route('kegiatan.create') }}">+Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col">Nama Kegiatan</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $current_page = $kegiatan->currentPage();
                                    $per_page = $kegiatan->perPage();
                                    $no = 1 + $per_page * ($current_page - 1);
                                @endphp
                                @if($kegiatan->count() > 0)
                                    @foreach ($kegiatan as $keg)
                                        <tr>
                                            <td class="text-center">{{ $no }}</td>
                                            <td>{{ $keg->name }}</td>
                                            <td>{{ $keg->deskripsi }}</td>
                                            <td>
                                                <div class="p-2">
                                                    <div class="row">
                                                        <div>
                                                            <a class="btn btn-warning" href="{{ route("kegiatan.edit", $keg->id) }}">Edit</a>
                                                        </div>
                                                        <div>
                                                            <form action="{{ route("kegiatan.destroy", $keg->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @php $no++; @endphp
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada data.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        </div>
                    </div>
                {{ $kegiatan->links('pagination::simple-bootstrap-5') }}
            </div>
        </div>
    </div>
</x-app-layout>