<template>

<div>
	 
<div class="row">
 <div class="col-md-6">
   <div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline card-primary">
         <div class="card-header text-center">
            <a  class="h1">Register</a>
         </div>
         <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form @submit.prevent="signup">
               <div class="input-group mb-3">
                  <input type="text" v-model="form.name" class="form-control" placeholder="Full name">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-user"></span>
                     </div>
                  </div>
               </div>
               <small class="text-danger" v-if="errors.name"> {{ errors.name[0] }} </small>
               <div class="input-group mb-3">
                  <input v-model="form.email" type="email" class="form-control" placeholder="Email">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                     </div>
                  </div>
               </div>
               <small class="text-danger" v-if="errors.email"> {{ errors.email[0] }} </small>
               <div class="input-group mb-3">
                  <input v-model="form.password" type="password" class="form-control" placeholder="Password">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                     </div>
                  </div>
               </div>
               <small class="text-danger" v-if="errors.password"> {{ errors.password[0] }} </small>
               <div class="input-group mb-3">
                  <input type="password" v-model="form.password_confirmation" class="form-control" placeholder="Retype password">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                     </div>
                  </div>
               </div>
               <div class="row">
                  
                  <!-- /.col -->
                  <div class="col-12">
                     <button type="submit" class="btn btn-primary btn-block">Register</button>
                  </div>
                  <!-- /.col -->
               </div>
            </form>
            
             <p class="mb-0">
                <router-link to="/" class="d-block small mt-3">Already have account  ? login</router-link>             
            </p>
            <!-- /.social-auth-links -->
            <p class="mb-1">
                            
                    <router-link to="/forget" class="d-block small mt-3">Forget Password</router-link>
            </p>
            
         </div>
         <!-- /.card-body -->
      </div>
   </div>
 </div>

</div>


</div>

</template>

<script type="text/javascript">
 export default { 
  created(){
    if (User.loggedIn()) {
      this.$router.push({name : 'home'})
    }
  },
  data(){
    return {
      form:{
        name: null,
        email: null,
        password: null,
        password_confirmation: null
      },
      errors:{},
    }
  },
  methods:{
    signup(){
      axios.post('/api/auth/signup',this.form)
      .then(res => { 
        User.responseAfterLogin(res)
        Toast.fire({
          type: 'success',
          title: 'Signed in successfully'
        })
        this.$router.push({ name : 'home'})
      })
      .catch(error => this.errors = error.response.data.errors)
    }
  }

}
</script>

<style type="text/css">
	
</style>