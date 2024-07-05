<x-app-layout>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-primary text-white ">
                    <h4 class="card-title">Edit Nama Jurusan</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route("jurusan.update", $jurusan) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="p-1">
                            <label for="" class="form-label">Nama Jurusan</label>
                            <input value={{ $jurusan->name}} type="text"  name="name" id="name" class="form-control"onfocus="this.oldvalue = this.value;" onchange="onChangeTest(this);this.oldvalue = this.value;"  />
                        </div>
                        <div class="p-2">  
                            <input type="hidden">
                            <button type="submit">Perbarui</button>
                            <a href="{{'/jurusan'}}" class="btn btn-danger  btn-sm">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
