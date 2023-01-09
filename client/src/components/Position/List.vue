<template>
  <div>
    <h1>Positions list</h1>
    <el-table :data="list" border style="width: 100%">
      <el-table-column prop="id" label="ID" />
      <el-table-column prop="name" label="Name" />
    </el-table>
  </div>
</template>

<script>
import positionService from "../../services/position.js";

export default {
  data() {
    return {
      list: [],
    }
  },
  methods: {
    fetchList() {
      positionService.fetchList().then(res => {
        this.list = res.positions;
      });
    },
  },
  mounted() {
    this.fetchList();
  }
}
</script>