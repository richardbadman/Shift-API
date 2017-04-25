<template lang="html">
    <div class="container">
        <!-- <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
        <div class="panel-heading">Example Component</div>

        <div class="panel-body">
        I'm an example component!
    </div>
</div>
</div>
</div> -->

        <table class="table table-hover panel panel-default">
            <thead class="panel-heading">
                <tr>
                    <th class="col-sm-2">Employee ID</th>
                    <th class="col-sm-4">First Name</th>
                    <th class="col-sm-4">Last Name</th>
                    <th class="col-sm-2"></th>
                </tr>
            </thead>
            <tbody class="panel-body">
                <tr v-for="emp in list">
                    <td> {{ emp.empID }} </td>
                    <td> {{ emp.firstName }} </td>
                    <td> {{ emp.lastName }} </td>
                    <td class="testing">
                        <!-- <button type="button" name="button" class="btn btn-primary"> -->
                        <button class="btn btn-primary" @click="gotoEmp(emp.empID)">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                        </button>
                        <button class="btn btn-warning">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </button>
                        <button class="btn btn-danger" @click="delEmp(emp.empID)">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</template>

<script>
export default {

    data: function() {
        return {
            edit: false,
            list: [],
            employees: {
                empID: '',
                firstName: '',
                lastName: '',
            }
        };
    },

    mounted() {
        this.getEmployees();
    },

    methods: {
        getEmployees() {

            axios.get('/employee').then( response => {
                this.list = response.data
            });
        },

        gotoEmp(empID) {
             //window.location.href = '/employee/' + empID;
            //console.log(empID);
        },

        delEmp(empID) {

            axios.delete('/employee/' + empID ).then( response => {
                console.log(response.data);
            })

            this.getEmployees();

        }
    }
}
</script>

<style lang="css">
</style>
