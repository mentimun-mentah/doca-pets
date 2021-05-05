<template>
  <main class="content">
    <div class="container p-0">
      <div class="card">
        <div class="row g-0 h-100vh">
          <!-- /SIDEBAR -->
          <div class="col-12 col-lg-4 col-xl-3 border-right">
            <div class="px-4 d-none d-md-block">
              <div class="d-flex align-items-center">
                <div class="flex-grow-1">
                  <h6 class="my-3">Online member</h6>
                </div>
              </div>
            </div>

            <!-- /LIST MEMBER -->
            <transition-group
              enter-active-class="animate__animated animate__fadeInDown animate__faster"
              leave-active-class="animate__animated animate__fadeOutDown animate__faster"
            >
              <a
                href="#"
                class="list-group-item list-group-item-action border-0"
                v-for="item in usersOnline"
                :key="item.id"
              >
                <div class="d-flex align-items-start">
                  <img
                    :src="storage + '/' + item.avatar"
                    class="rounded-circle mr-1"
                    alt="William Harris"
                    width="40"
                    height="40"
                  />
                  <div class="flex-grow-1 ml-3">
                    {{ item.name }}
                    <div class="small">
                      <span class="fas fa-circle chat-online"></span>
                      Online
                    </div>
                  </div>
                </div>
              </a>
            </transition-group>

            <!-- /LIST MEMBER -->

            <hr class="d-block d-lg-none mt-1 mb-0" />
          </div>
          <!-- /SIDEBAR -->

          <!-- /ROOM CHAT -->
          <div class="col-12 col-lg-8 col-xl-9 align-self-end">
            <div class="position-relative">
              <div class="chat-messages p-4" id="container-chat">
                <!-- /MESSAGE -->

                <transition-group
                  enter-active-class="animate__animated animate__fadeInUp animate__faster"
                  tag="div"
                >
                  <div v-for="(message, index) in messagesUsers" :key="message.id">
                    <div class="w-100 text-center mb-2" v-if="setDate(index) != false">
                      <p style="font-size: 16px;">
                        <span class="badge bg-light text-secondary">
                          {{setDate(index)}}
                        </span>
                      </p>
                    </div>

                    <div
                      class="chat-message-right mb-4"
                      v-if="current_user.id == message.user_id"
                    >
                      <div class="text-right">
                        <img
                          :src="storage + '/' + message.user.avatar"
                          class="rounded-circle mr-1"
                          alt="Chris Wood"
                          width="40"
                          height="40"
                        />
                        <p class="text-muted small text-nowrap mt-2 mb-0">
                          {{ momentJs(message.created_at) }}
                        </p>
                      </div>
                      <div
                        class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3 h-fit-content"
                      >
                        <div class="font-weight-bold mb-1">
                          You
                        </div>
                        {{ message.message }}
                      </div>
                    </div>

                    <div class="chat-message-left pb-4" v-else>
                      <div>
                        <img
                          :src="storage + '/' + message.user.avatar"
                          class="rounded-circle mr-1"
                          alt="Sharon Lessman"
                          width="40"
                          height="40"
                        />
                        <p class="text-muted small text-nowrap mt-2 mb-0">
                          {{ momentJs(message.created_at) }}
                        </p>
                      </div>
                      <div
                        class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3 h-fit-content"
                      >
                        <div class="font-weight-bold mb-1">
                          {{ message.user.name }}
                        </div>
                        {{ message.message }}
                      </div>
                    </div>
                  </div>
                </transition-group>
                <!-- /MESSAGE -->
              </div>
            </div>

            <div class="flex-grow-0 py-3 px-4 border-top">
              <div class="input-group">
                <input
                  type="text"
                  class="form-control mr-2"
                  placeholder="Type your message"
                  v-model="message"
                  v-on:keyup.enter="sendMessage()"
                />
                <button class="btn btn-primary" @click="sendMessage()">
                  Send
                </button>
              </div>
            </div>
          </div>
          <!-- /col -->
          <!-- /ROOM CHAT -->
        </div>
      </div>
    </div>
  </main>
</template>

<script>
import moment from "moment";

export default {
  props: ["current_user","storage"],
  data() {
    return {
      usersOnline: [],
      messagesUsers: [],
      message: "",
      show: true,
      soundurl: "https://soundbible.com/mp3/Music_Box-Big_Daddy-1389738694.mp3",
      datemessage: []
    };
  },
  mounted() {
    this.fetchMessages();

    Echo.join("chat")
      .here(users => {
        this.usersOnline = users;
      })
      .joining(user => {
        this.usersOnline.push(user);
      })
      .leaving(user => {
        this.usersOnline = this.usersOnline.filter(usr => usr.id !== user.id);
      });

    Echo.channel("message").listen("MessageSent", e => {
      let tmp = e.message;
      tmp["user"] = e.user;

      this.messagesUsers.push(tmp);

      setTimeout(() => {
        if (e.user.id !== this.current_user.id) this.playSound();
        this.scrollToEnd();
      }, 50);
    });
  },
  methods: {
    setDate(index){
      try{
        if(index == 0){
          return moment(this.messagesUsers[index].created_at).isSame(moment(),'day') 
            ? 'Today'
            : moment(this.messagesUsers[index].created_at).format('LL')
        }else{
          if(!moment(this.messagesUsers[index].created_at).isSame(moment(this.messagesUsers[index - 1].created_at),'day')){
            return moment(this.messagesUsers[index].created_at).isSame(moment(),'day')
              ? 'Today'
              : moment(this.messagesUsers[index].created_at).format('LL')
          }
        }

      } catch(err) {}

      return false
    },
    fetchMessages() {
      axios.get("/messages").then(response => {
        this.messagesUsers = response.data;
        setTimeout(() => {
          this.scrollToEnd();
        }, 50);
      });
    },
    sendMessage() {
      axios.post("/messages", { message: this.message }).then(response => {
        this.scrollToEnd();
        console.log(response.data);
      });
      this.message = "";
    },
    scrollToEnd() {
      $("#container-chat").animate(
        {
          scrollTop: $("#container-chat").get(0).scrollHeight
        },
        500
      );
    },
    playSound() {
      let audio = new Audio(this.soundurl);
      audio.play();
    },
    momentJs(val) {
      return moment(val).format("LT");
    }
  }
};
</script>
<style>
.chat-online {
  color: #34ce57;
}

.chat-offline {
  color: #e4606d;
}

.chat-messages {
  display: flex;
  flex-direction: column;
  max-height: 70vh;
  overflow-y: scroll;
}

.chat-message-left,
.chat-message-right {
  display: flex;
  flex-shrink: 0;
}

.chat-message-left {
  margin-right: auto;
}

.chat-message-right {
  flex-direction: row-reverse;
  margin-left: auto;
}
.py-3 {
  padding-top: 1rem !important;
  padding-bottom: 1rem !important;
}
.px-4 {
  padding-right: 1.5rem !important;
  padding-left: 1.5rem !important;
}
.flex-grow-0 {
  flex-grow: 0 !important;
}
.border-top {
  border-top: 1px solid #dee2e6 !important;
}

.mw-100vw {
  max-width: 100vw;
}

.h-100vh {
  height: 80vh;
}
.list-group-item-action:hover,
.list-group-item-action:focus {
  background-color: white;
  cursor: default;
}

.h-fit-content {
  height: fit-content;
}
</style>
