<template>
  <div class="container wrapper bg-white">
    <Toasts></Toasts>
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a
          class="nav-link active"
          id="nav-home-tab"
          data-toggle="tab"
          href="#nav-home"
          role="tab"
          aria-controls="nav-home"
          aria-selected="true"
          >Profil</a
        >
        <a
          class="nav-link"
          id="nav-profile-tab"
          data-toggle="tab"
          href="#nav-profile"
          role="tab"
          aria-controls="nav-profile"
          aria-selected="false"
          >Password</a
        >
      </div>
    </nav>

    <div class="tab-content" id="nav-tabContent">
      <div
        class="tab-pane fade show active"
        id="nav-home"
        role="tabpanel"
        aria-labelledby="nav-home-tab"
      >
        <h4 class="py-4 border-bottom">Account settings</h4>
        <div class="d-flex align-items-start py-3 border-bottom">
          <img
            :src="storage + '/' + user.avatar"
            class="img rounded-circle"
            alt="profile"
          />
          <div class="pl-sm-4 pl-2" id="img-section">
            <b>Profile Photo</b>
            <p>Accepted file type .jpg,.jpeg,.png. Less than 1MB</p>
            <div class="file-btn btn btn-sm button border">
              Upload
              <input
                type="file"
                class="fileupload"
                name="file"
                accept="image/*"
                @change="updateAvatar"
              />
            </div>
          </div>
        </div>
        <div class="py-2">
          <div class="row py-2">
            <div class="col-md-6">
              <label for="name">Username</label>
              <input
                type="text"
                class="bg-light form-control rounded"
                v-model="user.name"
                :class="[errors.name ? 'is-invalid' : '']"
              />
              <small class="text-danger" v-if="errors.name">
                {{ errors.name[0] }}
              </small>
            </div>
            <div class="col-md-6 pt-md-0 pt-3">
              <label for="fullname">Fullname</label>
              <input
                type="text"
                class="bg-light form-control rounded"
                placeholder="Fullname"
                v-model="user.fullname"
                :class="[errors.fullname ? 'is-invalid' : '']"
              />
              <small class="text-danger" v-if="errors.fullname">
                {{ errors.fullname[0] }}
              </small>
            </div>
          </div>
          <div class="row py-2">
            <div class="col-md-6">
              <label for="email">Email Address</label>
              <input
                type="text"
                class="bg-light form-control rounded"
                :value="user.email"
                disabled
              />
            </div>
            <div class="col-md-6 pt-md-0 pt-3">
              <label for="phone">Phone Number</label>
              <input
                type="tel"
                class="bg-light form-control rounded"
                placeholder="08786226222"
                v-model="user.phone"
                :class="[errors.phone ? 'is-invalid' : '']"
              />
              <small class="text-danger" v-if="errors.phone">
                {{ errors.phone[0] }}
              </small>
            </div>
          </div>
          <div class="pt-3">
            <button class="btn btn-primary" @click="updateProfile">
              Save Changes
            </button>
          </div>
        </div>
      </div>

      <div
        class="tab-pane fade"
        id="nav-profile"
        role="tabpanel"
        aria-labelledby="nav-profile-tab"
      >
        <h4 class="py-4 border-bottom">Change Password</h4>
        <div class="py-2">
          <div class="row py-2">
            <div class="col-md-12">
              <label for="old_password">Old Password</label>
              <input
                type="password"
                class="bg-light form-control"
                placeholder="Old Password"
                v-model="update_password.old_password"
                :class="[errors.old_password ? 'is-invalid' : '']"
              />
              <small class="text-danger" v-if="errors.old_password">
                {{ errors.old_password[0] }}
              </small>
            </div>
          </div>

          <div class="row py-2">
            <div class="col-md-12 pt-md-0 pt-3">
              <label for="new_password">New Password</label>
              <input
                type="password"
                class="bg-light form-control"
                placeholder="New Password"
                v-model="update_password.password"
                :class="[errors.password ? 'is-invalid' : '']"
              />
              <small class="text-danger" v-if="errors.password">
                {{ errors.password[0] }}
              </small>
            </div>
          </div>

          <div class="row py-2">
            <div class="col-md-12 pt-md-0 pt-3">
              <label for="new_password">Confirmation Password</label>
              <input
                type="password"
                class="bg-light form-control"
                placeholder="Confirmation Password"
                v-model="update_password.password_confirmation"
                :class="[errors.password_confirmation ? 'is-invalid' : '']"
              />
              <small class="text-danger" v-if="errors.password_confirmation">
                {{ errors.password_confirmation[0] }}
              </small>
            </div>
          </div>
          <div class="pt-3">
            <button class="btn btn-primary" @click="updatePassword">
              Save Changes
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["storage"],
  data() {
    return {
      user: null,
      update_password: {
        old_password: "",
        password: "",
        password_confirmation: ""
      },
      errors: []
    };
  },
  methods: {
    updateProfile() {
      let user = {
        name: this.user.name,
        fullname: this.user.fullname,
        phone: this.user.phone
      };

      axios
        .put("/account", user)
        .then(res => {
          this.$toast.success(res.data.status);
          this.errors = [];
        })
        .catch(err => {
          this.errors = err.response.data.errors;
        });
    },
    updateAvatar(e) {
      let formData = new FormData();
      formData.append("avatar", e.target.files[0]);

      const config = {
        headers: { "content-type": "multipart/form-data" }
      };
      axios
        .post("/account/avatar", formData, config)
        .then(res => {
          this.getUser();
          this.$toast.success(res.data.status);
        })
        .catch(err => {
          this.$toast.error(err.response.data.errors.avatar[0]);
        });
    },
    updatePassword() {
      axios
        .put("/account/password", this.update_password)
        .then(res => {

          this.errors = [];
          this.update_password.old_password = "";
          this.update_password.password = "";
          this.update_password.password_confirmation = "";
          this.$toast.success(res.data.status);
        })
        .catch(err => {
          this.errors = err.response.data.errors;
        });
    },
    getUser() {
      axios.get("/user").then(res => {
        this.user = res.data;
      });
    }
  },
  mounted() {
    this.getUser();
  }
};
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");
.wrapper {
  padding: 30px 50px;
  border: 1px solid #ddd;
  border-radius: 15px;
  margin: 10px auto;
  max-width: 600px;
}

