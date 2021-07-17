//auth start
let login = require("./components/auth/login.vue").default;
let register = require("./components/auth/register.vue").default;
let forget = require("./components/auth/forget.vue").default;
let logout = require("./components/auth/logout.vue").default;
//auth end
//dashboard
let home = require("./components/home.vue").default;
//employee crude start
let employee_index = require("./components/employee/index.vue").default;
let employee_create = require("./components/employee/create.vue").default;
let editemployee = require("./components/employee/edit.vue").default;
//employee crude end

//supplier crude start
let supplier_index = require("./components/supplier/index.vue").default;
let supplier_create = require("./components/supplier/create.vue").default;
let supplier_edit = require("./components/supplier/edit.vue").default;
//supplier crude end

//supplier crude start
let category_index = require("./components/category/index.vue").default;
let category_create = require("./components/category/create.vue").default;
let category_edit = require("./components/category/edit.vue").default;
//supplier crude end

//supplier crude start
let product_index = require("./components/product/index.vue").default;
let product_create = require("./components/product/create.vue").default;
let product_edit = require("./components/product/edit.vue").default;
//supplier crude end

//supplier crude start
let expense_index = require("./components/expense/index.vue").default;
let expense_create = require("./components/expense/create.vue").default;
let expense_edit = require("./components/expense/edit.vue").default;
//supplier crude end

//salary----
let gienSalary = require("./components/salary/empSalary.vue").default;
let salary_create = require("./components/salary/create.vue").default;
let salary_index = require("./components/salary/index.vue").default;
let salary_edit = require("./components/salary/edit.vue").default;
let salary_view = require("./components/salary/view.vue").default;
//salary end
//stock---
let stock = require("./components/product/stock.vue").default;
let editstock = require("./components/product/editstock.vue").default;
//customers

//customer crude start
let customer_index = require("./components/customer/index.vue").default;
let customer_create = require("./components/customer/create.vue").default;
let customer_edit = require("./components/customer/edit.vue").default;
//customer crude end

let pos = require("./components/pos/pointofsale.vue").default;
export const routes = [
    { path: "/pos", component: pos, name: "pos" },
    { path: "/", component: login, name: "/" },
    { path: "/register", component: register, name: "register" },
    { path: "/forget", component: forget, name: "forget" },
    { path: "/home", component: home, name: "home" },
    { path: "/logout", component: logout, name: "logout" },
    { path: "/stock", component: stock, name: "stock" },
    {
        path: "/edit-stock/:id",
        component: editstock,
        name: "edit-stock"
    },
    {
        path: "/employee-index",
        component: employee_index,
        name: "employee-index"
    },
    {
        path: "/employee-create",
        component: employee_create,
        name: "employee-create"
    },

    {
        path: "/edit-employee/:id",
        component: editemployee,
        name: "edit-employee"
    },
    {
        path: "/supplier-index",
        component: supplier_index,
        name: "supplier-index"
    },
    {
        path: "/supplier-create",
        component: supplier_create,
        name: "supplier-create"
    },

    {
        path: "/edit-supplier/:id",
        component: supplier_edit,
        name: "edit-supplier"
    },
    {
        path: "/category-index",
        component: category_index,
        name: "category-index"
    },
    {
        path: "/category-create",
        component: category_create,
        name: "category-create"
    },

    {
        path: "/edit-category/:id",
        component: category_edit,
        name: "edit-category"
    },
    {
        path: "/product-index",
        component: product_index,
        name: "product-index"
    },
    {
        path: "/product-create",
        component: product_create,
        name: "product-create"
    },

    {
        path: "/edit-product/:id",
        component: product_edit,
        name: "edit-product"
    },

    {
        path: "/expense-index",
        component: expense_index,
        name: "expense-index"
    },
    {
        path: "/expense-create",
        component: expense_create,
        name: "expense-create"
    },

    {
        path: "/edit-expense/:id",
        component: expense_edit,
        name: "edit-expense"
    },
    //salary--
    {
        path: "/given-salary",
        component: gienSalary,
        name: "given-salary"
    },
    {
        path: "/salary-create/:id",
        component: salary_create,
        name: "salary-create"
    },
    {
        path: "/salary-index",
        component: salary_index,
        name: "salary-index"
    },
    {
        path: "/view-salary/:id",
        component: salary_view,
        name: "view-salary"
    },
    {
        path: "/edit-salary/:id",
        component: salary_edit,
        name: "edit-salary"
    },

    {
        path: "/customer-index",
        component: customer_index,
        name: "customer-index"
    },
    {
        path: "/customer-create",
        component: customer_create,
        name: "customer-create"
    },

    {
        path: "/edit-customer/:id",
        component: customer_edit,
        name: "edit-customer"
    }
];
