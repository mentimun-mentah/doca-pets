<template>
  <div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
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
              >
                Pengguna
              </a>
              <a
                class="nav-link"
                id="nav-profile-tab"
                data-toggle="tab"
                href="#nav-profile"
                role="tab"
                aria-controls="nav-profile"
                aria-selected="false"
              >
                Dokter
              </a>
            </div>
          </nav>

          <div class="tab-content" id="nav-tabContent">
            <div
              class="tab-pane fade show active"
              id="nav-home"
              role="tabpanel"
              aria-labelledby="nav-home-tab"
            >
              <div class="card">
                <div class="card-body">
                  <div class="form-group row">
                    <label
                      for="name"
                      class="col-md-4 col-form-label text-md-right"
                      >Username</label
                    >
                    <div class="col-md-6">
                      <input
                        id="name"
                        type="text"
                        class="form-control"
                        name="name"
                        required
                        autofocus
                        v-model="register_user.name"
                        :class="[errors.name ? 'is-invalid' : '']"
                      />
                      <small class="text-danger" v-if="errors.name">
                        {{ errors.name[0] }}
                      </small>
                    </div>
                    <!-- /col-md-6 -->
                  </div>
                  <!-- /form-group -->

                  <div class="form-group row">
                    <label
                      for="email"
                      class="col-md-4 col-form-label text-md-right"
                      >E-Mail Address</label
                    >
                    <div class="col-md-6">
                      <input
                        id="email"
                        type="email"
                        class="form-control"
                        name="email"
                        required
                        v-model="register_user.email"
                        :class="[errors.email ? 'is-invalid' : '']"
                      />
                      <small class="text-danger" v-if="errors.email">
                        {{ errors.email[0] }}
                      </small>
                    </div>
                    <!-- /col-md-6 -->
                  </div>
                  <!-- /form-group -->

                  <div class="form-group row">
                    <label
                      for="password"
                      class="col-md-4 col-form-label text-md-right"
                      >Password</label
                    >
                    <div class="col-md-6">
                      <input
                        id="password"
                        type="password"
                        class="form-control"
                        name="password"
                        required
                        v-model="register_user.password"
                        :class="[errors.password ? 'is-invalid' : '']"
                      />
                      <small class="text-danger" v-if="errors.password">
                        {{ errors.password[0] }}
                      </small>
                    </div>
                    <!-- /col-md-6 -->
                  </div>
                  <!-- /form-group -->

                  <div class="form-group row">
                    <label
                      for="confirm_password"
                      class="col-md-4 col-form-label text-md-right"
                      >Confirm Password</label
                    >
                    <div class="col-md-6">
                      <input
                        id="confirm_password"
                        type="password"
                        class="form-control"
                        name="confirm_password"
                        required
                        v-model="register_user.password_confirmation"
                      />
                    </div>
                    <!-- /col-md-6 -->
                  </div>
                  <!-- /form-group -->

                  <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                      <button
                        type="submit"
                        class="btn btn-primary"
                        @click="registerUser"
                      >
                        Register
                      </button>
                    </div>
                  </div>
                </div>
                <!-- /card-body -->
              </div>
              <!-- /card -->
            </div>
            <!-- /tab-pane -->

            <div
              class="tab-pane fade"
              id="nav-profile"
              role="tabpanel"
              aria-labelledby="nav-profile-tab"
            >
              <div class="card">
                <div class="card-body">
                  <div class="form-group row">
                    <label
                      for="name"
                      class="col-md-4 col-form-label text-md-right"
                      >Username</label
                    >
                    <div class="col-md-6">
                      <input
                        id="name"
                        type="text"
                        class="form-control"
                        name="name"
                        required
                        autofocus
                        v-model="register_doctor.name"
                        :class="[errors_2.name ? 'is-invalid' : '']"
                      />
                      <small class="text-danger" v-if="errors_2.name">
                        {{ errors_2.name[0] }}
                      </small>
                    </div>
                    <!-- /col-md-6 -->
                  </div>
                  <!-- /form-group -->

                  <div class="form-group row">
                    <label
                      for="email"
                      class="col-md-4 col-form-label text-md-right"
                      >E-Mail Address</label
                    >
                    <div class="col-md-6">
                      <input
                        id="email"
                        type="email"
                        class="form-control"
                        name="email"
                        required
                        v-model="register_doctor.email"
                        :class="[errors_2.email ? 'is-invalid' : '']"
                      />
                      <small class="text-danger" v-if="errors_2.email">
                        {{ errors_2.email[0] }}
                      </small>
                    </div>
                    <!-- /col-md-6 -->
                  </div>
                  <!-- /form-group -->

                  <div class="form-group row">
                    <label
                      for="password"
                      class="col-md-4 col-form-label text-md-right"
                      >Password</label
                    >
                    <div class="col-md-6">
                      <input
                        id="password"
                        type="password"
                        class="form-control"
                        name="password"
                        required
                        v-model="register_doctor.password"
                        :class="[errors_2.password ? 'is-invalid' : '']"
                      />
                      <small class="text-danger" v-if="errors_2.password">
                        {{ errors_2.password[0] }}
                      </small>
                    </div>
                    <!-- /col-md-6 -->
                  </div>
                  <!-- /form-group -->

                  <div class="form-group row">
                    <label
                      for="confirm_password"
                      class="col-md-4 col-form-label text-md-right"
                      >Confirm Password</label
                    >
                    <div class="col-md-6">
                      <input
                        id="confirm_password"
                        type="password"
                        class="form-control"
                        name="confirm_password"
                        required
                        v-model="register_doctor.password_confirmation"
                      />
                    </div>
                    <!-- /col-md-6 -->
                  </div>
                  <!-- /form-group -->

                  <div class="form-group row">
                    <label
                      for="ktp"
                      class="col-md-4 col-form-label text-md-right"
                      >Nomor STR</label
                    >
                    <div class="col-md-6">
                      <input
                        id="nomor_str"
                        type="text"
                        class="form-control"
                        name="nomor_str"
                        required
                        v-model="register_doctor.no_str"
                        :class="[errors_2.no_str ? 'is-invalid' : '']"
                      />
                      <small class="text-danger" v-if="errors_2.no_str">
                        {{ errors_2.no_str[0] }}
                      </small>
                    </div>
                    <!-- /col-md-6 -->
                  </div>
                  <!-- /form-group -->

                  <div class="form-group row">
                    <label
                      for="ktp"
                      class="col-md-4 col-form-label text-md-right"
                      >Ijazah / Sertifikat</label
                    >
                    <div class="col-md-6">
                      <div class="input-group custom-file-upload">
                        <input
                          type="text"
                          name="filename2"
                          class="form-control bg-white"
                          accept="image/*"
                          :placeholder="
                            register_doctor.sertif
                              ? register_doctor.sertif.name
                              : 'No file selected'
                          "
                          readonly
                          required
                          :class="[errors_2.sertif ? 'is-invalid' : '']"
                        />
                        <span class="input-group-btn">
                          <div class="btn btn-secondary custom-file-uploader">
                            <input
                              type="file"
                              name="file"
                              @change="changeSertif"
                              accept="image/*"
                              required
                            />
                            Choose file
                          </div>
                        </span>
                      </div>
                      <small class="text-danger" v-if="errors_2.sertif">
                        {{ errors_2.sertif[0] }}
                      </small>
                    </div>
                    <!-- /col-md-6 -->
                  </div>
                  <!-- /form-group -->

                  <div class="form-group row">
                    <label
                      for="ktp"
                      class="col-md-4 col-form-label text-md-right"
                      >Surat Ijin Praktek</label
                    >
                    <div class="col-md-6">
                      <div class="input-group custom-file-upload hover-pointer">
                        <input
                          type="text"
                          name="filename3"
                          accept="image/*"
                          class="form-control bg-white"
                          :placeholder="
                            register_doctor.surat_izin
                              ? register_doctor.surat_izin.name
                              : 'No file selected'
                          "
                          readonly
                          required
                          :class="[errors_2.surat_izin ? 'is-invalid' : '']"
                        />
                        <span class="input-group-btn">
                          <div
                            class="btn btn-secondary custom-file-uploader hover-pointer"
                          >
                            <input
                              type="file"
                              name="file"
                              @change="changeSuratIzin"
                              accept="image/*"
                              required
                            />
                            Choose file
                          </div>
                        </span>
                      </div>
                      <small class="text-danger" v-if="errors_2.surat_izin">
                        {{ errors_2.surat_izin[0] }}
                      </small>
                    </div>
                    <!-- /col-md-6 -->
                  </div>
                  <!-- /form-group -->

                  <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                      <button
                        type="submit"
                        class="btn btn-primary"
                        @click="registerDoctor"
                      >
                        Register
                      </button>
                    </div>
                  </div>
                </div>
                <!-- /card-body -->
              </div>
              <!-- /card -->
            </div>
            <!-- /tab-pane -->
          </div>
          <!-- /tab-content -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["home"],
  data() {
    return {
      register_user: {
        name: "",
        email: "",
        password: "",
        password_confirmation: ""
      },
      register_doctor: {
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
        no_str: "",
        sertif: null,
        surat_izin: null
      },
      errors: [],
      errors_2: []
    };
  },
  methods: {
    changeSertif(e) {
      this.register_doctor.sertif = e.target.files[0];
    },
    changeSuratIzin(e) {
      this.register_doctor.surat_izin = e.target.files[0];
    },
    registerUser() {
      axios
        .post("/register", this.register_user)
        .then(res => {
          window.location = this.home;
        })
        .catch(err => {
          this.errors = err.response.data.errors;
        });
    },
    registerDoctor() {
      const config = {
        headers: { "content-type": "multipart/form-data" }
      };

      let formData = new FormData();
      formData.append("name", this.register_doctor.name);
      formData.append("email", this.register_doctor.email);
      formData.append("password", this.register_doctor.password);
      formData.append(
        "password_confirmation",
        this.register_doctor.password_confirmation
      );
      formData.append("no_str", this.register_doctor.no_str);
      formData.append("sertif", this.register_doctor.sertif);
      formData.append("surat_izin", this.register_doctor.surat_izin);

      axios
        .post("/register/doctor", formData, config)
        .then(res => {
          window.location = this.home;
        })
        .catch(err => {
          this.errors_2 = err.response.data.errors;
        });
    }
  }
};
</script>

<style>
.hover-pointer:hover {
  cursor: pointer !important;
}
.custom-file-uploader {
  position: relative;
  border-bottom-left-radius: 0px;
  border-top-left-radius: 0px;
  color: #495057;
  border-left-width: 0px;
  border-color: #ced4da;
  background-color: #e9ecef;
  cursor: pointer;
}
.custom-file-uploader:hover,
.custom-file-uploader:focus,
.custom-file-uploader:active {
  cursor: pointer;
  color: #495057 !important;
  border-color: #ced4da !important;
  background-color: #e9ecef !important;
}
.custom-file-uploader input[type="file"] {
  display: block;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 5;
  width: 100%;
  height: 100%;
  opacity: 0;
  cursor: default;
}
.custom-file-upload .form-control.bg-white {
  background-color: white !important;
}
</style>
