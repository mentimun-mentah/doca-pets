<template>
  <div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <section class="mt-3 mb-4">
            <h2 class="text-center h4 mb-4">Profil Dokter</h2>
            <div class="card shadow">
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Nomor STR</label>
                    <input type="text" class="form-control" :placeholder="user.no_str" readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Spesialis</label>
                    <input 
                      required
                      type="text" 
                      class="form-control" 
                      v-model="update_data.spesialis" 
                      :class="[errors.spesialis ? 'is-invalid' : '']"
                    >
                    <small class="text-danger" v-if="errors.spesialis">
                      {{ errors.spesialis[0] }}
                    </small>
                  </div>
                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <wysiwyg v-model="update_data.deskripsi"/>
                  <small class="text-danger" v-if="errors.deskripsi">
                    {{ errors.deskripsi[0] }}
                  </small>
                </div>
                <div class="form-group">
                  <label>Nama Klinik</label>
                  <input 
                    required
                    type="text" 
                    class="form-control" 
                    v-model="update_data.nama_klinik" 
                    :class="[errors.nama_klinik ? 'is-invalid' : '']"
                  >
                  <small class="text-danger" v-if="errors.nama_klinik">
                    {{ errors.nama_klinik[0] }}
                  </small>
                </div>
                <div class="form-group">
                  <label>
                    Lokasi Klinik <i class="far fa-info-circle hover-pointer" data-toggle="modal" data-target="#staticBackdrop"></i>
                  </label>
                  <textarea 
                    required
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
                  <label>Pengalaman Praktik</label>
                  <div class="controls-praktik" v-for="(pengalaman,index) in update_data.pengalaman_praktik" :key="index">
                    <div class="entry-praktik input-group mb-2">
                      <input 
                        required
                        type="text" 
                        class="form-control" 
                        v-model="pengalaman.value" 
                        :class="[errors.pengalaman_praktik ? 'is-invalid' : '']"
                      />

                      <div 
                        class="input-group-append" 
                        v-if="(index + 1) == update_data.pengalaman_praktik.length"
                      >
                        <button class="btn btn-outline-secondary btn-add-praktik" type="button" @click="addPengalaman">
                          <i class="far fa-plus"></i>
                        </button>
                      </div><!--/input-group-append-->
                      <div class="input-group-append" v-else>
                        <button 
                          type="button" 
                          class="btn btn-outline-danger btn-remove-praktik" 
                          @click="deletePengalaman(index)"
                        >
                          <i class="far fa-minus"></i>
                        </button>
                      </div><!--/input-group-append-->
                       
                    </div><!-- /entry -->
                    <small class="text-danger" v-if="errors.pengalaman_praktik">
                      {{ errors.pengalaman_praktik[0] }}
                    </small>
                  </div><!-- /controls -->
                </div>

                <div class="form-group">
                  <label>Riwayat Pendidikan</label>
                  <div class="controls-riwayat" v-for="(item,index) in update_data.riwayat_pendidikan" :key="index">
                    <div class="entry-riwayat input-group mb-2">
                      <input 
                        required
                        type="text" 
                        name="fields[]" 
                        class="form-control" 
                        v-model="item.value" 
                        :class="[errors.riwayat_pendidikan ? 'is-invalid' : '']"
                      />

                      <div 
                        class="input-group-append" 
                        v-if="(index + 1) == update_data.riwayat_pendidikan.length"
                      >
                      <button class="btn btn-outline-secondary btn-add-praktik" type="button" @click="addPendidikan">
                        <i class="far fa-plus"></i>
                      </button>
                      </div><!--/input-group-append-->
                      <div class="input-group-append" v-else>
                        <button 
                          type="button" 
                          class="btn btn-outline-danger btn-remove-praktik" 
                          @click="deletePendidikan(index)"
                        >
                          <i class="far fa-minus"></i>
                        </button>
                      </div><!--/input-group-append-->

                    </div><!-- /entry -->
                    <small class="text-danger" v-if="errors.riwayat_pendidikan">
                      {{ errors.riwayat_pendidikan[0] }}
                    </small>
                  </div><!-- /controls -->
                </div>
                 <div class="form-row">
                  <div class="form-group col-md-6 col-sm-12">
                    <label class="d-block">Sertifikat</label>
                    <img
                      class="img-fluid w-100 rounded obj-fit-cover img-thumbnail img-doctor-letter" alt="animal"
                      :src="storage + '/' + user.sertif"
                      style="height: 30vh;"
                      data-toggle="modal" data-target="#modal-sertif"
                    >
                  </div>
                  <div class="form-group col-md-6 col-sm-12">
                    <label class="d-block">Surat Izin</label>
                    <img
                      class="img-fluid w-100 rounded obj-fit-cover img-thumbnail img-doctor-letter" alt="animal"
                      :src="storage + '/' + user.surat_izin"
                      style="height: 30vh;"
                      data-toggle="modal" data-target="#modal-surat-izin"
                    >
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block" @click="updateProfile">Simpan</button>
              </div><!-- /card-body -->
            </div><!-- /card -->
          </section>
        </div><!-- /col -->
      </div><!-- /row -->
    </div><!-- /container -->

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
                dan cari alamat klinik.
              </li>
              <li>Klik share/bagikan pada bagian disebelah kiri detail informasi tempat lokasi.</li>
              <li>Pilih Embed a map/Sematkan peta.</li>
              <li>Klik Copy HTML/Salin HTML.</li>
              <li>Lalu paste/tempel pada form Lokasi Klinik.</li>
            </ol>
          </div><!-- /modal-body-->
        </div>
      </div>
    </div>
    <!-- Modal Lokasi -->

    <!-- Modal Sertifikat -->
    <div class="modal fade" id="modal-sertif" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <div class="modal-body p-0">
            <img :src="storage + '/' + user.sertif" alt="" style="width:100%">
          </div>
          <center class="p-2">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
          </center>
        </div>
      </div>
    </div>
    <!-- Modal Sertifikat -->

    <!-- Modal Surat izin -->
    <div class="modal fade" id="modal-surat-izin" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <div class="modal-body p-0">
            <img :src="storage + '/' + user.surat_izin" alt="" style="width:100%">
          </div>
          <center class="p-2">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
          </center>
        </div>
      </div>
    </div>
    <!-- Modal Surat izin -->

  </div>
