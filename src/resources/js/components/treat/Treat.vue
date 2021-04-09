<template>
  <div class="container">
    <section class="mt-3">
      <h2 class="text-center h2 mb-4">Cara merawat hewan</h2>

      <div v-for="n in 4" :key="n">
        <div class="card border-0 shadow-sm mt-4" v-if="n % 2 == 0">
          <div class="row align-items-center">
            <div class="col-md-7 order-md-2">
              <div class="card-body">
                <a :href="home + '/treat/' + n" class="text-decoration-none">
                  <h2 class="featurette-heading truncate-2">
                    Oh yeah, it’s that good.
                    <span class="text-muted">See for yourself.</span>
                  </h2>
                </a>
                <p class="lead truncate-3">
                  Another featurette? Of course. More placeholder content here
                  to give you an idea of how this layout would work with some
                  actual real-world content in place.
                </p>
              </div>
              <!-- /card-body -->
            </div>
            <div class="col-md-5 order-md-1">
              <img
                src="https://image-cdn.medkomtek.com/iLuvjdBdG9YQAec8KoMHHokI4z0=/640x640/smart/klikdokter-media-buckets/medias/2309767/original/033781000_1575535270-Risiko-Makan-Daging-Anjing-bagi-Kesehatan-by-soloway-123rf-36321023_s.jpg"
                class="img-fluid mx-auto"
                width="500"
                height="500"
              />
            </div>
          </div>
        </div>
        <!-- /card -->

        <div class="card border-0 shadow-sm mt-4" v-else>
          <div class="row align-items-center">
            <div class="col-md-7">
              <div class="card-body">
                <a :href="home + '/treat/' + n" class="text-decoration-none">
                  <h2 class="featurette-heading truncate-2">
                    First featurette heading.
                    <span class="text-muted">It’ll blow your mind.</span>
                  </h2>
                </a>
                <p class="lead truncate-3">
                  Some great placeholder content for the first featurette here.
                  Imagine some exciting prose here.
                </p>
              </div>
              <!-- /card-body -->
            </div>
            <div class="col-md-5">
              <img
                src="https://cdn0-production-images-kly.akamaized.net/EUR5CI15V64a_iidhMQyOHZtWIU=/640x640/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/3153869/original/063163600_1592288896-pexels-photo-1996330.jpeg"
                class="img-fluid mx-auto"
                width="500"
                height="500"
              />
            </div>
          </div>
        </div>
        <!-- /card -->
      </div>
      <!-- / v-for -->
    </section>

    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center" style="margin-top: 2.8rem;">
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
</template>

<script>
export default {
  props: ["home"]
};
</script>
