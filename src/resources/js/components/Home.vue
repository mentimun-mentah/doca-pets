<template>
  <div>
    <div class="container">
      <section class="mt-3">
        <h1 class="display-5 mb-4 font-weight-bold text-center">
          Jenis Anjing & Kucing
        </h1>

        <div class="row">
          <div class="col-sm-12 col-md-6 col-lg-8">
            <div class="form-group has-search">
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
            <div class="form-group">
              <select id="inputState" class="form-control" v-model="jenis">
                <option value="all">All</option>
                <option value="anjing">Anjing</option>
                <option value="kucing">Kucing</option>
              </select>
            </div>
          </div>
        </div><!--/row-->

        <div class="row" v-if="petsData.data && petsData.data.length > 0">
          <div class="col col-lg-4 col-md-6 col-sm-12" v-for="pet in petsData.data" :key="pet.id">
            <div class="card card-shadow-hover mb-3">
              <div class="embed-responsive embed-responsive-16by9">
                <img
                  :src="storage + '/pet/' + pet.photo"
                  class="card-img-top embed-responsive-item obj-fit-cover"
                  alt="animal"
                />
              </div>
              <div class="card-body">
                <h5 class="card-title truncate-2">{{pet.nama}}</h5>
                <p class="card-text truncate-3">
                {{pet.deskripsi | strippedContent}}
                </p>
                <a :href="home + '/pet/' + pet.slug" class="btn btn-outline-secondary btn-sm" role="button">Selengkapnya</a>
              </div>
            </div>
          </div>
          <!-- /col -->
        </div>
        <!-- /row -->

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

      <pagination :data="petsData" :limit="2" :align="'center'" @pagination-change-page="getResults"></pagination>

    </div>
    <!-- /container -->

  </div>
</template>

<script>
export default {
  props: ['home', 'storage'],
  data() {
    return {
      url: '/admin/pet/all-pet',
      petsData: {},
      newsData: {},
      q: '',
      jenis: 'all',
      jenis_q: ''
    };
  },
  methods:{
    getResults(page = 1){
      axios.get(`${this.url}?page=${page}&q=${this.q}&jenis=${this.jenis_q}`).then(res => {
        this.petsData = res.data
      })
    },
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
      string = string.replace(/<\/?[^>]+>/gi, " ");
      return string.replace(/&nbsp;/g, " ");
    }
  },
  mounted() {
    this.getResults()
  }
};
</script>
<style>
.card-shadow-hover:hover {
  box-shadow: 0px 6px 16px rgb(0 0 0 / 12%);
  transition: all 0.2s ease;
}
.has-search .form-control {
  padding-left: 2.375rem;
}

.has-search .form-control-feedback {
  position: absolute;
  z-index: 2;
  display: block;
  width: 2.375rem;
  height: 2.375rem;
  line-height: 2.375rem;
  text-align: center;
  pointer-events: none;
  color: #aaa;
}
.truncate-2 {
  -webkit-line-clamp: 2;
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-box-orient: vertical;
}
.deskripsi img {
  width: 100%;
}
</style>
