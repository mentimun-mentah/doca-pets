<template>
  <div>
    <!-- Header -->
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
                    <a href="#"><i class="fas fa-paw"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Ubah Hewan</a></li>
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
                    <h3 class="mb-0">Informasi Hewan</h3>
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
                      </div><!-- /col-2 -->
                      <small class="text-danger text-left" v-if="errors.photo">
                        {{ errors.photo[0] }}
                      </small>
                    </div>
                    <!--/col-->
                  </div>
                  <!-- /row -->
                </div>
                <!--/form-group-->

                <div class="form-group">
                  <label>Jenis Hewan</label>
                  <select
                    class="form-control select-admin"
                    style="width: 200px;"
                    v-model="update_data.jenis"
                    :class="[errors.jenis ? 'is-invalid' : '']"
                  >
                    <option value="anjing">Anjing</option>
                    <option value="kucing">Kucing</option>
                  </select>
                  <small class="text-danger" v-if="errors.jenis">
                    {{ errors.jenis[0] }}
                  </small>
                </div>
                <!--/form-group-->

                <div class="form-group">
                  <label>Nama Hewan</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Anjing Golden"
                    v-model="update_data.nama"
                    :class="[errors.nama ? 'is-invalid' : '']"
                  />
                  <small class="text-danger" v-if="errors.nama">
                    {{ errors.nama[0] }}
                  </small>
                </div>
                <!--/form-group-->

                <div class="form-group">
                  <label>Deskripsi Hewan</label>
                  <wysiwyg v-model="update_data.deskripsi"/>
                  <small class="text-danger" v-if="errors.deskripsi">
                    {{ errors.deskripsi[0] }}
                  </small>
                </div>
                <!--/form-group-->

                <button type="submit" class="btn btn-danger" @click="updatePet">
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
  </div>
</template>

<script>
export default {
  props: ['pet', 'storage'],
  data(){
    return {
      url_photo: null,
      update_data: {
        nama: null,
        photo: null,
        deskripsi: null,
        jenis: null
      },
      errors: []
    }
  },
  methods:{
    changePhoto(e) {
      this.update_data.photo = e.target.files[0];
      this.url_photo = URL.createObjectURL(this.update_data.photo);
    },
    updatePet(){
      let formData = new FormData();
      if(typeof this.update_data.photo !== 'string') formData.append("photo", this.update_data.photo);

      formData.append("id",this.pet.id)
      formData.append("nama", this.update_data.nama);
      formData.append("deskripsi", this.update_data.deskripsi);
      formData.append("jenis", this.update_data.jenis);

      const config = {
        headers: { "content-type": "multipart/form-data" }
      };

      axios.post('/admin/pet/update',formData,config).then(res => {
        location.reload();
      }).catch(err => {
        this.errors = err.response.data.errors;
      })
    }
  },
  mounted(){
    this.update_data.nama = this.pet.nama
    this.update_data.photo = this.pet.photo
    this.update_data.deskripsi = this.pet.deskripsi
    this.update_data.jenis = this.pet.jenis
  }
}
</script>
