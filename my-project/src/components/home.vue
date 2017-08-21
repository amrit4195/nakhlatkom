<template>
  <div class="page_content">
    <div class="rec_one_home">
      <p style="display: inline-block;color:#404040;">Sign up</p>
      <p style="display: inline-block; margin-left:3%;color:#404040;">Create account</p>
      <p style="display: inline-block; margin-left:50%;color:#404040;">Contact</p>
    </div>
    <img src="../assets/home/logo.jpg" style="width:150px;height:auto;position:absolute;left:80px; top:50px;">
    <div style="padding-top:50px;">
      <el-select v-model="select_search_category" filterable placeholder="category" style="width:12%;">
        <el-input v-model="search_data"></el-input>
      </el-select>
      <el-input placeholder="I am looking for..." v-model="search_data" style="width:50%;">
        <el-button slot="append" icon="search"></el-button>
      </el-input>
    </div>
    <div style="margin-top:60px; width:80%; margin-left:10%;">
      <el-carousel :interval="6000" type="card" height="250px">
          <el-carousel-item v-for="item in 3" :key="item">
            <h3>{{ item }}</h3>
          </el-carousel-item>
      </el-carousel>
    </div>
    <div>
      <el-tabs v-model="user_select_mid_category" type="card" @tab-click="user_mid_category" style="width:70%; margin-left:15%;">
        <el-tab-pane label="用户管理" name="first">用户管理</el-tab-pane>
        <el-tab-pane label="配置管理" name="second">配置管理</el-tab-pane>
        <el-tab-pane label="角色管理" name="third">角色管理</el-tab-pane>
        <el-tab-pane label="定时任务补偿" name="fourth">定时任务补偿</el-tab-pane>
      </el-tabs>
    </div>
    <br><br><br><br><br>  <br><br><br><br><br>  <br><br><br><br><br>  <br><br>
    <div >
    <img src="../assets/home/test2.jpg" style="width:80%; height:300px; border: 3px solid; border-color: #d9d9d9;">
    <br><br>
    <img src="../assets/home/test2.jpg" style="width:80%; height:300px; border: 3px solid; border-color: #d9d9d9;">
  </div>
  <div class="rec_two_home">
    <br>
    <p>Footer</p>
    <p>Copyright 2017 nakhlatkom</p>
  </div>
  </div>
</template>
<script>
export default {
  data () {
    return {
      select_search_category: null,
      search_data: null,
      user_select_mid_category: 'first'
    }
  },
  methods: {
    user_mid_category: function (tab, events) {
      console.log(tab, events)
    }
  }
}
</script>
<style scoped>
.rec_one_home{
  background-color:  #f2f2f2;
  width:100%;
  height: 50px;
  top:0;
  left:0;
  position: absolute;
}
.rec_two_home{
  background-color:  #f2f2f2;
  width:100%;
  height: 120px;
  bottom:0;
  left:0;
}

.el-carousel__item h3 {
  color: #475669;
  font-size: 14px;
  opacity: 0.75;
  line-height: 250px;
  margin: 0;
}

.el-carousel__item:nth-child(2n) {
  background-color: #99a9bf;
}

.el-carousel__item:nth-child(2n+1) {
  background-color: #d3dce6;
}
</style>
<style>
.page_content{
  color:#4d4d4d;
  font-family: Source Han Sans;
}
</style>
