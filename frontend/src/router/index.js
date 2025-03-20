import Vue from "vue";
import Router from "vue-router";
import DeviceInfo from "@/components/DeviceInfo.vue";
import Home from "@/pages/HomePage.vue";

Vue.use(Router);

export default new Router({
  mode: "history",
  routes: [
    { path: "/", component: Home },
    {
      path: "/deviceInfo",
      name: "DeviceInfo",
      component: DeviceInfo,
    },
  ],
});