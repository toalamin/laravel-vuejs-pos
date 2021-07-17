<template>

   <div>

        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Supplier List</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 300px;">
                        <input @keyup="searchGivenInput" type="text" name="table_search"  v-model="searchTerm" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                            <router-link :to="{name: 'supplier-create'}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Add</router-link>
                            
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
                            <th>Shop Name</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(supplier,index) in supplierList.data" :key="supplier.id">
                            <td>{{index+1}}</td>
                            <td>{{ supplier.name }}</td>
                            <td>{{ supplier.email }}</td>
                            <td>{{ supplier.phone }}</td>
                            <td>{{ supplier.address }}</td>
                            <td>{{ supplier.shopname }}</td>
                            <td><img :src="supplier.photo" onerror="this.src='/backend/images/noimage.png'" class="img img-thumbnail" height="50px" width="50px" id="em_photo"></td>
                            <td nowrap>
                          <router-link :to="{name: 'edit-supplier', params:{id: supplier.id} }" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></router-link>
                        <a @click="deleteSupplier(supplier.id)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>

                </table>
                <br>
                <pagination :data="supplierList" @pagination-change-page="getResults"></pagination>
    
                      
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
            supplierList: {},
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
            axios.get('/api/supplier?page=' + page)
                .then((response) => {
                    this.supplierList = response.data;
                });
        },
        
        searchGivenInput(page) {
            if(this.searchTerm.length > 0){
                if (typeof page === 'undefined') {
                    page = 1;
                }
                let route = '/api/supplier?&search_input='+ this.searchTerm +'&page=' + page;
                axios.get(route)
                    .then((response) => {
                        this.supplierList = response.data;
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
              axios.delete('/api/supplier/'+id)
              .then(()=>{
                 this.getResults();
              })
              .catch(()=>{
                 this.$router.push({name: 'supplier-index'})
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