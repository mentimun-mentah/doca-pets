<template>
  <div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <section class="mt-3 mb-4">
            <h2 class="text-center h4 mb-4">Profil Dokter</h2>
            <div class="card shadow">
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Nomor STR</label>
                    <input type="text" class="form-control" placeholder="763724572939843" readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Spesialis</label>
                    <input type="text" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea class="form-control" rows="2" required></textarea>
                </div>
                <div class="form-group">
                  <label>Nama Klinik</label>
                  <input type="text" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>
                    Lokasi Klinik <i class="far fa-info-circle hover-pointer" data-toggle="modal" data-target="#staticBackdrop"></i>
                  </label>
                  <textarea class="form-control" rows="1" required></textarea>
                </div>
                <div class="form-group">
                  <label>Pengalaman Praktik</label>
                  <div class="controls-praktik">
                    <div class="entry-praktik input-group mb-2">
                      <input type="text" class="form-control" name="fields[]" required/>
                       <div class="input-group-append">
                        <button class="btn btn-outline-secondary btn-add-praktik" type="button">
                          <i class="far fa-plus"></i>
                        </button>
                      </div>
                    </div><!-- /entry -->
                  </div><!-- /controls -->
                </div>
                <div class="form-group">
                  <label>Riwayat Pendidikan</label>
                  <div class="controls-riwayat">
                    <div class="entry-riwayat input-group mb-2">
                      <input type="text" class="form-control" name="fields[]" required/>
                      <div class="input-group-append">
                        <button class="btn btn-outline-secondary btn-add-riwayat" type="button">
                          <i class="far fa-plus"></i>
                        </button>
                      </div>
                    </div><!-- /entry -->
                  </div><!-- /controls -->
                </div>
                 <div class="form-row">
                  <div class="form-group col-md-6 col-sm-12">
                    <label class="d-block">Sertifikat</label>
                    <img
                      class="img-fluid w-100 rounded obj-fit-cover img-thumbnail img-doctor-letter" alt="animal"
                      src="https://i1.wp.com/hewanpedia.com/wp-content/uploads/2020/12/Berang-berang-di-Sawah.jpg?resize=1280%2C640&ssl=1"
                      style="height: 30vh;"
                      data-toggle="modal" data-target="#modal-sertif"
                    >
                  </div>
                  <div class="form-group col-md-6 col-sm-12">
                    <label class="d-block">Surat Izin</label>
                    <img
                      class="img-fluid w-100 rounded obj-fit-cover img-thumbnail img-doctor-letter" alt="animal"
                      src="https://i2.wp.com/hewanpedia.com/wp-content/uploads/2017/11/Foto-Ubur-ubur.jpeg?resize=1080%2C608&ssl=1"
                      style="height: 30vh;"
                      data-toggle="modal" data-target="#modal-surat-izin"
                    >
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
              </div><!-- /card-body -->
            </div><!-- /card -->
          </section>
        </div><!-- /col -->
      </div><!-- /row -->
    </div><!-- /container -->

    <!-- Modal Lokasi -->
    <div
      class="modal fade"
      id="staticBackdrop"
      data-backdrop="static"
      data-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div
        class="modal-dialog"
      >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Cara menambahkan lokasi</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <ol>
              <li>
                Buka halaman
                <a target="_blank" href="https://maps.google.com/">
                  Google Maps
                </a>
                dan cari alamat klinik.
              </li>
              <li>Klik share/bagikan pada bagian disebelah kiri detail informasi tempat lokasi.</li>
              <li>Pilih Embed a map/Sematkan peta.</li>
              <li>Klik Copy HTML/Salin HTML.</li>
              <li>Lalu paste/tempel pada form Lokasi Klinik.</li>
            </ol>
          </div><!-- /modal-body-->
        </div>
      </div>
    </div>
    <!-- Modal Lokasi -->

    <!-- Modal Sertifikat -->
    <div class="modal fade" id="modal-sertif" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <div class="modal-body p-0">
            <img src="https://i1.wp.com/hewanpedia.com/wp-content/uploads/2020/12/Berang-berang-di-Sawah.jpg?resize=1280%2C640&ssl=1" alt="" style="width:100%">
          </div>
          <center class="p-2">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
          </center>
        </div>
      </div>
    </div>
    <!-- Modal Sertifikat -->

    <!-- Modal Sertifikat -->
    <div class="modal fade" id="modal-surat-izin" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <div class="modal-body p-0">
            <img src="https://i2.wp.com/hewanpedia.com/wp-content/uploads/2017/11/Foto-Ubur-ubur.jpeg?resize=1080%2C608&ssl=1" alt="" style="width:100%">
          </div>
          <center class="p-2">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
          </center>
        </div>
      </div>
    </div>
    <!-- Modal Sertifikat -->

  </div>
</template>
<script>
export default {
  mounted() {
    $(function () {
      $(document)
        .on("click", ".btn-add-praktik", function (e) {
          e.preventDefault();

          var controlForm = $(".controls-praktik:first"),
            currentEntry = $(this).parents(".entry-praktik:first"),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

          newEntry.find("input").val("");
          controlForm
            .find(".entry-praktik:not(:last) .btn-add-praktik")
            .removeClass("btn-add-praktik")
            .addClass("btn-remove-praktik")
            .removeClass("btn-outline-dark")
            .addClass("btn-outline-danger")
            .html('<i class="far fa-minus"></i>');
        })
        .on("click", ".btn-remove-praktik", function (e) {
          $(this).parents(".entry-praktik:first").remove();
          e.preventDefault();
          return false;
        });
    });

    $(function () {
      $(document)
        .on("click", ".btn-add-riwayat", function (e) {
          e.preventDefault();

          var controlForm = $(".controls-riwayat:first"),
            currentEntry = $(this).parents(".entry-riwayat:first"),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

          newEntry.find("input").val("");
          controlForm
            .find(".entry-riwayat:not(:last) .btn-add-riwayat")
            .removeClass("btn-add-riwayat")
            .addClass("btn-remove-riwayat")
            .removeClass("btn-outline-dark")
            .addClass("btn-outline-danger")
            .html('<i class="far fa-minus"></i>');
        })
        .on("click", ".btn-remove-riwayat", function (e) {
          $(this).parents(".entry-riwayat:first").remove();
          e.preventDefault();
          return false;
        });
    });
  }
};
</script>
