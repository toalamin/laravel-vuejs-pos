<template>

<div>
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Edit Expense</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                    </button>
                    <router-link :to="{name: 'expense-index'}" class="btn btn-sm btn-info"><i class="fa fa-backward"></i> Back</router-link>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form @submit.prevent="editExpense" autocomplete="off" enctype="multipart/form-data">
                    <div class="row">
                  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" class="form-control" v-model="form.expense_date" placeholder="" autofocus>
                                <span  class="error text-danger" v-if="errors.expense_date">{{ errors.expense_date[0] }}</span>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="text" class="form-control" v-model="form.amount" placeholder="" autofocus>
                                <span  class="error text-danger" v-if="errors.amount">{{ errors.amount[0] }}</span>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category Name</label>
                                <textarea type="text" class="form-control" v-model="form.details" placeholder="" autofocus></textarea>
                                <span  class="error text-danger" v-if="errors.details">{{ errors.details[0] }}</span>
                            </div>
                        </div>

                        
                        <div class="col-md-12">
                          <button type="submit" id="submit_purchase_form" class="btn btn-success pull-right btn-flat"><i class="fas fa-save"></i> Update </button>
                        </div>
                    
                    </div>
                </form>
                <!-- /.card-body -->
            </div>
        </div>
</div>

</template>

<script type="text/javascript">

export default {
    mounted() {
        if (!User.loggedIn()) {
            this.$router.push({ name: '/'})
        }
    },
    
    data() {
        return {
            form: {
                details: '',
                amount: '',
                expense_date: '',
            },
            errors: {},
        }
    },
   created(){
        	let id = this.$route.params.id
        	axios.get('/api/expense/'+id)
        	.then(({data}) => (this.form = data))
        	.catch()
  },
    methods: {
        
   editExpense(){
        let id = this.$route.params.id
        axios.patch('/api/expense/'+id,this.form)
        .then(() => {
                this.$router.push({ name: 'expense-index' })
                Notification.success()
        })
        .catch(error => this.errors = error.response.data.errors)},
    }


}
  
</script>

<style type="text/css">
	
</style>