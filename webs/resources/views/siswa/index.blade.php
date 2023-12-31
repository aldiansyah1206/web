<x-app-layout>
    <div class="row">
        <div class="col-lg-12"> 
            <h4 class="text-bold">Data Siswa</h4>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a class="btn btn-success"  href=" {{ route("siswa.create")  }}">Tambah</a>
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
                                <?php foreach ($siswa as $s): ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $s['nama']; ?></td>
                                        <td><?= $s['nama_lengkap']; ?></td>
                                        <td><?= $s['email']; ?></td>
                                        <td><?= $s['kelas']; ?></td>
                                        <td><?= $s['jurusan']; ?></td>
                                        <td><?= $s['jenis_kelamin']; ?></td>
                                        <td><?= $s['alamat']; ?></td>
                                        <td> 
                                        <a href="{{"siswa/profil" }}" class="btn btn-primary  btn-sm">Lihat</a> 
                                        <a class="btn btn-warning btn-sm ">Edit</a> 
                                        <a class="btn btn-danger btn-sm">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{ $siswa->links() }}
          </div>
    </div>
</x-app-layout>