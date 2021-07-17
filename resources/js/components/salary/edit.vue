<template>

<div>
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Edit Salary</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                    </button>
                    <router-link :to="{name: 'salary-index'}" class="btn btn-sm btn-info"><i class="fa fa-backward"></i> Back</router-link>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form @submit.prevent="editSalary" autocomplete="off" enctype="multipart/form-data">
                    <div class="row">
                  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" class="form-control" v-model="form.name" placeholder="" autofocus>
                                <span  class="error text-danger" v-if="errors.name">{{ errors.name[0] }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="text" class="form-control" v-model="form.email" placeholder="" autofocus>
                                <span  class="error text-danger" v-if="errors.email">{{ errors.email[0] }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Salary Month</label>
                                <select class="form-control" id="exampleFormControlSelect1" v-model="form.salary_month">
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="Devember">Devember</option>
                                </select>
                                <span  class="error text-danger" v-if="errors.amount">{{ errors.amount[0] }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Salary</label>
                                <input type="text" class="form-control" v-model="form.amount" placeholder="" autofocus>
                                <span  class="error text-danger" v-if="errors.amount">{{ errors.amount[0] }}</span>
                            </div>
                        </div>

                        <div class="col-md-12">
                          <button type="submit" id="submit_purchase_form" class="btn btn-success pull-right btn-flat"><i class="fas fa-save"></i> Update</button>
                        </div>
                    
                    </div>
                </form>
                <!-- /.card-body -->
            </div>
        </div>
</div>

</template>

<script>

    export default {
    	mounted(){
            if (!User.loggedIn()) {
               this.$router.push({ name:'/' })
            } 
        },
        data(){
        	return{
                

        		form:{
        			name :'',
        			email :'',
        			amount:'',
        			salary_month:'',
        		},
        		errors:{},
        	}
        },
        created(){
        	let id = this.$route.params.id
        	axios.get('/api/edit/salary/'+id)
        	.then(({data}) => (this.form = data))
        	.catch()
        },
        methods:{ 	
        	editSalary(){
        		let id = this.$route.params.id
        		axios.post('/api/salary/update/'+id,this.form)
        		.then(() => {
        			this.$router.push({ name: 'salary-index' })
        			Notification.success()
        		})
        		.catch(error => this.errors = error.response.data.errors)
        	},
        	
        }

    	
    }



  
</script>

<style type="text/css">
	
</style>