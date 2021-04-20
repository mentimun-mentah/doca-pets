<template>
  <div class="container">
    <section class="mt-3 detail-data">
      <h1 class="entry-title h3">
        {{treat.judul}}
      </h1>
      <div class="post-thumbnail header row mb-3">
        <img
          :src="storage + '/' + treat.photo"
          alt="6 Jenis dan Harga Ikan Guppy serta Cara Merawatnya"
          class="img-thumbnail"
        />
      </div>

      <div class="desc-container" v-html="treat.deskripsi"></div>
    </section>

  </div>
</template>

<script>
export default {
  props: ['treat', 'storage']
};
</script>

<style>
.detail-data img {
  width: 100%;
}
</style>
