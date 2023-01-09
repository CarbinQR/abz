<template>
  <div>
    <h1>Users list</h1>
    <el-table :data="users" border style="width: 100%">
      <el-table-column prop="photo" label="Photo" />
      <el-table-column prop="email" label="Email" />
      <el-table-column prop="name" label="Name" />
      <el-table-column prop="phone" label="Address" />
      <el-table-column prop="position" label="Position" />
      <el-table-column prop="registration_timestamp" label="Timestamp" />
      <el-table-column align="right">
        <template #default="scope">
          <el-button size="small" @click="handleDetails(scope.row)">
            Details
          </el-button>
          <el-button size="small" @click="handleGenerateToken(scope.row)">
            Generate token
          </el-button>
        </template>
      </el-table-column>
    </el-table>
    <el-button size="small" @click="handleShowMore()">
      Show more
    </el-button>
    <UserModal ref="userModal" :model="activeItem"/>
    <TokenModal ref="tokenModal" :model="activeItem"/>
  </div>
</template>

<script>
import userService from "../../services/user.js";
import UserModal from "./Modal.vue";
import TokenModal from "../Token/Modal.vue";
export default {
  components: {
    UserModal,
    TokenModal
  },
  data() {
    return {
      users: [],
      offset: 0,
      defaultOffset: 6,
      count: 5,
      visible: false,
      activeItem: {},
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
    handleGenerateToken(data) {
      userService.generateToken(data.id).then(res => {
        data.token = res.token;
        this.activeItem = data;
        this.$refs.tokenModal.visible = true;
      })
    },

    handleShowMore() {
      this.offset += this.defaultOffset;

      userService.fetchList({offset: this.offset, count: this.count}).then(res => {
        this.users = this.users.concat(res.users);
      });
    },
  },
  mounted() {
    this.fetchUsers();
  }
}
</script>