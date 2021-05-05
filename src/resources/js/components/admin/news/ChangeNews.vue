<template>
  <div>
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav
                aria-label="breadcrumb"
                class="d-none d-md-inline-block ml-md-4"
              >
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item">
                    <a href="#"><i class="fas fa-newspaper"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Kelola Berita</a></li>
                </ol>
              </nav>
            </div>
            <!-- /col -->
          </div>
          <!-- /row -->
        </div>
        <!-- /header-body -->
      </div>
      <!-- /container-fluid -->
    </div>
    <!-- /header -->

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="header-body">
        <div class="row">
          <div class="col-xl-12 mb-12 mb-xl-12">
            <div class="card shadow">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">
                    <h3 class="mb-0">Informasi Berita</h3>
                  </div>
                  <!-- /col -->
                </div>
                <!--/ row -->
              </div>
              <!--/card-header-->

              <div class="card-body">
                <div class="form-group mt-4">
                  <div class="row">
                    <div class="col-xl-12 col-lg-12">
                      <div class="col-2 text-center">
                        <div class="card m-l-r-auto upload-img mb-2">
                          <img
                            id="image-preview"
                            class="card-img-top img-fit upload-img p-t-4 p-r-4 p-b-4 p-l-4"
                            :src="url_photo ? url_photo : storage + '/' + update_data.photo"
                            alt="Card image cap"
                          />
                        </div>
                        <!--/card-->
                        <div class="file-btn btn btn-sm button border">
                          Upload
                          <input
                            type="file"
                            class="fileupload"
                            name="file"
                            accept="image/*"
                            @change="changePhoto"
                          />
                        </div>
                      </div><!--/col-2-->
                      <small class="text-danger text-left" v-if="errors.photo">
                        {{ errors.photo[0] }}
                      </small>

                    </div>
                    <!--/col-xl-12-->
                  </div>
                  <!-- /row -->
                </div>
                <!--/form-group-->

                <div class="form-group">
                  <label>Judul Berita</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Anjing hilang"
                    v-model="update_data.judul"
                    :class="[errors.judul ? 'is-invalid' : '']"
                  />
                  <small class="text-danger" v-if="errors.judul">
                    {{ errors.judul[0] }}
                  </small>
                </div>
                <!--/form-group-->
                
                <div class="form-group">
                  <label>
                    Lokasi Terakhir
                    <i class="far fa-info-circle hover-pointer" data-toggle="modal" data-target="#staticBackdrop"></i>
                  </label>
                  <textarea 
                    required
                    placeholder="Enter text..."
                    rows="1" 
                    class="form-control" 
                    v-model="update_data.lokasi" 
                    :class="[errors.lokasi ? 'is-invalid' : '']"
                  >
                  </textarea>
                  <small class="text-danger" v-if="errors.lokasi">
                    {{ errors.lokasi[0] }}
                  </small>
                </div>

                <div class="form-group">
                  <label>Deskripsi Berita</label>
                  <wysiwyg v-model="update_data.deskripsi"/>
                  <small class="text-danger" v-if="errors.deskripsi">
                    {{ errors.deskripsi[0] }}
                  </small>
                </div>
                <!--/form-group-->

                <button
                  type="submit"
                  class="btn btn-danger"
                  @click="updateNews"
                >
                  Simpan
                </button>
              </div>
              <!--/card-body -->
            </div>
            <!--/card shadow -->
          </div>
          <!-- /col-xl-12 mb-12 mb-xl-12 -->
        </div>
        <!-- /row -->
      </div>
      <!-- /header-body -->
    </div>
    <!-- /container-fluid -->

    <!-- Modal Lokasi -->
    <div
      class="modal fade"
      id="staticBackdrop"
      data-backdrop="static"
      data-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div
        class="modal-dialog"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Cara menambahkan lokasi</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <ol>
              <li>
                Buka halaman
                <a target="_blank" href="https://maps.google.com/">
                  Google Maps
                </a>
                dan cari lokasi terakhir hewan.
              </li>
              <li>Klik share/bagikan pada bagian disebelah kiri detail informasi tempat lokasi.</li>
              <li>Pilih Embed a map/Sematkan peta.</li>
              <li>Klik Copy HTML/Salin HTML.</li>
              <li>Lalu paste/tempel pada form Lokasi Terakhir.</li>
            </ol>
          </div><!-- /modal-body-->
        </div>
      </div>
    </div>
    <!-- Modal Lokasi -->

  </div>
</template>

<script>
export default {
  props: ['news','storage'],
  data(){
    return {
      url_photo: null,
      update_data: {
        judul: null,
        photo: null,
        deskripsi: null,
        lokasi: null
      },
      errors: []
    }
  },
  methods:{
    changePhoto(e) {
      this.update_data.photo = e.target.files[0];
      this.url_photo = URL.createObjectURL(this.update_data.photo);
    },
    updateNews(){
      let formData = new FormData();
      if(typeof this.update_data.photo !== 'string') formData.append("photo", this.update_data.photo);

      formData.append("id",this.news.id)
      formData.append("judul", this.update_data.judul);
      formData.append("deskripsi", this.update_data.deskripsi);
      formData.append("lokasi", this.update_data.lokasi);

      const config = {
        headers: { "content-type": "multipart/form-data" }
      };

      axios.post('/admin/news/update',formData,config).then(res => {
        location.reload();
      }).catch(err => {
        this.errors = err.response.data.errors;
      }) 
    }
  },
  mounted(){
    this.update_data.judul = this.news.judul;
    this.update_data.photo = this.news.photo;
    this.update_data.deskripsi = this.news.deskripsi;
    this.update_data.lokasi = this.news.lokasi;
  }
}
</script>
