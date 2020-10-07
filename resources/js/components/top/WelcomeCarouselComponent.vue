<template>
  <div class="carousel slide row" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img :src="resultImages[0].src" alt="First slide" />
      </div>
      <div class="carousel-item">
        <img :src="resultImages[1].src" alt="Second slide" />
      </div>
      <div class="carousel-item">
        <img :src="resultImages[2].src" alt="Third slide" />
      </div>
      <a
        class="carousel-control-prev"
        href="#example-2"
        role="button"
        data-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a
        class="carousel-control-next"
        href="#example-2"
        role="button"
        data-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      images: [
        {
          src: "http://xs055583.xsrv.jp/storage/images/common/home.png",
        },
        {
          src: "http://xs055583.xsrv.jp/storage/images/common/show.png",
        },
        {
          src: "http://xs055583.xsrv.jp/storage/images/common/news.png",
        },
      ],
    };
  },
  computed: {
    resultImages() {
      let images = this.images;
      return images;
    },
  },
};
</script>

<style scoped>
.carousel {
  width: 90%;
  margin: 0 auto;
  margin-top: 100px;
}

.carousel img {
  display: block;
  object-fit: contain;
  margin: 0 auto;
  box-shadow: 0px 0px 20px -5px rgba(0, 0, 0, 0.8);
}
</style>

​
