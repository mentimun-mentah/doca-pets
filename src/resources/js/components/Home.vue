<template>
  <div>
    <div class="container">
      <section class="mt-3">
        <h1 class="display-5 mb-4 font-weight-bold text-center">
          Jenis Anjing & Kucing
        </h1>

        <form>
          <div class="form-row">
            <div class="col-sm-12 col-md-6 col-lg-8">
              <div class="form-group has-search">
                <span class="fa fa-search form-control-feedback"></span>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Cari hewan"
                />
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
              <div class="form-group">
                <select id="inputState" class="form-control">
                  <option selected>Anjing</option>
                  <option>Kucing</option>
                </select>
              </div>
            </div>
          </div>
        </form>

        <div class="row">
          <div class="col col-lg-4 col-md-6 col-sm-12" v-for="n in 6" :key="n">
            <div class="card card-shadow-hover mb-3">
              <img
                src="https://i0.wp.com/hewanpedia.com/wp-content/uploads/2021/02/Mimpi-Iguana.jpg?resize=400%2C250&ssl=1"
                class="card-img-top"
                alt="animal"
              />
              <div class="card-body">
                <h5 class="card-title">Ini Anjing</h5>
                <p class="card-text">
                  Some quick example text to build on the card title the bulk of
                  the card's content.
                </p>
                <a :href="home + '/pet/' + n" class="btn btn-outline-secondary btn-sm" role="button">Selengkapnya</a>
              </div>
            </div>
          </div>
          <!-- /col -->
        </div>
        <!-- /row -->
      </section>

      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center mt-4">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <!-- /container -->

    <!-- Modal -->

    <div class="modal-backdrop fade show" v-if="show"></div>
    <transition
      enter-active-class="animate__animated animate__fadeInDown animate__faster"
      leave-active-class="animate__animated animate__fadeOut animate__faster"
    >
      <div v-if="show" class="modal fade show d-block">
        <div
          class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
        >
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">
                Ini Anjing hilang
              </h5>
              <button type="button" class="close" @click="show = !show">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <img
                src="https://i0.wp.com/hewanpedia.com/wp-content/uploads/2021/02/Mimpi-Iguana.jpg?resize=400%2C250&ssl=1"
                class="img-fluid w-100"
                alt="img-animal"
              />
              <h6 class="my-3">Deskripsi</h6>
              <div class="deskripsi">
                <p>
                  Untuk para penggemar ikan hias pasti mengetahui jenis ikan
                  guppy ini. Ikan yang mempunyai nama ilmiah poecilla reticulata
                  ini biasa ditemukan pada habitat yang mempunyai arus air yang
                  tenang, Ikan ini sebenarnya bukanlah ikan hias namun ikan yang
                  digunakan untuk membasmi malaria atau jentik nyamuk.
                </p>
                <p>
                  Namun ikan guppy yang hidup liar tersebut jauh berbeda dengan
                  ikan guppy yang sengaja dibudidaya karena mempunyai corak
                  warna yang sangat menawan yang membuat hewan air ini menjadi
                  ikan hias guppy. Banyak sekali yang hampir tidak bisa
                  membedakan antara ikan guppy ini dengan ikan cupang namun ikan
                  guppy ini lebih mempunyai corak yang menawan dan lebih jinak
                  untuk di taruh pada aquarium kamu. Ikan ini juga termasuk
                  dalam ikan hias air tawar terindah.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->
    </transition>
  </div>
</template>

<script>
export default {
  props: ['home'],
  data() {
    return {
      show: false
    };
  },
  mounted() {
    setTimeout(() => {
      this.show = true;
    }, 500);
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
</style>
