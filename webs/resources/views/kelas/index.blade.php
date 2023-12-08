<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <h4 class="text-bold">Kelas</h4>
            <a class="btn btn-success my-3 mt-2" href="{{ route('kelas.create') }}">Tambah</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col"class="text-center">No</th>
                        <th scope="col">Nama Kelas</th>
                        <th scope="col">Nama Jurusan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $current_page = $kelas->currentPage(); ?>
                    <?php $per_page = $kelas->perPage(); ?>
                    <?php $no = 1 + $per_page * ($current_page - 1); ?>
                    <?php foreach ($kelas as $k): ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $k['nama'] ?></td>
                        <td><?= $k->jurusan->nama ?></td>
                        <td>
                            <a class="btn btn-warning" href="{{ route("kelas.edit", $k) }}">Edit</a>
                            <a class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php $no++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

            {{ $kelas->links() }}
        </div>
    </div>
</x-app-layout>
