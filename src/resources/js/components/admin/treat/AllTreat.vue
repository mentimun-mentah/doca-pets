<template>
  <div>
    <Toasts></Toasts>
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
                    <a href="#"><i class="fas fa-heartbeat"></i></a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="#">Kelola Cara Merawat</a>
                  </li>
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
        <div class="row" v-if="treatData.data && treatData.data.length > 0">
          <div
            class="col-xl-4 col-lg-4 col-md-6 col-sm-12"
            v-for="treat in treatData.data"
            :key="treat.id"
          >
            <div class="card">
              <div class="embed-responsive embed-responsive-16by9">
                <img
                  class="card-img-top embed-responsive-item obj-fit-cover"
                  :src="storage + '/' + treat.photo"
                  alt="Card image cap"
                />
              </div>
              <div class="card-body">
                <a href="#"
                  ><h4 class="card-title mt--3 truncate-2">{{ treat.judul }}</h4></a
                >
                <p class="card-text mt--3 truncate-3" style="font-size: 12px;">
                  {{ treat.deskripsi | strippedContent }}
                </p>
                <center>
                  <a :href="admin + '/change-treat/' + treat.id" class="btn btn-default btn-sm m-r-0">Ubah</a>
                  <button class="btn btn-danger btn-sm" @click="deleteTreat(treat.id)">Hapus</button>
                </center>
              </div>
              <!--/card-body-->
            </div>
            <!--/card-->
          </div>
          <!--/col-xl-3-->
        </div>
        <!-- /row -->

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

      </div>
      <!-- /header-body -->

      <pagination
        :data="treatData"
        :limit="2"
        :align="'center'"
        @pagination-change-page="getResults"
      ></pagination>
    </div>
    <!-- /container-fluid -->
  </div>
</template>

<script>
export default {
  props: ["storage", "admin"],
  data() {
    return {
      url: "/admin/treat/all-treat",
      treatData: {}
    };
  },
  methods: {
    getResults(page = 1) {
      axios.get(`${this.url}?page=${page}`).then(res => {
        this.treatData = res.data;
      });
    },
    deleteTreat(id){
      axios.delete(`/admin/treat/delete/${id}`).then(res => {
        this.$toast.success(res.data.status);
        this.getResults()
      })
    }
  },
  filters: {
    strippedContent(string) {
      return string.replace(/<\/?[^>]+>/gi, " ");
    }
  },
  mounted() {
    this.getResults();
  }
};
</script>
