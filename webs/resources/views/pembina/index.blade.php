<x-app-layout>
    <div class="row">
        <div class="col-lg-12"> 
            <h4 class="text-bold">Data Pembina</h4>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a class="btn btn-success"  href=" {{ route("pembina.create")  }}">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col"class="text-center">No</th>
                                    <th scope="col">Nama </th>
                                    <th scope="col">Nama lengkap</th>
                                    <th scope="col">Email</th> </th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $current_page = $pembina->currentPage(); ?>
                                <?php $per_page = $pembina->perPage(); ?>
                                <?php $no = 1 + ($per_page * ($current_page - 1)); ?>
                                <?php foreach ($pembina as $p): ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $p['nama']; ?></td>
                                        <td><?= $p['nama_lengkap']; ?></td>
                                        <td><?= $p['email']; ?></td>
                                        <td> 
                                        <a href="{{"pembina/profil" }}" class="btn btn-primary">Lihat</a> 
                                        <a class="btn btn-warning ">Edit</a> 
                                        <a class="btn btn-danger ">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $pembina->links() }}
          </div>
    </div>
</x-app-layout>