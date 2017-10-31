<template>
  <div class="page_content" style="margin-top:3%;">
    <div >
          <img src="../assets/home/nak_name.png" style="margin-left:260px;" />
    <el-form style="width:50%;margin-left:25%;">
      <!-- <el-form-item>
        <template>
          <label style="font-size:25px;margin-left:20px;">Create Your Account</label>
        </template>
      </el-form-item> -->
      <el-form-item label="Username:">
        <el-input v-model="username" style="width:80%;"></el-input>
      </el-form-item>
      <el-form-item label="Password:">
        <el-input v-model="password" type="password" style="width:80%;margin-left:2px;"></el-input>
      </el-form-item>
      <el-form-item label="Phone:">
        <el-input v-model="phone" style="width:80%;margin-left:23px;"></el-input>
      </el-form-item>
      <el-form-item >
        <template>
          <el-checkbox v-model="user_agree"></el-checkbox>
          <p style="display:inline-block;margin-left:10px"> I agree the <p style="color:#0099ff;display:inline-block;cursor:pointer;">《User Agreement》</p></p>
        </template>
      </el-form-item>
      <el-form-item>
        <template>
          <el-button @click="sign_up" style="width:300px;">Sign up</el-button>
        </template>
      </el-form-item>
    </el-form>
    <!-- <form method="post" action="test.php"><input name="tags[]"></input><input type="submit" value="submit"></input></form> -->
    </div>

    <div class="footer"><p style="margin-top:15px;">Develop by Nakhlatkom</p></div>
  </div>
</template>
<script>
import axios from 'axios'
// var ENV_PARAMS = require('../../env.js')
export default {
  data () {
    return {
      username: null,
      password: null,
      phone: null,
      user_agree: false
    }
  },
  mounted () {
    if (localStorage.getItem('user_access') !== null && localStorage.getItem('user_access') !== undefined) {
      this.$router.push('/')
    }
  },
  methods: {
    sign_up:function () {
      var self = this
      if (self.user_agree !== false) {
        if (self.username !== null && self.password !== null && self.phone !== null && self.phone.length > 5) {
          axios({
            method: 'post',
            url: 'http://localhost/php/sign_up_account.php',
            params: {
              input_username: self.username,
              input_password: self.password,
              input_phone: self.phone
            }
          })
          .then(function (res) {
            console.log(res.data.records)
            if (res.data.message === 'Create new') {
              self.$message({
                message: 'Create successful',
                type: 'success'
              })
              setTimeout(function(){ location.href = "./" }, 2000)
              // location.href = "./"
            } else {
              self.$message({
                message: 'Phone already exist',
                type: 'warning'
              })
              location.reload()
            }
          })
        } else {
          self.$message({
            message: 'Please input right information',
            type: 'warning'
          })
        }
      } else {
        self.$message({
          message: 'Have to agree with user agreement.',
          type: 'warning'
        })
      }
    },
    check () {
      console.log(this.user_agree)
    }
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
.footer{
  background-color: #e6e6e6;
  width: 100%;
  height: 50px;
  bottom: 0;
  left: 0;
  position: absolute;
}
</style>
