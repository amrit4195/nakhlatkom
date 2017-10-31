<template>
  <div class="page_content">
    <div >
      <div style="width:500px; margin-left:50px;padding-top:20px;">
        <el-carousel height="300px">
          <el-carousel-item v-for="ia_array in image_array">
            <img :src="ia_array" style="width:500px;height:300px;">
          </el-carousel-item>
        </el-carousel>
      </div>
      <div >
        <label style="position:absolute;right:30%;top:100px;font-size:24px;">Product name</label>
        <div style="position:absolute;right:32%;top:200px;">
          <label style="display:inline-block;font-size:18px;">Product description</label>
        </div>
        <div style="position:absolute;right:32%;top:300px;">
          <label style="display:inline-block;font-size:18px;">Seller shop name</label>
          <el-rate style="width:200px;display:inline-block;" v-model="good_rate" :colors="['#99A9BF', '#F7BA2A', '#FF9900']"></el-rate>
          <br>
          <br>
          <p style="display:inline-block;">Send message </p>
          <i style="display:inline-block;margin-left:20px;cursor:pointer;" class="el-icon-message"></i>

        </div>
      </div>
    </div>
    <!--part 2-->
    <div>

    </div>
  </div>
</template>
<script>
// import axios from 'axios'
export default {
  data () {
    return {
      user_access: null,
      product_id: null,
      user_access: null,
      // product data
      image_array: ['https://www.w3schools.com/w3images/fjords.jpg', 'https://www.w3schools.com/w3css/img_lights.jpg'],
      good_rate: null
    }
  },
  mounted () {
    if (localStorage.getItem('user_access') !== null && localStorage.getItem('user_access') !== undefined) {
      this.user_access = localStorage.getItem('user_access')
      this.product_id = this.$route.params.product_id
    }
  },
  methods: {
  }
}
</script>
<style>
.rec_one_home{
  background-color:  #f2f2f2;
  width:100%;
  height: 50px;
  top:0;
  left:0;
  position: absolute;
}

</style>
