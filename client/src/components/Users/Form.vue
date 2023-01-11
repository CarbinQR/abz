<template>
  <div>
    <h1>Create user</h1>
    <el-form
        ref="ruleFormRef"
        :model="model"
        label-position="top"
        label-width="120px"
        class="demo-ruleForm"
        status-icon>
      <el-form-item label="Position *" prop="position">
        <el-select v-model="model.position_id" placeholder="Position">
          <el-option v-for="position in positions" :key="position.id" :label="position.name" :value="position.id" />
        </el-select>
      </el-form-item>
      <el-form-item label="Full name *" prop="name">
        <el-input v-model="model.name" />
      </el-form-item>
      <el-form-item label="Password *" prop="password">
        <el-input v-model="model.password" type="password"/>
      </el-form-item>
      <el-form-item label="Confirm password *" prop="password_confirmation">
        <el-input v-model="model.password_confirmation" type="password" />
      </el-form-item>
      <el-form-item label="Email *" prop="email">
        <el-input v-model="model.email" />
      </el-form-item>
      <el-form-item label="Phone *" prop="phone">
        <el-input v-model="model.phone" />
      </el-form-item>
      <el-form-item label="Token *" prop="Token">
        <el-input v-model="model.token" />
      </el-form-item>
      <el-form-item label="Photo *" prop="Photo">
        <input type="file" class="form-control" v-on:change="onChange">
      </el-form-item>
    </el-form>
    <el-button class="btn btn-primary btn-block mt-5" @click="storeModel">Save</el-button>
  </div>
</template>

<script>
import UserModal from "./Modal.vue";
import TokenModal from "../Token/Modal.vue";
import positionService from "../../services/position.js";
import userService from "../../services/user.js";
import {ElNotification} from "element-plus";

export default {
  components: {
    UserModal,
    TokenModal
  },
  data() {
    return {
      model: {
        name: '',
        phone: '',
        email: '',
        position_id: null,
        file: null,
        password: '',
        password_confirmation: '',
        token: ''
      },
      positions: []
    }
  },
  methods: {
    fetchPositions() {
      positionService.fetchList().then(res => {
        this.positions = res.positions;
      });
    },
    onChange(e) {
      this.model.file = e.target.files[0];
    },
    storeModel() {
      userService.store(this.model).then(res => {
        this.onSuccess(res.message);
      }).catch(e => {
        this.onError(e.response.data)
      })
    },
    onSuccess(message) {
      ElNotification({
        title: 'Success',
        message: message,
        type: 'success',
      })
    },
    onError(err) {
      ElNotification({
        title: err.message,
        message: err.fails,
        type: 'error',
      })
    }
  },
  beforeMount() {
    this.fetchPositions();
  }
}
</script>
