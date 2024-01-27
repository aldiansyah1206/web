<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Kegiatan</h3>
                        <a href="{{ route('kegiatan.create') }}" class="btn btn-primary float-right">+Tambah</a>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tgl Mulai</th>
                                    <th>Tgl Selesai</th>
                                    <th>Keterangan</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kegiatan as $k)
                                    <tr>
                                        <td>{{ $k->id }}</td>
                                        <td>{{ $k->tgl_mulai }}</td>
                                        <td>{{ $k->tgl_selesai }}</td>
                                        <td>{{ $k->keterangan }}</td>
                                        <td>
                                            <a href="{{ route('kegiatan.show', $k->id) }}" class="btn btn-primary btn-sm">Lihat</a>
                                            <a href="{{ route('kegiatan.edit', $k->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('kegiatan.destroy', $k->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this kegiatan?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>