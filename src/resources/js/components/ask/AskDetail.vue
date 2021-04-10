<template>
  <div>
    <Toasts></Toasts>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <section class="mt-3">
            <div class="w-100 mb-3">
              <a :href="home + '/ask'" class="text-decoration-none">
                <i class="far fa-arrow-left mr-1"></i> Kembali ke diskusi
              </a>
            </div>

            <div class="user-topic-container">
              <div class="user-topic-title">
                <h1 class="h4 font-weight-bold">
                  {{ comment.judul }}
                </h1>

                <div class="related-topic-card border-bottom-0">
                  <div class="topic-info">
                    <div class="total-reply">
                      <span class="text-secondary">{{
                        momentJsAtas(comment.created_at)
                      }}</span>
                    </div>

                    <div class="reply-time">
                      <span class="text-secondary">{{
                        momentJsBawah(comment.created_at)
                      }}</span>
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
                        class="card-title font-weight-bold text-decoration-none text-dark h5 text-capitalize"
                      >
                        {{ comment.user.name }}
                      </span>
                      <div class="topic-by text-secondary text-capitalize">
                        {{ comment.user.role }}
                      </div>
                    </div>
                    <!-- /topic-title -->
                  </div>
                  <!-- /topic-container -->

                  <div class="topic-detail-user">
                    <p class="mb-0" v-html="comment.subject"></p>
                  </div>
                  <!-- /topic-detail-user -->
                </div>
                <!-- /related-topic-card -->
              </div>
            </div>
            <!-- /user-topic-container -->

            <div v-if="current_user && current_user.role == 'doctor'">
              <h5 class="h6 mb-2 text-secondary mt-3">Balas sebagai dokter</h5>
              <div class="mb-5">
                <div class="form-group">
                  <wysiwyg v-model="create_data.balasan" />
                  <small class="text-danger" v-if="errors.balasan">
                    {{ errors.balasan[0] }}
                  </small>
                </div>
                <button
                  type="button"
                  class="btn btn-outline-primary mb-3 btn-block"
                  @click="createReplies"
                >
                  <i class="fal fa-pencil-alt mr-1"></i> Kirim Balasan
                </button>
              </div>
            </div>

            <div class="card mt-3" v-for="replies in repliesData.data" :key="replies.id">
              <div class="card-body">
                <h6 class="text-secondary">Dijawab oleh:</h6>
                <div class="related-topic-card border-bottom-0 pb-0">
                  <div class="topic-info">
                    <div class="total-reply">
                      <span class="text-secondary">{{momentJsAtas(replies.created_at)}}</span>
                    </div>

                    <div class="reply-time">
                      <span class="text-secondary">{{momentJsBawah(replies.created_at)}}</span>
                    </div>
                  </div>

                  <div class="topic-container">
                    <img
                      class="mr-1 img rounded-circle"
                      :src="storage + '/avatar/' + replies.user.avatar"
                      alt="Generic placeholder image"
                    />
                    <div class="topic-title">
                      <span
                        class="card-title font-weight-bold text-decoration-none text-dark h5"
                      >
                      dr. <span class="text-capitalize">{{replies.user.fullname ? replies.user.fullname : replies.user.name}}</span>
                      </span>
                      <div class="topic-by text-secondary text-capitalize">
                        {{replies.user.role}}
                      </div>
                    </div>
                    <!-- /topic-title -->
                  </div>
                  <!-- /topic-container -->

                  <div class="topic-detail-user" v-html="replies.balasan">
                  </div>
                  <!-- /topic-detail-user -->
                </div>
                <!-- /related-topic-card -->
              </div>
              <!-- /card-body -->

              <div class="card-body border-top">
                <div class="form-inline">
                  <div class="custom-control my-1 mr-sm-2 pl-0">
                    <h5 class="card-title mb-0">
                      Apakah jawaban ini membantu?
                    </h5>
                  </div>
                  <button type="submit" class="btn btn-primary my-1 btn-sm">
                    <i class="fas fa-thumbs-up mr-1"></i> Ya
                  </button>
                </div>
              </div>
              <!-- /card-body -->
            </div>
            <!-- /card -->
          </section>
        </div>
        <!-- /col-lg-8 -->
      </div>
      <!-- /row -->

      <div class="mt-5">
        <pagination
          :data="repliesData"
          :limit="2"
          :align="'center'"
          @pagination-change-page="getResults"
        ></pagination>
      </div>

    </div>
    <!-- /container -->
  </div>
</template>

<script>
import moment from "moment";

export default {
  props: ["home", "comment", "storage", "current_user"],
  data() {
    return {
      url: "/replies/all-replies",
      repliesData: {},
      create_data: {
        balasan: ""
      },
      errors: []
    };
  },
  methods: {
    getResults(page = 1) {
      axios.get(`${this.url}/${this.comment.id}?page=${page}`).then(res => {
        this.repliesData = res.data;
      });
    },
    createReplies(){
      axios.post(`/replies/create/${this.comment.id}`,this.create_data).then(res => {
        this.getResults()
        this.$toast.success(res.data.status);
        this.errors = [];
        this.create_data.balasan = ""
      }).catch(err => {
        if(err.response.status !== 422) this.$toast.warning(err.response.data.status);
        else this.errors = err.response.data.errors
      })
    },
    momentJsAtas(val) {
      return moment(val).format("DD MMMM YYYY");
    },
    momentJsBawah(val) {
      return moment(val).format("LT");
    }
  },
  mounted() {
    this.getResults();
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
