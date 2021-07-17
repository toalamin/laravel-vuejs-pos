<template>

<div>
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Edit Product</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                    </button>
                    <router-link :to="{name: 'product-index'}" class="btn btn-sm btn-info"><i class="fa fa-backward"></i> Back</router-link>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form @submit.prevent="editProduct" autocomplete="off" enctype="multipart/form-data">
                    <div class="row">
                  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" v-model="form.category_id" style="width: 100%;">
                                   
                                    <option :key="category.id" :value="category.id" v-for="category in categories">{{ category.category_name }}</option>
                                </select>
                                <span  class="error text-danger" v-if="errors.category_id">{{ errors.category_id[0] }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Supplier</label>
                                <select class="form-control" v-model="form.supplier_id" style="width: 100%;">
                                    <option :key="supplier.id" :value="supplier.id" v-for="supplier in suppliers">{{ supplier.name }}</option>
                                </select>
                                 <span class="error text-danger"  v-if="errors.supplier_id">{{ errors.supplier_id[0] }}</span>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Product Code</label>
                                <input type="text" class="form-control" v-model="form.product_code"  placeholder="">
                                 <span class="error text-danger" v-if="errors.product_code">{{ errors.product_code[0] }}</span>
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" class="form-control" v-model="form.product_name"  placeholder="">
                                 <span class="error text-danger" v-if="errors.product_name">{{ errors.product_name[0] }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Buying Price</label>
                                <input type="text" class="form-control" v-model="form.buying_price"  placeholder="">
                                 <span class="error text-danger" v-if="errors.buying_price">{{ errors.buying_price[0] }}</span>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Selling Price</label>
                                <input type="text" class="form-control" v-model="form.selling_price"  placeholder="">
                                 <span class="error text-danger" v-if="errors.selling_price">{{ errors.selling_price[0] }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Root</label>
                                <input type="text" class="form-control" v-model="form.root"  placeholder="">
                                 <span class="error text-danger" v-if="errors.root">{{ errors.root[0] }}</span>
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
                            <div class="form-group">
                                <label>Buying Date</label>
                                <input type="date" class="form-control" v-model="form.buying_date" placeholder="">
                                 <span class="error text-danger" v-if="errors.buying_date">{{ errors.buying_date[0] }}</span>
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Picture</label>
                                <input type="file" class="form-control" @change="onFileselected">
                                 <span class="error text-danger" v-if="errors.photo">{{ errors.photo[0] }}</span>
                            </div>
                        </div>
                        <div class="col-md-2">
                          <img :src="form.photo" onerror="this.src='/backend/images/noimage.png'" class="img img-thumbnail" height="100px" width="100px"/>
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
        			product_name :'',
        			product_code :'',
        			category_id:'',
        			supplier_id:'',
        			root :'',
        			buying_price:'',
        			selling_price : '',
        			buying_date:'',
        			photo:'',
                    newphoto:'',
        			product_quantity:''
        		},
        		errors:{},
        		categories:{},
        		suppliers:{},
        }
    },
    created(){

        let id = this.$route.params.id
        	axios.get('/api/product/'+id)
        	.then(({data}) => (this.form = data))
        	.catch();

        	axios.get('/api/catlist')
        	.then(({data}) => (this.categories = data))

        	axios.get('/api/suplist/')
        	.then(({data}) => (this.suppliers = data))
        },
    methods: {
        onFileselected(event) {
            let file = event.target.files[0];
            if (file.size > 1048770) {
                Notification.image_validation()
            } else {
                let reader = new FileReader();
                reader.onload = event => {
                    this.form.photo = event.target.result
                    this.form.newphoto = event.target.result
                };
                reader.readAsDataURL(file);

            }
        },
        editProduct() {
             let id = this.$route.params.id
            axios.patch('/api/product/'+id, this.form)
                .then(() => {
                    this.$router.push({
                        name: 'product-index'
                    })
                    Notification.success()
                })
                .catch(error => this.errors = error.response.data.errors)
        },
    }


}
  
</script>

<style type="text/css">
	
</style>