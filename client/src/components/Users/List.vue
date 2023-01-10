<template>
  <div>
    <h1>Users list</h1>
    <el-table :data="users" border style="width: 100%">
      <el-table-column align="center" prop="photo" label="Photo">
        <template #default="scope">
          <img v-if="scope.row.photo" :src="getImageUrl(scope.row.photo)" class="el-image__preview">
          <img v-else :src="defaultImage" class="el-image__preview">
        </template>
      </el-table-column>
      <el-table-column prop="email" label="Email" />
      <el-table-column prop="name" label="Name" />
      <el-table-column prop="phone" label="Address" />
      <el-table-column prop="position" label="Position" />
      <el-table-column prop="registration_timestamp" label="Timestamp" />
      <el-table-column align="center">
        <template #default="scope">
          <el-button size="small" @click="handleDetails(scope.row)">
            Details
          </el-button>
        </template>
      </el-table-column>
    </el-table>
    <el-button size="small" @click="handleShowMore()">
      Show more
    </el-button>
    <UserModal ref="userModal" :model="activeItem"/>
  </div>
</template>

<script>
import userService from "../../services/user.js";
import UserModal from "./Modal.vue";
import defaultImage from '../../assets/vue.svg';
import CONSTANTS from "../../constants.js";

export default {
  components: {
    UserModal,
  },
  data() {
    return {
      users: [],
      offset: 0,
      defaultOffset: 6,
      count: 5,
      visible: false,
      activeItem: {},
      defaultImage,
    }
  },
  methods: {
    fetchUsers() {
      userService.fetchList().then(res => {
        this.users = res.users;
      });
    },
    handleDetails(data) {
      userService.fetch(data.id).then(res => {
        this.activeItem = res.user;
        this.$refs.userModal.visible = true;
      })
    },
    handleShowMore() {
      this.offset += this.defaultOffset;

      userService.fetchList({offset: this.offset, count: this.count}).then(res => {
        this.users = this.users.concat(res.users);
      });
    },
    getImageUrl(path) {
      return CONSTANTS.API_APP_URL + path;
    }
  },
  mounted() {
    this.fetchUsers();
  }
}
</script>