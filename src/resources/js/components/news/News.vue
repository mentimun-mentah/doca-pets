<template>
  <div>
    <div class="container">
      <section class="mt-3">
        <h2 class="text-center h3 mb-3">Berita Kehilangan</h2>
        <div class="row">

          <div class="col col-lg-6 col-md-6 col-sm-12" v-for="n in 6" :key="n">
            <div class="card card-animal mb-3">
              <img
                src="https://i0.wp.com/hewanpedia.com/wp-content/uploads/2021/02/Mimpi-Iguana.jpg?resize=400%2C250&ssl=1"
                class="card-img-top"
                alt="animal"
              />
              <div class="card-body">
                <h5 class="card-title">Ini Anjing hilang</h5>
                <p class="card-text truncate-3">
                  Anjing gua hilang di sekitaran jimbaran pada hari selasa lalu...
                  Walaupun canine enteric coronavirus sangat menular ke anjing lain, ia tidak menular pada manusia. Human coronavirus (SARS-CoV-2 atau COVID-19 dan sebelumnya disebut 2019-nCoV) adalah virus berbeda yang menyebabkan gejala pernapasan pada manusia dan tidak ada bukti ilmiah bahwa virus menyebabkan masalah pada anjing atau anjing adalah pembawa dari Itu. Namun, Pusat Pengendalian dan Pencegahan Penyakit (CDC) merekomendasikan bahwa jika teman-teman terinfeksi COVID-19 untuk menghindari atau membatasi kontak dengan hewan peliharaan teman-teman sampai informasi lebih lanjut tentang virus ini diketahui.
                </p>
                <button
                  type="button"
                  class="btn btn-outline-secondary btn-sm"
                  data-toggle="modal"
                  data-target="#staticBackdrop"
                >
                  Selengkapnya
                </button>
              </div>
            </div>
          </div>
          <!-- /col -->

        </div>
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
        class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Ini Anjing hilang</h5>
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
              src="https://i0.wp.com/hewanpedia.com/wp-content/uploads/2021/02/Mimpi-Iguana.jpg?resize=400%2C250&ssl=1"
              class="img-fluid w-100"
              alt="img-animal"
            />
            <h6 class="my-3">Deskripsi</h6>
            <div class="deskripsi">
              <p>
                Untuk para penggemar ikan hias pasti mengetahui jenis ikan guppy
                ini. Ikan yang mempunyai nama ilmiah poecilla reticulata ini biasa
                ditemukan pada habitat yang mempunyai arus air yang tenang, Ikan
                ini sebenarnya bukanlah ikan hias namun ikan yang digunakan untuk
                membasmi malaria atau jentik nyamuk.
              </p>
              <p>
                Namun ikan guppy yang hidup liar tersebut jauh berbeda dengan ikan
                guppy yang sengaja dibudidaya karena mempunyai corak warna yang
                sangat menawan yang membuat hewan air ini menjadi ikan hias guppy.
                Banyak sekali yang hampir tidak bisa membedakan antara ikan guppy
                ini dengan ikan cupang namun ikan guppy ini lebih mempunyai corak
                yang menawan dan lebih jinak untuk di taruh pada aquarium kamu.
                Ikan ini juga termasuk dalam ikan hias air tawar terindah.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
  </div>
</template>

<script>
export default {
  props: ["home"]
};
</script>
