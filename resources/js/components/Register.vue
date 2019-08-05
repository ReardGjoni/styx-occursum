<template>
<div>
  <div class="login-page">
    <div class="form">
      <form class="login-form login" @submit.prevent="submitRegister">
        <input v-model="form.name" placeholder="Your Username" type="text" required/>
        <input v-model="form.email" placeholder="Your E-Mail" type="text" required/>
        <input v-model="form.password" type="password" placeholder="Your Password" required/>
        <button type="submit">Get Started</button>
        <p class="message">Already registered? <a href="#">Sign In</a></p>
      </form>
    </div>
  </div>
</div>
</template>

<script>
    import { mapActions } from 'vuex';

    export default {
        data() {
            return {
                form: {
                    name : '',
                    email: '',
                    password : '',
                }
            }
        },
        methods: {
            ...mapActions(['register']),

            async submitRegister() {
                await this.register(this.form);

                this.$router.push('/');
            }
        }
    }
</script>

<style scoped>

@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #360033;
  background: -webkit-linear-gradient(to right, #0b8793, #360033);
  background: linear-gradient(to right, #0b8793, #360033);
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #232526;
  background: -webkit-linear-gradient(to right, #414345, #232526);
  background: linear-gradient(to right, #414345, #232526);
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 14px;
}
.form .message a {
  color: black;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
</style>
