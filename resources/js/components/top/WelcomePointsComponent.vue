<template>
  <div class="point-list row">
    <div class="col-sm-4 col-xs-12 point">
      <i class="fas fa-network-wired"></i>
      <div class="title">レシピをネット上で管理</div>
      <p>
        ネット上でレシピを管理することで、より確実に、スムーズにお店の業務を進めることができます。
      </p>
    </div>
    <div class="col-sm-4 col-xs-12 point">
      <i class="fas fa-mobile-alt"></i>
      <div class="title">スマートフォンにも対応</div>
      <p>
        スマートフォンにも対応しているので、就業中でなくても、レシピを見ることができます。
      </p>
    </div>
    <div class="col-sm-4 col-xs-12 point">
      <i class="fas fa-comments"></i>
      <div class="title">ニュース・コメント機能</div>
      <p>
        新しいお料理や、変更などをニュースとして流せるので、情報の共有にに役立ちます。
      </p>
    </div>
  </div>
</template>

<script>
// 
</script>

<style>
.point-list {
  width: 100%;
  margin: 0 !important;
}
.point {
  text-align: center;
}
.point i::before {
  font-size: 6rem;
  color: #ffb549;
}
.point .title {
  margin-top: 10px;
  letter-spacing: 2px;
  font-size: 1.3rem;
  font-weight: 500;
}
.point p {
  font-size: 0.9rem;
  font-weight: 300;
  padding: 5px 10px;
  text-align: left;
}
</style>
