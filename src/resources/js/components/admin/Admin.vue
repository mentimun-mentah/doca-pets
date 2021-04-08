<template>
  <div>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-paw"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Tambah Hewan</a></li>
                </ol>
              </nav>
            </div><!-- /col -->
          </div><!-- /row -->
        </div><!-- /header-body -->
      </div><!-- /container-fluid -->
    </div><!-- /header -->

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="header-body">
        <div class="row">
          <div class="col-xl-12 mb-12 mb-xl-12">

            <div class="card shadow">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">
                    <h3 class="mb-0">Informasi Hewan</h3>
                  </div><!-- /col -->
                </div><!--/ row -->
              </div><!--/card-header-->

              <div class="card-body">
                <form>
                  <div class="form-group mt-4">
                    <div class="row">
                      <div class="col-xl-2 col-lg-2 text-center">
                        <div class="card m-l-r-auto upload-img">
                          <img id="image-preview"
                            class="card-img-top img-fit upload-img p-t-4 p-r-4 p-b-4 p-l-4"
                            src="https://socialistmodernism.com/wp-content/uploads/2017/07/placeholder-image.png"
                            alt="Card image cap"
                          >
                        </div><!--/card-->

                        <div class="file-btn btn btn-sm button border">
                          Upload
                          <input type="file" class="fileupload" name="file" accept="image/*" />
                        </div>

                      </div><!--/col-->
                    </div><!-- /row -->
                  </div><!--/form-group-->

                  <div class="form-group">
                    <label>Jenis Hewan</label>
                    <select class="form-control" style="width: 200px;">
                      <option value="1">Anjing</option>
                      <option value="2">Kucing</option>
                    </select>
                  </div><!--/form-group-->

                  <div class="form-group">
                    <label>Nama Hewan</label>
                    <input type="text" class="form-control" placeholder="Anjing Golden">
                  </div><!--/form-group-->

                  <div class="form-group">
                    <label>Deskripsi Hewan</label>
                    <wysiwyg v-model="myHTML" />
                  </div><!--/form-group-->

                  <button type="submit" class="btn btn-danger">Simpan</button>

                </form>
              </div><!--/card-body -->

            </div><!--/card shadow -->
          </div><!-- /col-xl-12 mb-12 mb-xl-12 -->
        </div><!-- /row -->
      </div><!-- /header-body -->
    </div><!-- /container-fluid -->

  </div>
</template>
<script>
export default {
  data() {
    return {
      myHTML: ""
    };
  }
};
</script>
