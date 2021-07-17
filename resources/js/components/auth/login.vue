<template>

<div>
    
        <div class="row">
         
            <div class="col-md-6">
                <div class="login-box">
                    <!-- /.login-logo -->
                    <div class="card card-outline card-primary">
                        <div class="card-header text-center">
                        <a href="../../index2.html" class="h1">Login</a>
                        </div>
                        <div class="card-body">
                        <p class="login-box-msg">Sign in to start your session</p>
                        <form @submit.prevent="login">
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" v-model="form.email" placeholder="Email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                    </div>
                                </div>

                                
                            </div>
                            <small class="text-danger" v-if="errors.email" style="color: red;"> {{ errors.email[0] }} </small>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" v-model="form.password" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <small class="text-danger" v-if="errors.password"> {{ errors.password[0] }} </small>
                            <div class="row">
                                
                                <!-- /.col -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                       
                        <!-- /.social-auth-links -->
                        <p class="mb-1">
                            
                            <router-link to="/forget" class="d-block small mt-3">Forget Password</router-link>
                        </p>
                        <p class="mb-0">
                            <router-link to="/register" class="d-block small mt-3">Register an Account</router-link>
                           
                        </p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>




</div>

</template>

<script type="text/javascript">
 
    export default{

        created(){
            if (User.loggedIn()) {
            this.$router.push({name : 'home'})
            }
        },
        data(){
            return {
                form:{
                    email:null,
                    password:null
                },
                 errors:{},
            }
        },
        methods:{
            login(){
                axios.post('api/auth/login',this.form)
                .then(response => {
                   User.responseAfterLogin(response)
                   Toast.fire({
                        type: 'success',
                        title: 'Signed in successfully'
                    })
                    this.$router.push({ name : 'home'})
                })
                .catch(error => this.errors = error.response.data.errors)
                .catch(
                    Toast.fire({
                    type: 'warning',
                    title: 'Invalid Email Or Password !'
                    })
                )
            }
        }



    }


</script>

<style type="text/css">
	
</style>