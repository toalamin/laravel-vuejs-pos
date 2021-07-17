<template>

   <div>

        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Customer List</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 300px;">
                        <input @keyup="searchGivenInput" type="text" name="table_search"  v-model="searchTerm" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                            <router-link :to="{name: 'customer-create'}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Add</router-link>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-striped text-sm table-vcenter table-condensed">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(customer,index) in customerList.data" :key="customer.id">
                            <td>{{index+1}}</td>
                            <td>{{ customer.name }}</td>
                            <td>{{ customer.email }}</td>
                            <td>{{ customer.phone }}</td>
                            <td>{{ customer.address }}</td>
                            <td><img :src="customer.photo" onerror="this.src='/backend/images/noimage.png'" class="img img-thumbnail" height="50px" width="50px" id="em_photo"></td>
                            <td nowrap>
                          <router-link :to="{name: 'edit-customer', params:{id: customer.id} }" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></router-link>
                        <a @click="deleteSupplier(customer.id)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>

                </table>
                <br>
                <pagination :data="customerList" @pagination-change-page="getResults"></pagination>
    
                      
            </div>
        </div>
    </div>
</template>
<script type="text/javascript">
export default {
    mounted() {
        if (!User.loggedIn()) {
            this.$router.push({
                name: '/'
            })
        }
    },
    data() {
        return {
            customerList: {},
            searchTerm:''
            
        }
    },
    created() {
        this.getResults();
    },

    methods: {
        getResults(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }
            axios.get('/api/customer?page=' + page)
                .then((response) => {
                    this.customerList = response.data;
                });
        },
        
        searchGivenInput(page) {
            if(this.searchTerm.length > 0){
                if (typeof page === 'undefined') {
                    page = 1;
                }
                let route = '/api/customer?&search_input='+ this.searchTerm +'&page=' + page;
                axios.get(route)
                    .then((response) => {
                        this.customerList = response.data;
                    });
        }else{
            this.getResults();
        }
        },
        deleteSupplier(id){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.value) {
              axios.delete('/api/customer/'+id)
              .then(()=>{
                 this.getResults();
              })
              .catch(()=>{
                 this.$router.push({name: 'customer-index'})
              })
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
           })
          }

    }


}
  
</script>

<style type="text/css">
	
</style>