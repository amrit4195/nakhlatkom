<template>
  <div>
    <div class="rec_one_home" v-if="user_access === null">
      <p style="display: inline-block;color:#734d26;cursor:pointer;font-family:Comic Sans MS;font-weight:bold;margin-left:100px" @click="$router.push('/')">Nakhlatkom</p>
      <p style="display: inline-block;color:#404040;cursor:pointer;margin-left:150px" @click="$router.push('/login')">Log in</p>
      <p style="display: inline-block; margin-left:3%;color:#404040;cursor:pointer" @click="$router.push('/signup')">Create account</p>
      <p style="display: inline-block; margin-left:50%;color:#404040;cursor:pointer"  @click="$router.push('/contact')">Contact</p>
    </div>
    <div class="rec_one_home" v-else>
      <p style="display: inline-block;color:#734d26;cursor:pointer;font-family:Comic Sans MS;font-weight:bold;margin-left:100px" @click="$router.push('/')">Nakhlatkom</p>
      <p style="display: inline-block;color:#404040;cursor:pointer;margin-left:150px" @click="logout">Log out</p>
      <p style="display: inline-block; margin-left:50%;color:#404040;cursor:pointer"  @click="$router.push('/contact')">Contact</p>
    </div>
  <div id="app">
    <router-view></router-view>
  </div>
</div>
</template>

<script>
export default {
  name: 'app',
  data () {
    return {
      user_access: null
    }
  },
  mounted () {
    if (localStorage.getItem('user_access') !== null && localStorage.getItem('user_access') !== undefined) {
      this.user_access = localStorage.getItem('user_access')
    }
  },
  methods: {
    logout: function () {
      this.user_access = null
      localStorage.removeItem('user_access')
      location.reload()
    }
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
