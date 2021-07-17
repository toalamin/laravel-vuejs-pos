<template>

   <div>

        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">View Salry</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 300px;">
                        <input @keyup="searchGivenInput" type="text" name="table_search"  v-model="searchTerm" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                            <router-link :to="{name: 'salary-create'}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Add</router-link>
                            
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
                            <th>Month</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(salary,index) in salaries.data" :key="salary.id">
                            <td>{{index+1}}</td>
                            <td>{{ salary.name }}</td>
                            <td>{{ salary.salary_month }}</td>
                            <td>{{ salary.amount }}</td>
                            <td>{{ salary.salary_date }}</td>
                            <td nowrap>
                          <router-link :to="{name: 'edit-salary', params:{id: salary.id} }" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></router-link>
                           
                            </td>
                        </tr>
                    </tbody>

                </table>
                <br>
                <pagination :data="expenseList" @pagination-change-page="getResults"></pagination>
    
                      
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
            
            salaries: {},
            searchTerm:''
        }
    },
   created(){
        	this.getResults();
  },
    methods: {
        

        getResults(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }
             let id = this.$route.params.id
            axios.get('/api/salary/view/'+id+'/allEmployee?page=' + page)
                .then((response) => {
                    this.salaries = response.data;
                });
        },
        
        searchGivenInput(page) {
            if(this.searchTerm.length > 0){
                if (typeof page === 'undefined') {
                    page = 1;
                }
                  let id = this.$route.params.id
                let route = '/api/salary/view/'+id+'/allEmployee?&search_input='+ this.searchTerm +'&page=' + page;
                axios.get(route)
                    .then((response) => {
                        this.salaries = response.data;
                    });
            }else{
                this.getResults();
            }
        },



   editExpense(){
        let id = this.$route.params.id
        axios.patch('/api/salary/view'+id,this.form)
        .then(() => {
                this.$router.push({ name: 'expense-index' })
                Notification.success()
        })
        .catch(error => this.errors = error.response.data.errors)},
    }


}
  
</script>

