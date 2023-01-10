<template>
  <el-dialog v-model="visible" :show-close="false">
    <template #header="{ close, titleId, titleClass }">
      <div class="my-header">
        <h4 :id="titleId" :class="titleClass">User {{ model.name }}!</h4>
        <el-button type="danger" @click="close">
          Close
        </el-button>
      </div>
    </template>
    <img v-if="model.photo" :src="getImageUrl(model.photo)" class="el-image__preview">
    <img v-else :src="defaultImage" class="el-image__preview">
    <el-descriptions :column="6"  direction="vertical" border>
      <el-descriptions-item label="ID" label-align="center" align="center" label-class-name="my-label" class-name="my-content" >
            {{ model.id }}
        </el-descriptions-item>
        <el-descriptions-item label="email" label-align="center" align="center">
            {{ model.email }}
        </el-descriptions-item>
        <el-descriptions-item label="phone" label-align="center" align="center">
            {{ model.phone }}
        </el-descriptions-item>
        <el-descriptions-item label="position" label-align="center" align="center">
           <el-tag size="small">{{ model.position }}</el-tag>
        </el-descriptions-item>
        <el-descriptions-item label="registration_timestamp" label-align="center" align="center">
            {{ model.registration_timestamp }}
        </el-descriptions-item>
      </el-descriptions>
  </el-dialog>
</template>

<script>
import defaultImage from '../../assets/vue.svg';
import CONSTANTS from "../../constants.js";

export default {
  props: {
    model: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      defaultImage: defaultImage,
      visible: false,
    }
  },
  methods: {
    getImageUrl(path) {
      return CONSTANTS.API_APP_URL + path;
    }
  },
}
</script>

<style scoped>
.my-header {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}
</style>
