<template>

<div>
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Edit Stock</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                    </button>
                    <router-link :to="{name: 'stock'}" class="btn btn-sm btn-info"><i class="fa fa-backward"></i> Back</router-link>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form @submit.prevent="editStock" autocomplete="off" enctype="multipart/form-data">
                    <div class="row">
                  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" class="form-control" v-model="form.product_name"  placeholder="">
                                 <span class="error text-danger" v-if="errors.product_name">{{ errors.product_name[0] }}</span>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="text" class="form-control" v-model="form.product_quantity" placeholder="">
                                 <span class="error text-danger" v-if="errors.product_quantity">{{ errors.product_quantity[0] }}</span>
                            </div>
                        </div> 
                        
                        <div class="col-md-6">
                          <button type="submit" id="submit_purchase_form" class="btn btn-success pull-right btn-flat"><i class="fas fa-save"></i> Update</button>
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
            form:{
        			
        			product_name:'',
        			product_quantity:''
        		},
        		errors:{},
        }
    },
    created(){

        let id = this.$route.params.id
        	axios.get('/api/product/'+id)
        	.then(({data}) => (this.form = data))
        	.catch();
        },
    methods: {
        editStock() {
             let id = this.$route.params.id
            axios.post('/api/stockUpdate/'+id, this.form)
                .then(() => {
                    this.$router.push({
                        name: 'stock'
                    })
                    Notification.success()
                })
                .catch(error => this.errors = error.response.data.errors)
        },
    }


}
  
</script>