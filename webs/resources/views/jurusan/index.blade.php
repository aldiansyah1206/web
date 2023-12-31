<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <h4 class="text-bold">Jurusan</h4>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a class="btn btn-success" href="{{ route('jurusan.create') }}">Tambah</a> 
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col"class="text-center">No</th>
                                    <th scope="col">Nama Jurusan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $current_page = $jurusan->currentPage(); ?>
                                <?php $per_page = $jurusan->perPage(); ?>
                                <?php $no = 1 + $per_page * ($current_page - 1); ?>
                                <?php foreach ($jurusan as $j): ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $j['nama'] ?></td>
                                    <td>
                                        <a class="btn btn-warning  btn-sm" href="{{ route("jurusan.edit", $j) }}">Edit</a>
                                        <a class="btn btn-danger  btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal{{$j->id}}">Hapus</a>

                                        <div class="modal fade" id="deleteModal{{$j->id}}" tabindex="-1" aria-labelledby="deleteModalLabel{{$j->id}}" aria-hidden="true">
                                            <!-- Konten modal konfirmasi penghapusan -->
                                        </div>

                                    </td>
                                </tr>
                                <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $jurusan->links('pagination::simple-bootstrap-5') }}
            </div>
        </div>
    </div>

</x-app-layout>
