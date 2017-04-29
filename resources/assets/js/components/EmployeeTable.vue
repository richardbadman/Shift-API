<template lang="html">
    <div class="container">

        <!-- show employee -->
        <div class="panel panel-default" v-if="showEmp">
            <div class="panel-body">
                <div id="show-sep">
                    <h5>Employee ID: {{ details.empID }}</h5>
                    <button class="btn btn-primary" @click="hideEmp">Close</button>
                </div>
                <h3>{{ details.firstName }} {{ details.lastName }}</h3>
                <h5>Shifts assigned:</h5>
                    <table class="table table-hover panel panel-default">
                        <thead class="panel-heading">
                            <tr>
                                <th>Shift ID</th>
                                <th>Shift Start Date</th>
                                <th>Shift Start Time</th>
                                <th>Shift End Date</th>
                                <th>Shift End Time</th>
                            </tr>
                        </thead>
                        <tbody class="panel-body">
                            <tr v-for="shift in details.shifts">
                                <td>{{ shift.shiftID }}</td>
                                <!-- <td>{{ shift.shiftStart }}</td> -->
                                <td>{{ moment(shift.shiftStart, "YYYY-MM-DD").format("ll") }}</td>
                                <td>{{ shift.startTime }}</td>
                                <td>{{ moment(shift.shiftEnd, "YYYY-MM-DD").format("ll") }}</td>
                                <td>{{ shift.endTime }}</td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>

        <!-- edit employee -->
        <div class="panel panel-default" v-if="showEdit">
            <div id="editPanel" class="panel-body">
                <div id="show-sep">
                    <div id="alert" class="alert alert-success" v-if="successDisp">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Successfully updated employee!
                    </div>
                    <div id="alert" class="alert alert-danger" v-if="failedDisp">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> There was an error updating the employee, please revise...
                    </div>
                    <div id="seporator" v-if="butSep"></div>
                    <button id="editBut" class="btn btn-primary" @click="hideEdit">Close</button>
                </div>
                <h4>First Name</h4>
                <input type="text" placeholder="Enter in Employee's first name..." v-model="details.firstName">
                <h4>Last Name</h4>
                <input type="text" placeholder="Enter in Employee's last name..." v-model="details.lastName">

                <button id="updating" class="btn btn-primary" @click="editEmp(details.empID, false)">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Update Employee
                </button>
            </div>
        </div>

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
                        <button class="btn btn-warning" @click="editEmp(emp.empID, true)">
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
            showEmp: false,
            showEdit: false,
            successDisp: false,
            failedDisp: false,
            butSep: false,

            details: [],

            list: [],
                employees: {
                    empID: '',
                    firstName: '',
                    lastName: '',
                    showSection: false,
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
            axios.get('/employee/' + empID)
            .then(function (response) {
                this.details = response.data
                this.showEmp = true
                this.hideEdit()
            }.bind(this))
            .catch(function (error) {
              console.log(error)
            }.bind(this))
        },

        delEmp(empID) {

            axios.delete('/employee/' + empID).then( response => {
                console.log(response.data);
            });

            this.getEmployees();

        },

        editEmp(empID, bool) {
            if ( bool ) {
                this.butSep = true
                axios.get('/employee/' + empID)
                .then(function (response) {
                    this.details = response.data
                    this.showEdit = true
                    this.hideEmp()
                }.bind(this))
                .catch(function (error) {
                    console.log(error)
                }.bind(this))

            } else {
                this.butSep = false
                axios.put('/employee/' + empID, {
                    empID: this.details.empID,
                    firstName: this.details.firstName,
                    lastName: this.details.lastName,
                  })
                  .then(function (response) {
                    console.log(response);
                    this.successDisp = true;
                    this.failedDisp = false;
                    this.getEmployees();
                }.bind(this))
                  .catch(function (error) {
                    console.log(error);
                    this.successDisp = false;
                    this.failedDisp = true;

                }.bind(this));
            }
        },

        hideEmp() {
            this.showEmp = false
        },

        hideEdit() {
            this.successDisp = false
            this.failedDisp = false
            this.showEdit = false
        }
    }
}
</script>

<style lang="css">
    #show-sep {
        display: flex;
    }

    #show-sep h5 {
        flex: 1 auto;
    }

    #alert {
        flex: 1 auto;
    }

    #seporator {
        flex: 1 auto;
    }

    #editBut {
        height: 38px;
        margin-top: 7px;
        margin-left: 10px;
    }

    #editPanel {
        display: grid;
    }

    #editPanel input {
        flex: 1 auto;
        margin-bottom: 10px;
    }

    #updating {
        margin-top: 25px;
    }
</style>
