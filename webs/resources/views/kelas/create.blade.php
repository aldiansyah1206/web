<x-app-layout>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header bg-primary text-white ">
                            <h4 class="card-title">Tambah Data Kelas</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route("kelas.store") }}" method="POST">
                                @method('POST')
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="p-1">
                                                    <label for="" class="form-label">Nama Kelas</label>
                                                    <input type="text"  name="name" id="name" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="p-2">  
                                                    <input type="hidden">
                                                    <button class="btn btn-success" type="submit">Tambah</button>
                                                    <a href="{{'/kelas'}}" class="btn btn-danger  btn-sm">Batal</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</x-app-layout>