h4 {
  letter-spacing: -1px;
  font-weight: 400;
}

.img {
  width: 80px;
  height: 80px;
  object-fit: cover;
}

#img-section p,
#deactivate p {
  font-size: 12px;
  color: #777;
  margin-bottom: 10px;
  text-align: justify;
}

#img-section b,
#img-section button,
#deactivate b {
  font-size: 14px;
}

label {
  margin-bottom: 0;
  font-size: 14px;
  font-weight: 500;
  color: #777;
  padding-left: 3px;
}

.form-control.rounded {
  border-radius: 10px;
}

input[placeholder] {
  font-weight: 500;
}

.form-control:focus {
  box-shadow: none;
  border: 1.5px solid #0779e4;
}

select {
  display: block;
  width: 100%;
  border: 1px solid #ddd;
  border-radius: 10px;
  height: 40px;
  padding: 5px 10px;
}

select:focus {
  outline: none;
}

.danger {
  background-color: #fff;
  color: #e20404;
  border: 1px solid #ddd;
}

.danger:hover {
  background-color: #e20404;
  color: #fff;
}

@media (max-width: 576px) {
  .wrapper {
    padding: 25px 20px;
  }

  #deactivate {
    line-height: 18px;
  }
}

.file-btn {
  position: relative;
  overflow: hidden;
  cursor: pointer;
}
.fileupload {
  cursor: pointer;
  position: absolute;
  font-size: 50px;
  opacity: 0;
  right: 0;
  top: 0;
}
.form-control:disabled,
.form-control[readonly] {
  background-color: #e9ecef !important;
  opacity: 1;
}
</style>
