<template>
  <div>
    <div class="container">
      <section class="mt-3">
        <h2 class="text-center h3 mb-3">Daftar Dokter</h2>
        <div class="row justify-content-center" v-if="doctorData.data && doctorData.data.length > 0">
          <div class="col-lg-10" v-for="doctor in doctorData.data" :key="doctor.id">
            <div class="card mb-3">
              <div class="row no-gutters">
                <div class="col-2">
                  <img
                    :src="storage + '/' + doctor.user.avatar"
                    class="card-img img-doctor img"
                    alt="profile"
                  />
                </div>
                <div class="col-md-10">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <h5 class="card-title font-weight-bold">
                          dr. {{doctor.user.fullname ? doctor.user.fullname : doctor.user.name}}
                        </h5>
                        <table>
                          <tr>
                            <td><i class="far fa-hospital-alt mr-2"></i></td>
                            <td>{{doctor.nama_klinik ? doctor.nama_klinik : '-'}}</td>
                          </tr>
                          <tr>
                            <td><i class="far fa-stethoscope mr-2"></i></td>
                            <td>{{doctor.spesialis ? 'Spesialis ' + doctor.spesialis : '-'}}</td>
                          </tr>
                          <tr>
                            <td><i class="far fa-address-card mr-2"></i></td>
                            <td>{{doctor.no_str}}</td>
                          </tr>
                        </table>
                      </div>
                      <!-- /col-9 -->
                      <div class="col-3 border-left text-center">
                        <h6 class="font-weight-bold">Ulasan Dokter</h6>
                        <p class="user-select-none">
                        <i class="fas fa-thumbs-up text-primary"></i> ({{doctor.total_like}})
                        </p>
                        <a
                          class="btn btn-outline-secondary btn-sm btn-block"
                          :href="home + '/doctor/' + doctor.id"
                          role="button"
                          >Detail</a
                        >
                      </div>
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /card-body -->
                </div>
              </div>
            </div>
          </div>
          <!-- /col -->
        </div><!--/row-->

        <div class="row justify-content-md-center mt-3" v-else>
          <div class="col-12">
            <div class="card shadow-none text-center pt-5 pb-5 border-0" style="background-color:transparent;">
              <div class="card-body text-black-50">
                <i class="fal fa-box-open fa-4x"></i>
                <p class="font-weight-bold mt-1">Data tidak tersedia.</p>
              </div>
            </div>
          </div>
        </div><!-- /row -->
      </section>

      <div class="mt-5">
        <pagination
          :data="doctorData"
          :limit="2"
          :align="'center'"
          @pagination-change-page="getResults"
        ></pagination>
      </div><!--/row-->
    </div>
    <!-- /container -->
  </div>
</template>

<script>
export default {
  props: ["home","storage"],
  data(){
    return{
      url: '/doctor/all-doctor',
      doctorData: {}
    }
  },
  methods:{
    getResults(page = 1) {
      axios.get(`${this.url}?page=${page}`).then(res => {
        this.doctorData = res.data;
      });
    },
  },
  mounted() {
    this.getResults();
  }
};
</script>
<style>
.img-doctor {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  margin-right: 19px;
  margin-left: 19px;
  margin-top: 19px;
  object-fit: cover;
}
</style>
