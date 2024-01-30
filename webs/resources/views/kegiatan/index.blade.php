<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <h4 class="text-bold">Kelas</h4>
            <div class="card shadow mb-4">
                <div class="card-header py-2">
                    <a class="btn btn-success my-3 mt-2" href="{{ route('kegiatan.create') }}">+Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col"class="text-center">No</th>
                                        <th scope="col">Nama Kegiatan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $current_page = $kegiatan->currentPage(); ?>
                                    <?php $per_page = $kegiatan>perPage(); ?>
                                    <?php $no = 1 + $per_page * ($current_page - 1); ?>
                                    <?php foreach ($kegiatan as $keg): ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $keg['nama'] ?></td>
                                        <td>
                                            <div class="p-2">
                                                <div class="row">
                                                    <div>
                                                        <a class="btn btn-warning" href="{{ route("kelas.edit", $keg->id) }}">Edit</a>
                                                    </div>
                                                    <div>
                                                        <form action="{{ route('kelas.destroy', $keg->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                {{ $kegiatan->links('pagination::simple-bootstrap-5') }}
            </div>
        </div>
    </div>
</x-app-layout>