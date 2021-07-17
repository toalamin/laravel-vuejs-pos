<template>

   <div>

        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">All Salary</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 300px;">
                        <input  type="text" name="table_search"  v-model="searchTerm" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                            <router-link :to="{name: 'expense-create'}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Add</router-link>
                            
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
                            <th>Month Name</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(salary,index) in salaries.data" :key="salary.id">
                            <td>{{index+1}}</td>
                            <td>{{ salary.salary_month }}</td>
                           
                            <td nowrap>
                          <router-link :to="{name: 'view-salary', params:{id: salary.salary_month} }" class="btn btn-sm btn-info"><i class="fas fa-search-plus"></i></router-link>
                        
                            </td>
                        </tr>
                    </tbody>

                </table>
                <br>
                <pagination :data="salaries" @pagination-change-page="getResults"></pagination>
    
                      
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

        created(){
        this.getResults();
        },

        data(){
          return{
            salaries:{},
            searchTerm:'',         
          }
        },
       
        methods:{


            getResults(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }
            axios.get('/api/salary?page=' + page)
                .then((response) => {
                    console.log(response.data);
                    this.salaries = response.data;
                });
             },

        },
      
    }
     
  
  
</script>

