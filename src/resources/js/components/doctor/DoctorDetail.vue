<template>
  <div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <section class="mt-3">
            <div class="media">
              <img 
                class="mr-3 img rounded-circle" 
                :src="storage + '/' + doctor.user.avatar" 
                alt="Generic placeholder image"
              >
              <div class="media-body">
                <h5 class="card-title font-weight-bold mb-1">
                  dr. {{doctor.user.fullname ? doctor.user.fullname : doctor.user.name}}
                  <span class="float-right font-weight-normal h6 user-select-none"> <i class="fas fa-thumbs-up text-primary"></i> ({{doctor.total_like}}) </span>
                </h5>
                <h5 class="card-title font-weight-bold text-secondary mb-1">{{doctor.spesialis ? 'Spesialis ' + doctor.spesialis : '-'}}</h5>
                <h6 class="card-title font-weight-bold text-secondary mb-0">{{doctor.no_str}}</h6>
                
              </div>
            </div>

            <hr />

            <div class="detail-dokter">
              <h6 class="h5 mb-2 font-weight-bold">Profile Dokter</h6>
              <div class="profile-content" v-html="doctor.deskripsi" v-if="doctor.deskripsi">
              </div><!-- /profile-content -->
              <div class="profile-content" v-else>-</div>
            </div><!-- /detail-dokter -->

            <div class="detail-dokter">
              <h6 class="h5 mb-2 font-weight-bold">Lokasi - {{doctor.nama_klinik ? doctor.nama_klinik : ''}}</h6>
              <div class="maps-doctor" v-html="doctor.lokasi" v-if="doctor.lokasi">
              </div>
              <div class="maps-doctor" v-else>-</div>
            </div><!-- /detail-dokter -->

            <div class="detail-dokter">
              <h6 class="h5 mb-2 font-weight-bold">Pengalaman Praktik</h6>
              <div class="card" v-if="doctor.pengalaman_praktik">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item" v-for="pengalaman in doctor.pengalaman_praktik.split(',')">{{pengalaman}}</li>
                </ul>
              </div>
              <div v-else>-</div>
            </div><!-- /detail-dokter -->

            <div class="detail-dokter">
              <h6 class="h5 mb-2 font-weight-bold">Riwayat Pendidikan</h6>
              <div class="card" v-if="doctor.riwayat_pendidikan">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item" v-for="riwayat in doctor.riwayat_pendidikan.split(',')">{{riwayat}}</li>
                </ul>
              </div>
              <div v-else>-</div>
            </div><!-- /detail-dokter -->

          </section>
        </div><!-- /col-lg-10 -->
      </div><!-- /row -->

    </div>
    <!-- /container -->

  </div>
</template>

<script>
export default {
  props: ['doctor','storage']
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
}
.detail-dokter { 
  margin-bottom: 25px;
}
.maps-doctor iframe {
  width: 100%;
}
</style>
