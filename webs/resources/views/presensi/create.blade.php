<x-app-layout>
    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Presensi</h5>
              
            </div>
            <form action="{{ route("presensi.store") }}" method="POST">
              @method('POST')
              @csrf
                <thead>
                    <tr>
                        <th scope="col"class="text-center">No</th>
                        <th scope="col">Nama </th>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Kelas</th>
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
