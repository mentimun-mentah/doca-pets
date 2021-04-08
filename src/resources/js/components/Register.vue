<template>
  <div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a
                class="nav-link active"
                id="nav-home-tab"
                data-toggle="tab"
                href="#nav-home"
                role="tab"
                aria-controls="nav-home"
                aria-selected="true"
              >
                Pengguna
              </a>
              <a
                class="nav-link"
                id="nav-profile-tab"
                data-toggle="tab"
                href="#nav-profile"
                role="tab"
                aria-controls="nav-profile"
                aria-selected="false"
              >
                Dokter
              </a>
            </div>
          </nav>

          <div class="tab-content" id="nav-tabContent">
            <div
              class="tab-pane fade show active"
              id="nav-home"
              role="tabpanel"
              aria-labelledby="nav-home-tab"
            >
              <div class="card">
                <div class="card-body">
                  <form method="POST">

                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                      <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" required autofocus />
                      </div><!-- /col-md-6 -->
                    </div><!-- /form-group -->

                    <div class="form-group row">
                      <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                      <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" required />
                      </div><!-- /col-md-6 -->
                    </div><!-- /form-group -->

                    <div class="form-group row">
                      <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                      <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required />
                      </div><!-- /col-md-6 -->
                    </div><!-- /form-group -->

                    <div class="form-group row">
                      <label for="confirm_password" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                      <div class="col-md-6">
                        <input id="confirm_password" type="password" class="form-control" name="confirm_password" required />
                      </div><!-- /col-md-6 -->
                    </div><!-- /form-group -->

                    <div class="form-group row mb-0">
                      <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                          Register
                        </button>
                      </div>
                    </div>

                  </form>
                </div>
                <!-- /card-body -->
              </div>
              <!-- /card -->
            </div>
            <!-- /tab-pane -->

            <div
              class="tab-pane fade"
              id="nav-profile"
              role="tabpanel"
              aria-labelledby="nav-profile-tab"
            >
              <div class="card">
                <div class="card-body">
                  <form method="POST">

                    <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                      <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" required autofocus />
                      </div><!-- /col-md-6 -->
                    </div><!-- /form-group -->

                    <div class="form-group row">
                      <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                      <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" required />
                      </div><!-- /col-md-6 -->
                    </div><!-- /form-group -->

                    <div class="form-group row">
                      <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                      <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required />
                      </div><!-- /col-md-6 -->
                    </div><!-- /form-group -->

                    <div class="form-group row">
                      <label for="confirm_password" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                      <div class="col-md-6">
                        <input id="confirm_password" type="password" class="form-control" name="confirm_password" required />
                      </div><!-- /col-md-6 -->
                    </div><!-- /form-group -->

                    <div class="form-group row">
                      <label for="ktp" class="col-md-4 col-form-label text-md-right">Foto KTP</label>
                      <div class="col-md-6">
                        <div class="input-group custom-file-upload">
                          <input type="text" name="filename1" class="form-control bg-white" placeholder="No file selected" readonly>
                          <span class="input-group-btn">
                            <div class="btn btn-secondary custom-file-uploader">
                              <input type="file" name="file" onchange="this.form.filename1.value = this.files.length ? this.files[0].name : ''" />
                              Choose file
                            </div>
                          </span>
                        </div>
                      </div><!-- /col-md-6 -->
                    </div><!-- /form-group -->

                    <div class="form-group row">
                      <label for="ktp" class="col-md-4 col-form-label text-md-right">Ijazah / Sertifikat</label>
                      <div class="col-md-6">
                        <div class="input-group custom-file-upload">
                          <input type="text" name="filename2" class="form-control bg-white" placeholder="No file selected" readonly>
                          <span class="input-group-btn">
                            <div class="btn btn-secondary custom-file-uploader">
                              <input type="file" name="file" onchange="this.form.filename2.value = this.files.length ? this.files[0].name : ''" />
                              Choose file
                            </div>
                          </span>
                        </div>
                      </div><!-- /col-md-6 -->
                    </div><!-- /form-group -->

                    <div class="form-group row">
                      <label for="ktp" class="col-md-4 col-form-label text-md-right">Surat Ijin Praktek</label>
                      <div class="col-md-6">
                        <div class="input-group custom-file-upload hover-pointer">
                          <input type="text" name="filename3" class="form-control bg-white" placeholder="No file selected" readonly>
                          <span class="input-group-btn">
                            <div class="btn btn-secondary custom-file-uploader hover-pointer">
                              <input type="file" name="file" onchange="this.form.filename3.value = this.files.length ? this.files[0].name : ''" />
                              Choose file
                            </div>
                          </span>
                        </div>
                      </div><!-- /col-md-6 -->
                    </div><!-- /form-group -->
                    
                    <div class="form-group row mb-0">
                      <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                          Register
                        </button>
                      </div>
                    </div>

                  </form>
    
                </div>
                <!-- /card-body -->
              </div>
              <!-- /card -->
            </div>
            <!-- /tab-pane -->
          </div>
          <!-- /tab-content -->
        </div>
      </div>
    </div>
  </div>
</template>
<style>
.hover-pointer:hover {
  cursor: pointer!important;
}
.custom-file-uploader {
  position: relative;
  border-bottom-left-radius: 0px;
  border-top-left-radius: 0px;
  color: #495057;
  border-left-width: 0px;
  border-color: #ced4da;
  background-color: #e9ecef;
  cursor: pointer;
}
.custom-file-uploader:hover, .custom-file-uploader:focus, .custom-file-uploader:active {
  cursor: pointer;
  color: #495057!important;
  border-color: #ced4da!important;
  background-color: #e9ecef!important;
}
.custom-file-uploader input[type=file] {
  display: block;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 5;
  width: 100%;
  height: 100%;
  opacity: 0;
  cursor: default;
}
.custom-file-upload .form-control.bg-white {
  background-color: white!important;
}
</style>
