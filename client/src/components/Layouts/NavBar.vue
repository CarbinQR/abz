<template>
  <el-row class="tac">
    <el-col :span="24" style="background-color: #b4d1e5; min-height: 100%; border: 1px solid #FFFFFF">
      <h5 class="mb-2">Menu</h5>
      <el-menu
          active-text-color="#ffd04b"
          background-color="#b4d1e5"
          class="el-menu-vertical"
          default-active="2"
          text-color="#fff">
        <el-sub-menu index="1">
          <template #title>
            <span>Users</span>
          </template>
          <el-menu-item index="1-1">
            <router-link to="/">List</router-link>
          </el-menu-item>
          <el-menu-item index="1-2">
            <router-link to="/users/create">Create</router-link>
          </el-menu-item>
        </el-sub-menu>
        <el-menu-item index="2">
          <template #title>
            <router-link to="/positions">Positions</router-link>
          </template>
        </el-menu-item>
        <el-menu-item index="2">
          <template #title>
            <el-button size="small" @click="handleGenerateToken">
              Generate token
            </el-button>
            <TokenModal ref="tokenModal" :token="token"/>
          </template>
        </el-menu-item>
      </el-menu>
    </el-col>
  </el-row>
</template>

<script>
import userService from "../../services/user.js";
import TokenModal from "../Token/Modal.vue";

export default {
  components: {
    TokenModal
  },
  data() {
    return {
      token: null
    }
  },
  methods: {
    handleGenerateToken() {
      userService.generateToken().then(res => {
        this.token = res.token;
        this.$refs.tokenModal.visible = true;
      })
    },
  }

}


</script>
