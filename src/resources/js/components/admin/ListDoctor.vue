<template>
  <div>
    <Toasts></Toasts>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center justify-content-between py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-user-md"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">List Dokter</a></li>
                </ol>
              </nav>
            </div><!-- /col -->
          </div><!-- /row -->

          <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-4">
              <div class="form-group mb-4">
                <select id="inputState" class="form-control" v-model="status">
                  <option value="all">Semua</option>
                  <option value="waiting">Menunggu</option>
                  <option value="accept">Diterima</option>
                  <option value="reject">Ditolak</option>
                </select>
              </div>
            </div>
          </div><!-- /row -->

        </div><!-- /header-body -->
      </div><!-- /container-fluid -->
    </div><!-- /header -->

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="header-body">
        <div class="row" v-if="doctorData.data && doctorData.data.length > 0">

          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 m-b-20" v-for="doctor in doctorData.data" :key="doctor.id">
            <div class="card">
              <div class="card-body text-center">
                <a href="#"><h4 class="card-title">dr. {{doctor.user.name}}</h4></a>
                <p class="card-text mt--3 truncate-3 mb-0" style="font-size: 14px;">
                {{doctor.user.email}}
                </p>
                <p class="card-text truncate-3 mb-2" style="font-size: 14px;">
                <b>No STR: </b>{{doctor.no_str}}
                </p>
                <div class="row">
                  <div class="col-6">
                    <img
                      alt="Seritfikat"
                      class="img-thumbnail img-doctor-letter"
                      style="width: 100px; height: 100px; object-fit: cover;"
                      :src="storage + '/' + doctor.sertif"
                      data-toggle="modal" :data-target="'#staticBackdrop' + doctor.id"
                    >
                    <p class="mb-0">
                      <small>Sertifikat</small>
                    </p>
                  </div><!-- /col -->
                  <div class="col-6">
                    <img
                      alt="Surat Izin"
                      class="img-thumbnail img-doctor-letter"
                      style="width: 100px; height: 100px; object-fit: cover;"
                      :src="storage + '/' + doctor.surat_izin"
                      data-toggle="modal" :data-target="'#surat-izin' + doctor.id"
                    >
                    <p class="mb-0">
                      <small>Surat Izin</small>
                    </p>
                  </div><!-- /col -->
                </div><!-- /row -->
                <span class="badge badge-success mt-3 py-2" role="alert" v-if="doctor.status == 'accept'">Diterima</span>
                <span class="badge badge-danger mt-3 py-2" role="alert" v-if="doctor.status == 'reject'">Ditolak</span>
                <center class="mt-3" v-if="doctor.status == 'waiting'">
                  <button class="btn btn-success btn-sm m-r-0" @click="acceptDoctor(doctor.id)">Terima</button>
                  <button class="btn btn-danger btn-sm" @click="rejectDoctor(doctor.id)">Tolak</button>
                </center>
              </div><!--/card-body-->
            </div><!--/card-->

            <!-- Modal -->
            <div class="modal fade" :id="'staticBackdrop' + doctor.id" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                  <div class="modal-body p-0">
                    <img :src="storage + '/' + doctor.sertif" alt="" style="width:100%">
                  </div>
                  <center class="p-2">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                  </center>
                </div>
              </div>
            </div>

            <div class="modal fade" :id="'surat-izin' + doctor.id" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                  <div class="modal-body p-0">
                    <img :src="storage + '/' + doctor.surat_izin" alt="" style="width:100%">
                  </div>
                  <center class="p-2">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                  </center>
                </div>
              </div>
            </div>
            <!-- Modal -->

          </div><!--/col-xl-3-->

        </div><!-- /row -->

        <div class="row justify-content-md-center mt-5" v-else>
          <div class="col-12">
            <div class="card shadow-none text-center pt-5 pb-5" style="background-color:transparent;">
              <div class="card-body mt-5 text-gray">
                <i class="fal fa-box-open fa-3x mt-5"></i>
                <p class="font-weight-bold mt-1">Data tidak tersedia.</p>
              </div>
            </div>
          </div>
        </div><!-- /row -->

      </div><!-- /header-body -->

      <pagination :data="doctorData" :limit="2" :align="'center'" @pagination-change-page="getResults"></pagination>

    </div><!-- /container-fluid -->

  </div>
</template>
<script>
export default {
  props: ['storage'],
  data(){
    return {
      url: '/admin/doctor/all-doctor',
      doctorData: {},
      status: 'all',
      status_q: ''
    }
  },
  methods:{
    getResults(page = 1){
      axios.get(`${this.url}?page=${page}&status=${this.status_q}`).then(res => {
        this.doctorData = res.data
      })
    },
    acceptDoctor(id){
      axios.put(`/admin/doctor/accept/${id}`).then(res => {
        this.$toast.success(res.data.status);
        this.getResults()
      })
    },
    rejectDoctor(id){
      axios.put(`/admin/doctor/reject/${id}`).then(res => {
        this.$toast.success(res.data.status);
        this.getResults()
      })
    }
  },
  watch:{
    status(val){
      if(val != 'all'){
        this.status_q = this.status
        this.getResults()
      }else{
        this.status_q = ''
        this.getResults()
      }
    }
  },
  mounted(){
    this.getResults()
  }
}
</script>
<style>
.img-doctor-letter {
  cursor: pointer;
  transition: 0.2s;
}
.img-doctor-letter:hover {
  opacity: .7;
}
</style>
