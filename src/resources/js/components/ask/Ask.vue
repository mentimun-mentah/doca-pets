<template>
  <div>
    <Toasts></Toasts>
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
                  v-model="create_data.judul"
                  :class="[errors.judul ? 'is-invalid' : '']"
                />
                <small class="text-danger" v-if="errors.judul">
                  {{ errors.judul[0] }}
                </small>
              </div>
              <div class="form-group">
                <wysiwyg v-model="create_data.subject" />
                <small class="text-danger" v-if="errors.subject">
                  {{ errors.subject[0] }}
                </small>
              </div>
              <button
                type="button"
                class="btn btn-outline-primary mb-3 btn-block"
                @click="createComment"
              >
                <i class="fal fa-pencil-alt mr-1"></i> Kirim Pertanyaan
              </button>
            </div>

            <h2 class="h3 mb-3">Diskusi Terbaru</h2>
            <div v-if="commentData.data && commentData.data.length > 0">
              <div class="related-topic-card" v-for="comment in commentData.data" :key="comment.id">
                <a
                  :href="home + '/ask/' + comment.id"
                  class="text-reset text-decoration-none"
                >
                  <div class="topic-info">
                    <div class="total-reply">
                      <span class="text-primary">{{comment.replies_count}} Balasan</span>
                      <i class="fas fa-comment ml-2 text-primary"></i>
                    </div>

                    <div class="reply-time">
                      <span class="text-secondary">{{momentJs(comment.created_at)}}</span>
                      <i class="fas fa-clock ml-2 text-primary"></i>
                    </div>
                  </div>

                  <div class="topic-container">
                    <img
                      class="mr-1 img rounded-circle"
                      :src="storage + '/avatar/' + comment.user.avatar"
                      alt="Generic placeholder image"
                    />
                    <div class="topic-title">
                      <span
                        class="card-title font-weight-bold text-decoration-none text-dark truncate-2"
                      >
                      {{comment.judul}}
                      </span>
                      <div class="topic-by text-secondary text-capitalize">
                        Oleh: {{comment.user.name}}
                      </div>
                    </div>
                  </div>
                  <div class="topic-detail">
                    <p class="mb-0 truncate-2">
                      {{comment.subject | strippedContent}}
                    </p>
                  </div>
                  <!-- /topic-detail -->
                </a>
              </div>
              <!-- /related-topic-card -->
            </div><!--/v-if-->

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
        </div>
        <!-- /col-lg-8 -->
      </div>
      <!-- /row -->

      <div class="mt-5">
        <pagination
          :data="commentData"
          :limit="2"
          :align="'center'"
          @pagination-change-page="getResults"
        ></pagination>
      </div><!--/row-->
    </div>
    <!-- /container -->
  </div>
</template>

<script>
import moment from "moment";

export default {
  props: ["home", "storage"],
  data() {
    return {
      url: "/comment/all-comment",
      commentData: {},
      create_data: {
        judul: "",
        subject: ""
      },
      errors: []
    };
  },
  methods:{
    getResults(page = 1) {
      axios.get(`${this.url}?page=${page}`).then(res => {
        this.commentData = res.data;
      });
    },
    createComment(){
      axios.post('/comment/create',this.create_data).then(res => {
          this.getResults()
          this.$toast.success(res.data.status);
          this.errors = [];
          this.create_data.judul = ""
          this.create_data.subject = ""
      }).catch(err => {
        if(err.response.status !== 422) this.$toast.warning(err.response.data.status);
        else this.errors = err.response.data.errors
      })
    },
    momentJs(val) {
      moment.locale('id');
      return moment(val).startOf('minute').fromNow();
    }
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
@media screen and (max-width: 720px) {
  .topic-detail {
    width: 100%;
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
