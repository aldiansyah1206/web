<x-app-layout>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-primary text-white ">
                    <h4 class="card-title">Tambah Data Jurusan</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('jurusan.store') }}" method="POST">
                        @method('POST')
                        @csrf

                        <div class="p-1"> 
                            <label for="" class="form-label">Nama Jurusan</label>
                            <input type="text"  name="nama" id="nama" class="form-control" required>
                        </div>
                            <div class="p-2">  
                                <input type="hidden">
                                <button class="btn btn-success" type="submit">Tambah</button>
                                <a href="{{'/jurusan'}}" class="btn btn-danger  btn-sm">Batal</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
