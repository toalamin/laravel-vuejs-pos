<template>

<div>
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Edit Supplier</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                    </button>
                    <router-link :to="{name: 'supplier-index'}" class="btn btn-sm btn-info"><i class="fa fa-backward"></i> Back</router-link>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form @submit.prevent="editSupplier" autocomplete="off" enctype="multipart/form-data">
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
                                <input type="email" class="form-control" v-model="form.email"  placeholder="">
                                 <span class="error text-danger"  v-if="errors.email">{{ errors.email[0] }}</span>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" v-model="form.phone"  placeholder="">
                                 <span class="error text-danger" v-if="errors.phone">{{ errors.phone[0] }}</span>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" v-model="form.address"  placeholder="">
                                 <span class="error text-danger" v-if="errors.address">{{ errors.address[0] }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Shop Name</label>
                                <input type="text" class="form-control" v-model="form.shopname" placeholder="">
                                 <span class="error text-danger" v-if="errors.shopname">{{ errors.shopname[0] }}</span>
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
                name: '',
                email: '',
                address: '',
                photo: '',
                newphoto:'',
                phone: '',
                shopname: '',
            },
            errors: {},
        }
    },
   created(){
        	let id = this.$route.params.id
        	axios.get('/api/supplier/'+id)
        	.then(({data}) => (this.form = data))
        	.catch()
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
        
   editSupplier(){
        let id = this.$route.params.id
        console.log(this.form);
        axios.patch('/api/supplier/'+id,this.form)
        .then(() => {
                this.$router.push({ name: 'supplier-index' })
                Notification.success()
        })
        .catch(error => this.errors = error.response.data.errors)},
    }


}
  
</script>

<style type="text/css">
	
</style>