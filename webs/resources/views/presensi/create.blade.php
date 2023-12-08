<x-app-layout>
    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Siswa</h5>
              
            </div>
            <form action="{{ route("presensi.store") }}" method="POST">
              @method('POST')
              @csrf
                <thead>
                    <tr>
                        <th scope="col"class="text-center">No</th>
                        <th scope="col">Nama </th>
                        <th scope="col">Nama lengkap</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
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
                            <td><?= $s['password']; ?></td>
                            <td><?= $s['kelas_id']; ?></td>
                            <td><?= $s['jurusan_id']; ?></td>
                            <td><?= $s['jenis_kelamin']; ?></td>
                            <td><?= $s['alamat']; ?></td>
                            <td>aksi</td>
                        </tr>
                        <?php $no++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </form>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
</x-app-layout>
