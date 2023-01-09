<template>
  <el-dialog v-model="visible" :show-close="false">
    <template #header="{ close, titleId, titleClass }">
      <div class="my-header">
        <el-button type="danger" @click="close">
          Close
        </el-button>
      </div>
    </template>
    Token: {{ token }}
  </el-dialog>
</template>

<script>
export default {
  props: {
    token: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      visible: false,
    }
  }
}
</script>

<style scoped>
.my-header {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}
</style>
