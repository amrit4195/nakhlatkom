<template>
  <div class="page_content" style="margin-top:10%;">
    <!-- <div>
      <label>Username:</label><el-input style="width:400px;margin-left:10px;"></el-input>
      <br>
      <br>
      <label>Password:</label><el-input style="width:400px;margin-left:10px;"></el-input>
      <br>
      <br>
      <el-button style="width:150px;">Sign up</el-button>
    </div> -->
    <img src="../assets/home/nak_name.png" style="margin-left:260px;" />
    <div>
    <el-form style="width:50%;margin-left:25%;" >
      <el-form-item label="Username:">
        <el-input v-model="username" style="width:80%;"></el-input>
      </el-form-item>
      <el-form-item label="Password:">
        <el-input v-model="password" type="password" style="width:80%;margin-left:2px;"></el-input>
      </el-form-item>
      <el-form-item>
        <template>
          <el-button @click="login" style="width:300px;">Log in</el-button>
        </template>
      </el-form-item>
    </el-form>
    <!-- <button @click="check">sss</button> -->
    </div>
      <div class="footer"><p style="margin-top:15px;">Develop by Nakhlatkom</p></div>
  </div>
</template>
<script>
import axios from 'axios'
export default {
  data () {
    return {
      username: null,
      password: null
    }
  },
  mounted () {
    if (localStorage.getItem('user_access') !== null && localStorage.getItem('user_access') !== undefined) {
      this.$router.push('/')
    }
  },
  methods: {
    // check () {
    //   console.log()
    // },
    login: function () {
      var self = this
      if (self.username !== null && self.password !== null) {
        axios({
          method: 'post',
          url: 'http://localhost/php/log_in_check.php',
          params: {
            input_username: self.username,
            input_password: self.password
          }
        })
        .then(function (res) {
          // console.log(res.data.message)
          if (res.data.message !== 'NF') {
            if (res.data.records.length > 0) {
              localStorage.setItem('user_access',res.data.records[0].userid)
              console.log(res.data.records[0].userid)
              location.href = "./"
            }
          } else {
            self.$message({
              message: 'Wrong username or password',
              type: 'warning'
            })
          }
        })
      } else {
        self.$message({
          message: 'Please input username and password',
          type: 'warning'
        })
      }
    }
  }
}
</script>
<style >
.footer{
  background-color: #e6e6e6;
  width: 100%;
  height: 50px;
  bottom: 0;
  left: 0;
  position: absolute;
}
.rec_one_home{
  background-color:  #f2f2f2;
  width:100%;
  height: 50px;
  top:0;
  left:0;
  position: absolute;
}
</style>
