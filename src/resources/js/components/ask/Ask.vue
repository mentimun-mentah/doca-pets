<template>
  <div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <section class="mt-3">
            <h2 class="h3 mb-3">Tanya Dokter</h2>
            <div class="mb-5">
              <div class="form-group">
                <label>Judul Topik</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Contoh: Dari umur berapa bayi boleh diberi makanan padat?"
                />
              </div>
              <div class="form-group">
                <wysiwyg v-model="myHTML" />
              </div>
              <button
                type="button"
                class="btn btn-outline-primary mb-3 btn-block"
              >
                <i class="fal fa-pencil-alt mr-1"></i> Kirim Pertanyaan
              </button>
            </div>

            <h2 class="h3 mb-3">Diskusi Terbaru</h2>
            <div class="related-topic-card" v-for="n in 5" :key="n">
              <a
                :href="home + '/ask/' + n"
                class="text-reset text-decoration-none"
              >
                <div class="topic-info">
                  <div class="total-reply">
                    <span class="text-primary">0 Balasan</span>
                    <i class="fas fa-comment ml-2 text-primary"></i>
                  </div>

                  <div class="reply-time">
                    <span class="text-secondary">1 menit yang lalu</span>
                    <i class="fas fa-clock ml-2 text-primary"></i>
                  </div>
                </div>

                <div class="topic-container">
                  <img
                    class="mr-1 img rounded-circle"
                    src="https://i0.wp.com/hewanpedia.com/wp-content/uploads/2021/02/Mimpi-Iguana.jpg?resize=400%2C250&ssl=1"
                    alt="Generic placeholder image"
                  />
                  <div class="topic-title">
                    <span
                      class="card-title font-weight-bold text-decoration-none text-dark"
                    >
                      Shaving Kulit
                    </span>
                    <div class="topic-by text-secondary">
                      Oleh: David
                    </div>
                  </div>
                </div>
                <div class="topic-detail">
                  <p class="mb-0">
                    Dok, saya liat di online ada yang jual cream perontok bulu
                    (khusus kelamin) apakah aman untuk dipakai laki-laki dok?
                    Soalnya laki-laki mempunyai...
                  </p>
                </div>
                <!-- /topic-detail -->
              </a>
            </div>
            <!-- /related-topic-card -->
          </section>
        </div>
        <!-- /col-lg-8 -->
      </div>
      <!-- /row -->

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
  props: ["home"],
  data() {
    return {
      myHTML: ""
    };
  }
};
</script>
<style>
.related-topic-card {
  padding: 20px 0 17px;
  border-bottom: solid 1px #e0e0e0;
}
.topic-info {
  float: right;
  text-align: right;
  font-size: 14px;
}
.topic-container {
  margin-bottom: 16px;
  display: inline-flex;
  align-items: center;
}
.topic-detail {
  width: 560px;
  overflow-wrap: break-word;
}
.topic-title {
  display: inline-block;
  width: 350px;
  vertical-align: top;
  margin-left: 16px;
}
.topic-by {
  line-height: 1.64;
  font-size: 14px;
  margin-bottom: 4px;
}
.editr {
  border-radius: 0.25rem;
  border: 1px solid #e4e4e4;
  width: 100%;
}
.editr--toolbar {
  background: #f6f6f6;
  border-top-left-radius: 0.25rem;
  border-top-right-radius: 0.25rem;
  border-bottom: 1px solid #e4e4e4;
  position: relative;
  display: flex;
  height: 32px;
}
.editr--toolbar a {
  display: inline-block;
  width: 8vw;
  max-width: 32px;
  height: 32px;
  color: #333;
  fill: #333;
  cursor: pointer;
  text-align: center;
  line-height: 1;
}
.editr--toolbar a:hover {
  background: rgba(0, 0, 0, 0.1);
}
.editr--toolbar a:active {
  background: rgba(0, 0, 0, 0.2);
}
.editr--toolbar a svg {
  width: 16px;
  height: 16px;
  margin: 8px auto;
}
.editr--toolbar a svg path {
  fill: inherit;
}
.editr--toolbar a.vw-btn-separator {
  width: 1px;
  margin: 0 8px;
}
.editr--toolbar a.vw-btn-separator:hover {
  background: initial;
  cursor: default;
}
.editr--toolbar a.vw-btn-separator i.vw-separator {
  border-left: 1px solid rgba(0, 0, 0, 0.1);
  height: 100%;
  position: absolute;
  width: 1px;
}
.editr--toolbar .dashboard {
  width: 100%;
  position: absolute;
  top: 32px;
  left: 0;
  text-align: left;
  padding: 8px 16px;
  background: rgba(255, 255, 255, 0.95);
  border: 1px solid #f6f6f6;
}
.editr--content {
  min-height: 150px;
  padding: 12px 8px 16px 8px;
  line-height: 1.33;
  font-family: inherit;
  color: inherit;
  overflow-y: auto;
  background: rgba(255, 255, 255, 0.95);
  border-bottom-left-radius: 0.25rem;
  border-bottom-right-radius: 0.25rem;
}
.editr--content[contenteditable="true"]:empty:before {
  content: attr(placeholder);
  color: rgba(0, 0, 0, 0.3);
  display: block; /* For Firefox */
}
.editr--content img {
  max-width: 100%;
}
.editr--content table {
  width: 100%;
  border-collapse: collapse;
}
.editr--content table th {
  text-align: left;
}
.editr--content table th,
.editr--content table td {
  border: 1px solid #ddd;
  padding: 2px;
}
.editr--content:focus {
  outline: 0;
}
.editr--content ul li,
.editr--content ol li {
  list-style-position: inside;
}
@media screen and (max-width: 320px) {
  .editr--toolbar a {
    margin: 0 2px;
  }
  .editr--toolbar a.vw-btn-separator {
    display: none;
  }
}
.form[data-v-ebce4d12] {
  display: flex;
  align-content: flex-end;
}
.form label[data-v-ebce4d12] {
  margin-right: 1rem;
}
</style>
