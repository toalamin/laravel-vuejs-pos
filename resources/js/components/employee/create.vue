<template>

<div>
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Add Employee</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                    </button>
                    <router-link :to="{name: 'employee-index'}" class="btn btn-sm btn-info"><i class="fa fa-backward"></i> Back</router-link>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form @submit.prevent="addEmployee" autocomplete="off" enctype="multipart/form-data">
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
                                <label>Salary</label>
                                <input type="text" class="form-control" v-model="form.salary"  placeholder="">
                                 <span class="error text-danger" v-if="errors.salary">{{ errors.salary[0] }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date of Join</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="date" class="form-control" v-model="form.joining_date"/>
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                </div>
                                 <span class="error text-danger" v-if="errors.joining_date">{{ errors.joining_date[0] }}</span>
                            </div>
                        </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NID</label>
                                <input type="text" class="form-control" v-model="form.nid" placeholder="">
                                 <span class="error text-danger" v-if="errors.nid">{{ errors.nid[0] }}</span>
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
                          <button type="submit" id="submit_purchase_form" class="btn btn-success pull-right btn-flat"><i class="fas fa-save"></i> Save</button>
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
                salary: '',
                address: '',
                photo: '',
                phone: '',
                nid: '',
                joining_date: ''
            },
            errors: {},
        }
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
                    console.log(event.target.result);
                };
                reader.readAsDataURL(file);

            }
        },
        addEmployee() {
            console.log(this.form);
            axios.post('/api/employee/', this.form)
                .then(() => {
                    this.$router.push({
                        name: 'employee-index'
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