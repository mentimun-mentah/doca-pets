<template>
  <div class="container">
    <section class="mt-3 detail-data">
      <h1 class="entry-title h3">
        {{pet.nama}}
      </h1>
      <div class="post-thumbnail header row mb-3">
        <div class="embed-responsive embed-responsive-16by9">
          <img
            :src="storage + '/' + pet.photo"
            class="card-img-top embed-responsive-item obj-fit-cover img-thumbnail"
            alt="animal"
          />
        </div>
      </div>
      
      <div class="desc-container" v-html="pet.deskripsi"></div>
    </section>

  </div>
</template>

<script>
export default {
  props: ['pet', 'storage']
};
</script>

<style>
.detail-data img {
  width: 100%;
}
.desc-container * {
  background-color: inherit!important;
}
</style>
