<template>
  <div>
    <Toasts></Toasts>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-paw"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Kelola Hewan</a></li>
                </ol>
              </nav>
            </div><!-- /col -->
          </div><!-- /row -->

          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-8">
                  <div class="form-group has-search has-search-admin mb-4">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Cari hewan"
                      v-model="q"
                    />
                  </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                  <div class="form-group mb-4">
                    <select id="inputState" class="form-control" v-model="jenis">
                      <option value="all">All</option>
                      <option value="anjing">Anjing</option>
                      <option value="kucing">Kucing</option>
                    </select>
                  </div>
                </div>
              </div>
            </div><!-- /col-12 -->
          </div><!-- /row -->

        </div><!-- /header-body -->
      </div><!-- /container-fluid -->
    </div><!-- /header -->

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="header-body">
        <div class="row" v-if="petsData.data && petsData.data.length > 0">

          <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 m-b-20" v-for="pet in petsData.data" :key="pet.id">
            <div class="card">
              <div class="embed-responsive embed-responsive-16by9">
                <img class="card-img-top embed-responsive-item obj-fit-cover" :src="storage + '/' + pet.photo" alt="Card image cap">
              </div>
              <div class="card-body">
                <a href="#"><h4 class="card-title mt--3 truncate-2">{{ pet.nama }}</h4></a>
                <p class="card-text mt--3 truncate-3" style="font-size: 12px;">
                {{pet.deskripsi | strippedContent}}
                </p>
                <center>
                  <a :href="admin + '/change-pet/' + pet.id" class="btn btn-default btn-sm m-r-0">Ubah</a>
                  <button class="btn btn-danger btn-sm" @click="deletePet(pet.id)">Hapus</button>
                </center>
              </div><!--/card-body-->
            </div><!--/card-->
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

      <pagination :data="petsData" :limit="2" :align="'center'" @pagination-change-page="getResults"></pagination>
    </div><!-- /container-fluid -->
  </div>
</template>
<script>
export default {
  props: ['storage', 'admin'],
  data() {
    return {
      url: '/admin/pet/all-pet',
      petsData: {},
      q: '',
      jenis: 'all',
      jenis_q: ''
    };
  },
  methods: {
    getResults(page = 1){
      axios.get(`${this.url}?page=${page}&q=${this.q}&jenis=${this.jenis_q}`).then(res => {
        this.petsData = res.data
      })
    },
    deletePet(id){
      axios.delete(`/admin/pet/delete/${id}`).then(res => {
        this.$toast.success(res.data.status);
        this.getResults()
      })
    }
  },
  watch: {
    q(val){
      this.getResults()
    },
    jenis(val){
      if(val != 'all'){
        this.jenis_q = this.jenis
        this.getResults()
      }else{
        this.jenis_q = ''
        this.getResults()
      }
    }
  },
  filters:{
    strippedContent(string){
      return string.replace(/<\/?[^>]+>/ig, " ")
    }
  },
  mounted() {
    this.getResults()
  }
};
</script>
<style>
.truncate-3 {
  -webkit-line-clamp: 3;
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-box-orient: vertical;
}
.has-search.has-search-admin .form-control-feedback {
  width: 2.875rem;
  height: 2.875rem;
  line-height: 2.875rem;
}
.obj-fit-cover {
  object-fit: cover;
}
</style>
