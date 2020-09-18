require("./bootstrap");

window.Vue = require("vue");

import LoadingComponent from "./components/common/LoadingComponent.vue";
import WelcomePointsComponent from "./components/top/WelcomePointsComponent.vue";
import WelcomeCarouselComponent from "./components/top/WelcomeCarouselComponent.vue";
import HeaderComponent from "./components/common/HeaderComponent.vue";
import BookmarkComponent from "./components/common/BookmarkComponent.vue";
import ProfileEditComponent from "./components/user/ProfileEditComponent.vue";
import ShopUserGroupComponent from "./components/shopuser/ShopUserGroupComponent.vue";
import NavComponent from "./components/recipe/NavComponent.vue";
import NewsGroupComponent from "./components/news/NewsGroupComponent.vue";
import NewsModalComponent from "./components/news/NewsModalComponent.vue";
import NewsPostComponent from "./components/news/NewsPostComponent.vue";
import RecipeGroupComponent from "./components/recipe/RecipeGroupComponent.vue";
import RecipeDetailComponent from "./components/recipe/RecipeDetailComponent.vue";
import IconComponent from "./components/recipe/IconComponent.vue";
import CommentGroupComponent from "./components/comment/CommentGroupComponent.vue";
import CommentPostComponent from "./components/comment/CommentPostComponent.vue";
import utility from "./mixins/utility.js";
import VuejsDialog from "vuejs-dialog";
// import VuejsDialogMixin from "vuejs-dialog/dist/vuejs-dialog-mixin.min.js";
import "vuejs-dialog/dist/vuejs-dialog.min.css";

Vue.component("loading-component", LoadingComponent);
Vue.component("welcome-points-component", WelcomePointsComponent);
Vue.component("welcome-carousel-component", WelcomeCarouselComponent);
Vue.component("header-component", HeaderComponent);
Vue.component("bookmark-component", BookmarkComponent);
Vue.component("profile-edit-component", ProfileEditComponent);
Vue.component("shop-user-group-component", ShopUserGroupComponent);
Vue.component("nav-component", NavComponent);
Vue.component("news-group-component", NewsGroupComponent);
Vue.component("news-modal-component", NewsModalComponent);
Vue.component("news-post-component", NewsPostComponent);
Vue.component("recipe-group-component", RecipeGroupComponent);
Vue.component("recipe-detail-component", RecipeDetailComponent);
Vue.component("icon-component", IconComponent);
Vue.component("comment-group-component", CommentGroupComponent);
Vue.component("comment-post-component", CommentPostComponent);

Vue.mixin(utility);
Vue.use(VuejsDialog);
