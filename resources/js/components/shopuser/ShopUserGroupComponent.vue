<template>
  <div>
    <table class="table ">
      <tr
        v-for="user in shopUsers"
        :key="user.id"
        @click="confirmDeletion(user.user_id)"
      >
        <td class="img">
          <img
            :src="
              'http://xs055583.xsrv.jp/storage/images/profile_images/' +
                user.user.profile_image
            "
            alt=""
          />
        </td>
        <td class="name">{{ user.user.name }}</td>
        <td class="day">{{ user.created_at.slice(0, 10) }}</td>
      </tr>
    </table>

    <form action="" method="POST" ref="shopUserDeletion">
      <input type="hidden" name="_token" :value="csrf" />
      <input type="hidden" name="_method" value="DELETE" />
    </form>
  </div>
</template>

<script>
export default {
  props: ["csrf","shopUsers", "userId"],
  methods: {
    jumpProfile(id) {
      location.href = "/users/" + id;
    },
    confirmDeletion(id) {
      if (id === this.userId) {
        this.jumpProfile(id);
      } else {
        let that = this;
        let form = this.$refs.shopUserDeletion;
        this.$dialog
          .confirm(
            {
              title: "確認",
              body: "スタッフを退会させますか？",
            },
            {
              okText: "はい",
              cancelText: "キャンセル",
            }
          )
          .then(function() {
            form.action = "/shopusers/" + id;
            that.submitDeletion();
          });
      }
    },
    submitDeletion() {
      this.$refs.shopUserDeletion.submit();
    },
  },
};
</script>

<style scoped>
tr {
  height: 4rem;
  transition: all 0.4s;
}
tr:hover {
  background-color: rgba(0, 0, 0, 0.1);
  cursor: pointer;
}

td img {
  display: block;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  box-shadow: 0 0 6px -1px rgba(0, 0, 0, 0.7);
}
tr .name {
  font-size: 1.2rem;
  width: 50%;
  vertical-align: middle;
}
tr .day {
  color: #6c757d;
  width: 30%;
  vertical-align: middle;
}
@media (max-width: 899px) {
  td img {
    width: 40px;
    height: 40px;
  }
}
</style>
