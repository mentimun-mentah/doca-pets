<template>
  <div>
    <div class="container">
      <section class="mt-3">
        <h2 class="text-center h3 mb-3">Daftar Dokter</h2>
        <div class="row justify-content-center">
          <div class="col-lg-10" v-for="n in 6" :key="n">
            <div class="card mb-3">
              <div class="row no-gutters">
                <div class="col-2">
                  <img
                    src="https://i0.wp.com/hewanpedia.com/wp-content/uploads/2021/02/Mimpi-Iguana.jpg?resize=400%2C250&ssl=1"
                    class="card-img img-doctor img"
                    alt="profile"
                  />
                </div>
                <div class="col-md-10">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-9">
                        <h5 class="card-title font-weight-bold">
                          dr. Kathleen Juanita Gunawan Soenario, Sp.OG
                        </h5>
                        <tabel>
                          <tr>
                            <td><i class="far fa-hospital-alt mr-2"></i></td>
                            <td>Siloam Hospitals Kebon Jeruk</td>
                          </tr>
                          <tr>
                            <td><i class="far fa-stethoscope mr-2"></i></td>
                            <td>Spesialis kandungan</td>
                          </tr>
                          <tr>
                            <td><i class="far fa-phone-alt mr-2"></i></td>
                            <td>085413232237</td>
                          </tr>
                        </tabel>
                      </div>
                      <!-- /col-9 -->
                      <div class="col-3 border-left text-center">
                        <h6 class="font-weight-bold">Ulasan Dokter</h6>
                        <p>
                          <i class="fas fa-thumbs-up text-primary"></i> (120)
                        </p>
                        <a
                          class="btn btn-outline-secondary btn-sm btn-block"
                          :href="home + '/doctor/' + n"
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
  </div>
</template>

<script>
export default {
  props: ["home"]
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
</style>
