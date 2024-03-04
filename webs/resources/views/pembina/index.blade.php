<x-app-layout>
    <div class="row">
        <div class="col-lg-12"> 
            <h4 class="text-bold">Data Pembina</h4>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a class="btn btn-success"  href="{{ route('pembina.create') }}" >+Tambah</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col"class="text-center">No</th>
                                    <th scope="col">Nama </th>
                                    <th scope="col">Email</th> </th>
                                    <th scope="col">No Hp</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                {{ $pembina->links('pagination::simple-bootstrap-5')}}
            </div>
        </div>
    </div>

</x-app-layout>