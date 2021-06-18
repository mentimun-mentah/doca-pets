<template>
  <div>
    <Toasts></Toasts>
    <a class="nav-link dropdown-toggle no-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="far fa-bell" style="font-size: 18px;"></i>
      <span class="badge badge-pill badge-danger" style="float:right; margin-top:-5px;margin-left:-2px;padding-right:0.4em;padding-left:0.4em;">
        {{totalNotification}}
      </span>
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-notif" aria-labelledby="navbarDropdown2" id="infinite-list">
      <div class="d-flex header-dropdown-notifikasi" style="margin-top:-8px;font-size:13px;">
        <div><b>Semua Notifikasi</b></div>
        <a @click="onReadAllNotification"><div class="hover-pointer text-primary"><b>Baca Semua</b></div></a>
      </div>
      <a 
        class="dropdown-item hover-pointer notifikasi-item" 
        v-for="notif in notifications" 
        :key="notif.notifications_id" 
        :class="[notif.notifications_seen === 0 ? 'notif-not-read' : '']"
        @click="onReadNotification(notif.notifications_id, notif.replies_comment_id)"
        v-if="notifications && notifications.length > 0"
      >
        <div class="media text-truncate">
          <div class="media-body text-truncate">
            <div class="d-flex justify-content-between text-truncate">
              <h6 class="mt-0 mb-n1 text-truncate" style="width:110px;">{{notif.doctor.name}}</h6>
              <small>{{momentJs(notif.notifications_created_at)}}</small>
            </div>
            <div class="small text-muted text-truncate" style="width:250px;">
              {{notif.replies_balasan | strippedContent}}
            </div>
          </div>
        </div>
      </a>

      <div class="dropdown-item notifikasi-item empty" v-if="notifications && notifications.length === 0">
        <div class="py-3 text-muted text-center">
          <i class="fal fa-bells fa-2x"></i>
          <p class="mb-0">
            Tidak ada notifikasi
          </p>
        </div>
      </div>

      <div class="d-flex justify-content-center" v-if="loading && !allLoaded">
        <div class="spinner-border text-secondary spinner-border-sm mt-2" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";

export default {
  props: ['home'],
  data() {
    return {
      allLoaded: false,
      loading: false,
      page: 1,
      notifications: [],
      totalNotification: 0
    }
  },
  methods: {
    getMyNotifications(page) {
      this.loading = true;
      axios.get(`/notification/my-notif?page=${page}`)
        .then(res => {
          if(res.data.last_page >= this.page) {
            this.page += 1
            const tmpRes = this.notifications.concat(res.data.data)
            const newData = _.uniqBy(tmpRes, 'notifications_id')
            this.notifications = newData
            this.loading = false
          } else {
            this.loading = false
            this.allLoaded = true
          }
          if(res.data.last_page < res.data.current_page) {
            this.page = res.data.last_page
          }
        })
    },
    onReadNotification(id, comm_id) {
      axios.put(`/notification/read/${id}`)
        .then(res => {
          location.href = this.home + '/ask/' + comm_id
        })
    },
    onReadAllNotification() {
      axios.put('/notification/mark-all-read')
        .then(res => {
          this.$toast.success(res.data.status);
          this.getTotalNotification();
          this.page = 1
          this.notifications = []
          this.getMyNotifications(1)
        })
    },
    getTotalNotification() {
      axios.get('/notification/total-notif')
        .then(res => {
          this.totalNotification = res.data
        })
    },
    momentJs(val) {
      return moment(val).format("lll");
    }
  },
  filters:{
    strippedContent(string){
      string = string.replace(/<\/?[^>]+>/gi, " ");
      return string.replace(/&nbsp;/g, " ");
    }
  },
  mounted(){
    // Detect when scrolled to bottom.
    const listElm = document.querySelector('#infinite-list');
    listElm.addEventListener('scroll', () => {
      if(listElm.scrollTop + listElm.clientHeight >= listElm.scrollHeight) {
        this.getMyNotifications(this.page);
      }
    });

    this.getTotalNotification()
    this.getMyNotifications(this.page)
  }
};
</script>

<style>
.header-dropdown-notifikasi {
  padding: 8px 12px;
  border-bottom: 3px solid #dee2e6;
  justify-content: space-between;
}
.notif-not-read {
  background-color: #dae0e5;
}
.dropdown-item.active, .dropdown-item:active {
  color: black;
  background-color: #f8f9fa;
}
.dropdown-item.empty:hover, .dropdown-item.empty:focus {
  color: inherit;
  text-decoration: none;
  background-color: inherit;
}
</style>
