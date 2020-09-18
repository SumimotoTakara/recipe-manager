<template>
  <div class="nav-box bg-light mx-auto">
    <div v-bind:class="{ active: isActive }" @click="selectOut">
      <h3 class="w-100 text-center text-light p-1">
        Category
        <i v-if="isActive" class="ml-2 fas fa-toggle-on"></i>
        <i v-else class="ml-2 fas fa-toggle-off"></i>
      </h3>
    </div>
    <ul class="p-0 w-100">
      <li
        class="nav-item mt-4 radio-box"
        v-for="navItem in navItems"
        :key="navItem.cate"
      >
        <div>
          <label :for="navItem.cate">
            <input
              type="radio"
              name="radio"
              :id="navItem.cate"
              :value="navItem.cate"
              @input="select"
            /><span>{{ navItem.name }}</span>
          </label>
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  props: ["category"],
  data() {
    return {
      isActive: false,
      navItems: [
        { cate: "salad", name: "サラダ" },
        { cate: "meat", name: "お肉" },
        { cate: "fried", name: "揚げ物" },
        { cate: "dessert", name: "デザート" },
      ],
    };
  },

  methods: {
    select(event) {
      this.$emit("input", event.target.value);
      this.isActive = true;
    },
    selectOut() {
      this.$emit("select-out");
      for (var element of document.getElementsByName("radio")) {
        element.checked = false;
        this.isActive = false;
      }
    },
  },
};
</script>

<style scoped>
.nav-box {
  overflow: hidden;
  border-radius: 4px;
  width: 75%;
  cursor: default;
}

.nav-box h3 {
  font-size: 1.5rem;
  letter-spacing: 2px;
  background-color: #31487d;
}
.nav-box .active {
  cursor: pointer;
}
.nav-box .active:hover {
  opacity: 0.9;
}

.nav-box h3 i::before {
  font-size: 1.5rem;
}

.radio-box {
  display: block;
  width: 120px;
  margin: 0 auto;
}

.radio-box label {
  display: block;
  margin: 0 auto;
}
.radio-box label input[type="radio"] {
  position: absolute;
  opacity: 0;
}
.radio-box label span {
  display: block;
  text-align: center;
  color: #6c757d;
  font-size: 0.8rem;
  font-weight: 400;
  padding: 0.1rem;
  letter-spacing: 6px;
  border-radius: 100vh;
  border: 2px solid transparent;
  transition: border 0.3s;
}
.radio-box label span:hover {
  cursor: pointer;
  border: 2px solid #6c757d;
}
#salad[type="radio"]:checked + span {
  border: 2px solid #76c047;
}
#meat[type="radio"]:checked + span {
  border: 2px solid #ffc0cb;
}
#fried[type="radio"]:checked + span {
  border: 2px solid #fff100;
}
#dessert[type="radio"]:checked + span {
  border: 2px solid #c1efff;
}

@media (max-width: 899px) {
  .nav-box {
    width: 100%;
  }
  .nav-box h2 {
    font-size: 1.4rem;
  }
  .radio-box {
    display: inline-block;
    width: 20%;
    margin: 0 2%;
  }
  .radio-box label span {
    font-size: 0.8rem;
    letter-spacing: 0px;
  }
}
</style>