</template>
<script>
export default {
  props: ['user','storage'],
  data(){
    return {
      update_data: {
        spesialis: null,
        deskripsi: null,
        nama_klinik: null,
        lokasi: null,
        pengalaman_praktik: [
          {
            value: ''
          }
        ],
        riwayat_pendidikan: [
          {
            value: ''
          }
        ]
      },
      errors: []
    }
  },
  methods: {
    updateProfile(){
      const pengalaman_praktik = this.update_data.pengalaman_praktik.map(x => x.value).join(',')
      const riwayat_pendidikan = this.update_data.riwayat_pendidikan.map(x => x.value).join(',')
      const data = {
        id: this.user.id,
        spesialis: this.update_data.spesialis,
        deskripsi: this.update_data.deskripsi,
        nama_klinik: this.update_data.nama_klinik,
        lokasi: this.update_data.lokasi,
        pengalaman_praktik: pengalaman_praktik,
        riwayat_pendidikan: riwayat_pendidikan
      }
  
      axios.post('/doctor/profile/update', data).then(res => {
        location.reload();
      }).catch(err => {
        this.errors = err.response.data.errors;
      })
    },
    addPengalaman(){
      this.update_data.pengalaman_praktik.push({value: ''})
    },
    deletePengalaman(index){
      this.update_data.pengalaman_praktik.splice(index, 1)
    },
    addPendidikan(){
      this.update_data.riwayat_pendidikan.push({value: ''})
    },
    deletePendidikan(index){
      this.update_data.riwayat_pendidikan.splice(index, 1)
    }
  },
  mounted() {
    this.update_data.spesialis = this.user.spesialis
    this.update_data.deskripsi = this.user.deskripsi
    this.update_data.nama_klinik = this.user.nama_klinik
    this.update_data.lokasi = this.user.lokasi
    this.update_data.pengalaman_praktik = this.user.pengalaman_praktik.split(",").map(x => {return {value: x}})
    this.update_data.riwayat_pendidikan = this.user.riwayat_pendidikan.split(",").map(x => {return {value: x}})
  }
};
</script>
