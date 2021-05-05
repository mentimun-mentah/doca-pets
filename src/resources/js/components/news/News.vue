<template>
  <div>
    <div class="container">
      <section class="mt-3">
        <h2 class="text-center h3 mb-3">Berita Kehilangan</h2>
        <div class="row" v-if="newsData.data && newsData.data.length > 0">

          <div class="col col-lg-6 col-md-6 col-sm-12" v-for="news in newsData.data" :key="news.id">
            <div class="card card-animal mb-3">
              <div class="embed-responsive embed-responsive-16by9">
                <img
                  :src="storage + '/' + news.photo"
                  class="card-img-top embed-responsive-item obj-fit-cover"
                  alt="animal"
                />
              </div>
              <div class="card-body">
                <h5 class="card-title">{{news.judul}}</h5>
                <p class="card-text truncate-3">
                {{news.deskripsi | strippedContent}}
                </p>
                <button
                  type="button"
                  class="btn btn-outline-secondary btn-sm"
                  data-toggle="modal"
                  :data-target="'#staticBackdrop' + news.id"
                >
                  Selengkapnya
                </button>
              </div>
            </div>

            <!-- Modal -->
            <div
              class="modal fade"
              :id="'staticBackdrop' + news.id"
              data-backdrop="static"
              data-keyboard="false"
              tabindex="-1"
              aria-labelledby="staticBackdropLabel"
              aria-hidden="true"
            >
              <div
                class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
              >
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{news.judul}}</h5>
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
                    <img
                      :src="storage + '/' + news.photo"
                      class="img-fluid w-100"
                      alt="img-animal"
                    />
                    <h6 class="h5 my-3 font-weight-bold">Deskripsi</h6>
                    <div class="deskripsi" v-html="news.deskripsi"> </div>

                    <h6 class="h5 my-3 font-weight-bold">Lokasi Terakhir</h6>
                    <div class="maps-doctor" v-html="news.lokasi"></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal -->

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

      <pagination :data="newsData" :limit="2" :align="'center'" @pagination-change-page="getResults"></pagination>

    </div>
    <!-- /container -->

  </div>
</template>

<script>
export default {
  props: ["home", "storage"],
  data(){
    return{
      url: '/admin/news/all-news',
      newsData: {}
    }
  },
  methods:{
    getResults(page = 1){
      axios.get(`${this.url}?page=${page}`).then(res => {
        this.newsData = res.data
      })
    },
  },
  filters:{
    strippedContent(string){
      string = string.replace(/<\/?[^>]+>/gi, " ");
      return string.replace(/&nbsp;/g, " ");
    }
  },
  mounted(){ 
    this.getResults()
  }
};
</script>
