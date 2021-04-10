<template>
  <div class="container">
    <section class="mt-3">
      <h2 class="text-center h2 mb-4">Cara merawat hewan</h2>

      <div class="row" v-if="treatData.data && treatData.data.length > 0">
        <div v-for="(item,index) in treatData.data" :key="item.id">

          <div class="card border-0 shadow-sm mt-4" v-if="index % 2 == 0">
            <div class="row align-items-center">
              <div class="col-md-7 order-md-2">
                <div class="card-body">
                  <a :href="home + '/treat/' + item.slug" class="text-decoration-none">
                    <h2 class="featurette-heading truncate-2">
                      {{item.judul}}
                    </h2>
                  </a>
                  <p class="lead truncate-3">
                  {{item.deskripsi | strippedContent}}
                  </p>
                </div>
                <!-- /card-body -->
              </div>
              <div class="col-md-5 order-md-1">
                <img
                  :src="storage + '/' + item.photo"
                  class="img-fluid mx-auto"
                  width="500"
                  height="500"
                  style="width: 450px; height: 450px; object-fit: cover;"
                />
              </div>
            </div>
          </div>
          <!-- /card -->

          <div class="card border-0 shadow-sm mt-4" v-else>
            <div class="row align-items-center">
              <div class="col-md-7">
                <div class="card-body">
                  <a :href="home + '/treat/' + item.slug" class="text-decoration-none">
                    <h2 class="featurette-heading truncate-2">
                      {{item.judul}}
                    </h2>
                  </a>
                  <p class="lead truncate-3">
                  {{item.deskripsi | strippedContent}}
                  </p>
                </div>
                <!-- /card-body -->
              </div>
              <div class="col-md-5">
                 
                <img
                  :src="storage + '/' + item.photo"
                  class="img-fluid mx-auto float-right"
                  width="500"
                  height="500"
                  style="width: 450px; height: 450px; object-fit: cover;"
                />
              </div>
            </div>
          </div>
          <!-- /card -->
        </div>
        <!-- / v-for -->
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

      <div class="mt-5">
        <pagination
          :data="treatData"
          :limit="2"
          :align="'center'"
          @pagination-change-page="getResults"
        ></pagination>
      </div>

    </section>

  </div>
</template>

<script>
export default {
  props: ["home", "storage"],
  data() {
    return {
      url: "/admin/treat/all-treat",
      treatData: {}
    };
  },
  methods:{
    getResults(page = 1) {
      axios.get(`${this.url}?page=${page}`).then(res => {
        this.treatData = res.data;
      });
    },
  },
  filters: {
    strippedContent(string) {
      string = string.replace(/<\/?[^>]+>/gi, " ");
      return string.replace(/&nbsp;/g, " ");
    }
  },
  mounted() {
    this.getResults();
  }
};
</script>
