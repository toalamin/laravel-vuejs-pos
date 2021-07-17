<template>

   <div>

        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Product List</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 300px;">
                        <input @keyup="searchGivenInput" type="text" name="table_search"  v-model="searchTerm" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                            <router-link :to="{name: 'product-create'}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Add</router-link>
                            
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
                            <th>Code</th>
                            <th>Photo</th>
                            <th>Category</th>
                            <th>Buying Price</th>
                            <th>Status</th>
                            <th>Stock</th>
                            <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(product,index) in productList.data" :key="product.id">
                            <td>{{index+1}}</td>
                            <td>{{ product.product_name }}</td>
                            <td>{{ product.product_code }}</td>
                            <td><img :src="product.photo" onerror="this.src='/backend/images/noimage.png'" class="img img-thumbnail" height="50px" width="50px" id="em_photo"></td>
                            <td>{{ product.category.category_name }}</td>
                            <td>{{ product.buying_price }}</td>
                            <td >
                                <span v-if="product.product_quantity >= 1"  class="badge badge-success">Availble</span>
                                 <span  v-else="" class="badge badge-danger">Stock Out</span>
                            </td>
                           
                            <td>{{ product.product_quantity }}</td>
                           
                           
                            <td nowrap>
                          <router-link :to="{name: 'edit-stock', params:{id: product.id} }" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></router-link>
                     
                            </td>
                        </tr>
                    </tbody>

                </table>
                <br>
                <pagination :data="productList" @pagination-change-page="getResults"></pagination>
    
                      
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
            productList: {},
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
            axios.get('/api/product?page=' + page)
                .then((response) => {
                    console.log(response.data);
                    this.productList = response.data;
                });
        },
        
        searchGivenInput(page) {
            if(this.searchTerm.length > 0){
                if (typeof page === 'undefined') {
                    page = 1;
                }
                let route = '/api/product?&search_input='+ this.searchTerm +'&page=' + page;
                axios.get(route)
                    .then((response) => {

                        this.productList = response.data;
                    });
        }else{
            this.getResults();
        }
        },
        deleteProduct(id){
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
              axios.delete('/api/product/'+id)
              .then(()=>{
                 this.getResults();
              })
              .catch(()=>{
                 this.$router.push({name: 'product-index'})
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