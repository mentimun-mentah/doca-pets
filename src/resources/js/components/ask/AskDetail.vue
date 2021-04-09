<template>
  <div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <section class="mt-3">
            <div class="w-100 mb-3">
              <a href="#" class="text-decoration-none">
                <i class="far fa-arrow-left mr-1"></i> Kembali ke diskusi
              </a>
            </div>

            <div class="user-topic-container">
              <div class="user-topic-title">
                <h1 class="h4 font-weight-bold">
                  Perut terasa kenyang padahal belum makan nasi
                </h1>

                <div class="related-topic-card border-bottom-0">
                  <div class="topic-info">
                    <div class="total-reply">
                      <span class="text-secondary">7 April 2021</span>
                    </div>

                    <div class="reply-time">
                      <span class="text-secondary">20:12</span>
                    </div>
                  </div>

                  <div class="topic-container">
                    <img
                      class="mr-1 img rounded-circle"
                      src="https://i0.wp.com/hewanpedia.com/wp-content/uploads/2021/02/Mimpi-Iguana.jpg?resize=400%2C250&ssl=1"
                      alt="Generic placeholder image"
                    />
                    <div class="topic-title">
                      <span class="card-title font-weight-bold text-decoration-none text-dark h5">
                        David
                      </span>
                      <div class="topic-by text-secondary">
                        Anggota
                      </div>
                    </div><!-- /topic-title -->

                  </div><!-- /topic-container -->

                  <div class="topic-detail-user">
                    <p class="mb-0">
                    Malam dokter, sudah 2 hari ini saya ngerasa perut saya terasa kenyang padahal saya belum makan nasi, ngeliat nasi juga ngerasa udah kenyang, terus susah juga untuk BAB susah, kira-kira kenaoa ya dok? Makasih
                    </p>
                  </div><!-- /topic-detail-user -->

                </div>
                <!-- /related-topic-card -->
              </div>
            </div>
            <!-- /user-topic-container -->

            <h5 class="h6 mb-2 text-secondary mt-3">Balas sebagai dokter</h5>
            <div class="mb-5">
              <div class="form-group">
                <wysiwyg v-model="myHTML" />
              </div>
              <button type="button" class="btn btn-outline-primary mb-3 btn-block">
                <i class="fal fa-pencil-alt mr-1"></i> Kirim Balasan
              </button>
            </div>
            
            <div class="card mt-3">
              <div class="card-body">
                <h6 class="text-secondary">Dijawab oleh: </h6>
                <div class="related-topic-card border-bottom-0 pb-0">
                  <div class="topic-info">
                    <div class="total-reply">
                      <span class="text-secondary">7 April 2021</span>
                    </div>

                    <div class="reply-time">
                      <span class="text-secondary">21:31</span>
                    </div>
                  </div>

                  <div class="topic-container">
                    <img
                      class="mr-1 img rounded-circle"
                      src="https://i0.wp.com/hewanpedia.com/wp-content/uploads/2021/02/Mimpi-Iguana.jpg?resize=400%2C250&ssl=1"
                      alt="Generic placeholder image"
                    />
                    <div class="topic-title">
                      <span class="card-title font-weight-bold text-decoration-none text-dark h5">
                        dr. Steven A. Yuwono
                      </span>
                      <div class="topic-by text-secondary">
                        Dokter
                      </div>
                    </div><!-- /topic-title -->
                  </div><!-- /topic-container -->

                  <div class="topic-detail-user">
                    <p>Halo, terimakasih telah bertanya di Alodokter.</p>
                    <p>Perut terasa kenyang atau penuh bahkan sebelum makan disertai dengan sulit buang air besar dapat di sebabkan oleh beberpaa faktor kemungkinan seperti:</p>
                    <ul>
                    <li><a href="https://www.alodokter.com/penyakit-asam-lambung">GERD</a></li>
                    <li><a href="https://www.alodokter.com/sindrom-dispepsia-seperti-ini-gejala-dan-cara-mengobatinya">Dispepsia</a></li>
                    <li><a href="https://www.alodokter.com/tukak-lambung">Tukak lambung</a></li>
                    <li><a href="https://www.alodokter.com/ulkus-duodenum">Ulkus duodenum</a></li>
                    <li><a href="https://www.alodokter.com/batu-empedu">Cholelithiasis</a></li>
                    <li><a href="https://www.alodokter.com/kolesistitis">Cholecystitis</a></li>
                    <li><a href="https://www.alodokter.com/konstipasi">Konstipasi</a></li>
                    </ul>
                    <p>Untuk sementara yang dapat anda lakukan:</p>
                    <ul>
                    <li>Makan secara rutin dan teratur</li>
                    <li>Makan sedikit demi sedikit namun lebih sering, 5-6x sehari dengan porsi kecil</li>
                    <li>Hindari makan hingga terlalu kenyang</li>
                    <li>Hindari makanan pedas asam, santan, berminyak</li>
                    <li>Hindari minuman berkafein seperti kopi, teh dan bersoda</li>
                    <li>Jangan berbaring setelah makan</li>
                    <li>Hindari tidur setelah makan, beri jarak waktu setidaknya 2-3 jam setelah makan</li>
                    <li>Perbanyak minum air putih</li>
                    <li>Tidur dengan 2-3 bantal dengan posisi menyandar</li>
                    <li>Lakukan kelola stress</li>
                    <li>Tidur dan istirahat cukup 7-9 jam per hari</li>
                    </ul>
                    <p class="mb-0">Sekian informasi dari saya, semoga membantu</p>
                  </div><!-- /topic-detail-user -->

                </div>
                <!-- /related-topic-card -->
              </div><!-- /card-body -->

              <div class="card-body border-top">
                <form class="form-inline">
                  <div class="custom-control my-1 mr-sm-2 pl-0">
                    <h5 class="card-title mb-0">Apakah jawaban ini membantu?</h5>
                  </div>
                  <button type="submit" class="btn btn-primary my-1 btn-sm">
                    <i class="fas fa-thumbs-up mr-1"></i> Ya
                  </button>
                </form>
              </div><!-- /card-body -->
            </div><!-- /card -->

          </section>
        </div>
        <!-- /col-lg-8 -->
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->

  </div>
</template>

<script>
export default {
  data() {
    return {
      myHTML: ""
    };
  }
};
</script>
<style>
.editr {
  border: 1px solid #e4e4e4;
  width: 100%;
}
.editr--toolbar {
  background: #f6f6f6;
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
  background: rgba(0,0,0,0.1);
}
.editr--toolbar a:active {
  background: rgba(0,0,0,0.2);
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
  border-left: 1px solid rgba(0,0,0,0.1);
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
  background: rgba(255,255,255,0.95);
  border: 1px solid #f6f6f6;
}
.editr--content {
  min-height: 150px;
  padding: 12px 8px 16px 8px;
  line-height: 1.33;
  font-family: inherit;
  color: inherit;
  overflow-y: auto;
}
.editr--content[contenteditable=true]:empty:before {
  content: attr(placeholder);
  color: rgba(0,0,0,0.3);
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
