<template>
  <div>
    <h1>Create user</h1>
    <el-form
        ref="ruleFormRef"
        :model="model"
        label-width="120px"
        class="demo-ruleForm"
        status-icon>
      <el-form-item label="Full name" prop="name">
        <el-input v-model="model.name" />
      </el-form-item>
      <el-form-item label="Password" prop="password">
        <el-input v-model="model.password" type="password"/>
      </el-form-item>
      <el-form-item label="Confirm password" prop="password_confirmation" type="password">
        <el-input v-model="model.password_confirmation" />
      </el-form-item>
      <el-form-item label="Email" prop="email">
        <el-input v-model="model.email" />
      </el-form-item>
      <el-form-item label="Position" prop="region">
        <el-select v-model="model.position_id" placeholder="Position">
          <el-option v-for="position in positions" :key="position.id" :label="position.name" :value="position.id" />
        </el-select>
      </el-form-item>
      <el-form-item label="Phone" prop="phone">
        <el-input v-model="model.phone" />
      </el-form-item>
      <el-form-item label="Token" prop="Token">
        <el-input v-model="model.token" />
      </el-form-item>
      <input type="file" class="form-control" v-on:change="onChange">
    </el-form>
    <el-button class="btn btn-primary btn-block" @click="storeModel">Save</el-button>
  </div>
</template>

<script>
import UserModal from "./Modal.vue";
import TokenModal from "../Token/Modal.vue";
import positionService from "../../services/position.js";
import userService from "../../services/user.js";
import fileService from "../../services/file.js";
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
    upload(e) {
      e.preventDefault();
      let existingObj = this;
      let data = new FormData();
      data.append('file', this.file);
      fileService.upload(data)
          .then(function (res) {
            existingObj.success = res.data.success;
          })
          .catch(function (err) {
            existingObj.output = err;
          });
    },
    storeModel() {
      userService.store(this.model).then(res => {
        console.log(res);
      })
    }
  },
  beforeMount() {
    this.fetchPositions();
  }
}
</script>
