<template>

   <div>

        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Employee List</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 300px;">
                        <input @keyup="searchGivenInput" type="text" name="table_search"  v-model="searchTerm" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
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
                            <th>Phone</th>
                            <th>Photo</th>
                            <th>Salary</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(employee,index) in employeeList.data" :key="employee.id">
                            <td>{{index+1}}</td>
                            <td>{{ employee.name }}</td>
                            <td>{{ employee.phone }}</td>
                            <td><img :src="employee.photo" onerror="this.src='/backend/images/noimage.png'" class="img img-thumbnail" height="50px" width="50px" id="em_photo"></td>
                            <td>{{ employee.salary }}</td>
                            <td nowrap>
                          <router-link :to="{name: 'salary-create', params:{id: employee.id} }" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Pay Salary</router-link>
                       
                            </td>
                        </tr>
                    </tbody>

                </table>
                <br>
                <pagination :data="employeeList" @pagination-change-page="getResults"></pagination>
    
                      
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
            employeeList: {},
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
            axios.get('/api/employee?page=' + page)
                .then((response) => {
                    console.log();
                    this.employeeList = response.data;
                });
        },
        
        searchGivenInput(page) {
            if(this.searchTerm.length > 0){
                if (typeof page === 'undefined') {
                    page = 1;
                }
                let route = '/api/employee?&search_input='+ this.searchTerm +'&page=' + page;
                axios.get(route)
                    .then((response) => {
                        this.employeeList = response.data;
                    });
        }else{
            this.getResults();
        }
        },
        deleteEmployee(id){
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
              axios.delete('/api/employee/'+id)
              .then(()=>{
                 this.getResults();
              })
              .catch(()=>{
                 this.$router.push({name: 'employee-index'})
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