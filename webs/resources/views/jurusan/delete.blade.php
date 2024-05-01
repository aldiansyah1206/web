<x-app-layout>
    <div class="modal fade" id="deleteModal{{$j->id}}" tabindex="-1" aria-labelledby="deleteModalLabel{{$j->id}}" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel{{$j->id}}">Konfirmasi Hapus</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Apakah Anda yakin ingin menghapus jurusan <strong>{{ $j->name }}</strong>?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <a class="btn btn-danger" href="{{ route("jurusan.delete", $j->id) }}">Hapus</a>
            </div>
          </div>
        </div>
      </div>
</x-app-layout>
