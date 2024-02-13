<x-app-layout>      
    <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
                <h5 class="text-justify">Gambar Profil</h5>
                <hr>
              <img src="img/undraw_profile.svg" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h6 class="my-3">JPG atau PNG tidak lebih dari 5Mb </h6>

              <div class="input-group mb-3">
                <input type="file" class="form-control" id="inputGroupFile01">
              </div>
            </div>

          </div>
        </div>
        <div class="col-lg-8">
          <div class="card mb-3">
            <div class="card-body">
                <div>
                    <p class="mb-3">Detail Data {{ Auth::user()->name }}</p>
                </div>
                  <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-3">Nama Lengkap </p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-3">: {{ Auth::user()->name}}</p>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-3">Nama</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-3">: {{ Auth::user()->name }}</p>
                </div>
            </div>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-3">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-3">: {{ Auth::user()->email }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</x-app-layout>
