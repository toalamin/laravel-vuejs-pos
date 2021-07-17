<aside class="main-sidebar elevation-4 sidebar-light-olive">
    <!-- Brand Logo -->
    <router-link class=" brand-link" to="/">


        <img src="{{ asset('backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Point of Sell</span>
    </router-link>



    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <router-link to="/home" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/pos" class="nav-link">
                        <i class="nav-icon fas fa fa-shopping-cart"></i>
                        <p>
                            Point of Sale

                        </p>
                    </router-link>
                </li>
                <li class="nav-item">
                    <!-- <a href="#" class="nav-link active"> -->
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Employee
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <router-link to="/employee-index" class="nav-link">
                                <i class="fa fas fa-list"></i>
                                <p> Employee List</p>
                            </router-link>
                        </li>


                        <li class="nav-item">
                            <router-link to="/employee-create" class="nav-link">
                                <i class="fa fas fa-plus-circle"></i>
                                <p> Add Employee</p>
                            </router-link>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <!-- <a href="#" class="nav-link active"> -->
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Supplier
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <router-link to="/supplier-index" class="nav-link">
                                <i class="fa fas fa-list"></i>
                                <p> Supplier List</p>
                            </router-link>
                        </li>


                        <li class="nav-item">
                            <router-link to="/supplier-create" class="nav-link">
                                <i class="fa fas fa-plus-circle"></i>
                                <p> Add Supplier</p>
                            </router-link>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <!-- <a href="#" class="nav-link active"> -->
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <router-link to="/category-index" class="nav-link">
                                <i class="fa fas fa-list"></i>
                                <p> Category List</p>
                            </router-link>
                        </li>


                        <li class="nav-item">
                            <router-link to="/category-create" class="nav-link">
                                <i class="fa fas fa-plus-circle"></i>
                                <p> Add Category</p>
                            </router-link>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <!-- <a href="#" class="nav-link active"> -->
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Product
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <router-link to="/product-index" class="nav-link">
                                <i class="fa fas fa-list"></i>
                                <p> Product List</p>
                            </router-link>
                        </li>

                        <li class="nav-item">

                            <router-link to="/stock" class="nav-link">
                                <i class="fa fas fa-list"></i>
                                <p> Stock </p>
                            </router-link>
                        </li>


                        <li class="nav-item">
                            <router-link to="/product-create" class="nav-link">
                                <i class="fa fas fa-plus-circle"></i>
                                <p> Add Product</p>
                            </router-link>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <!-- <a href="#" class="nav-link active"> -->
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Expense
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <router-link to="/expense-index" class="nav-link">
                                <i class="fa fas fa-list"></i>
                                <p> Expense List</p>
                            </router-link>
                        </li>


                        <li class="nav-item">
                            <router-link to="/expense-create" class="nav-link">
                                <i class="fa fas fa-plus-circle"></i>
                                <p> Add Expense</p>
                            </router-link>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <!-- <a href="#" class="nav-link active"> -->
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Salary
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <router-link to="/given-salary" class="nav-link">
                                <i class="fa fas fa-list"></i>
                                <p> Salary Generate</p>
                            </router-link>
                        </li>


                        <li class="nav-item">
                            <router-link to="/salary-index" class="nav-link">
                                <i class="fa fas fa-plus-circle"></i>
                                <p> Salary List</p>
                            </router-link>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <!-- <a href="#" class="nav-link active"> -->
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Customer
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">

                            <router-link to="/customer-index" class="nav-link">
                                <i class="fa fas fa-list"></i>
                                <p> Customer List</p>
                            </router-link>
                        </li>


                        <li class="nav-item">
                            <router-link to="/customer-create" class="nav-link">
                                <i class="fa fas fa-plus-circle"></i>
                                <p> Customer Create</p>
                            </router-link>
                        </li>

                    </ul>
                </li>



            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>