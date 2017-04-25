<template lang="html">

    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Add an Employee</h2>
                <div class="panel panel-default">
                    <div id="addPanel" class="panel-body">
                            <div class="alert alert-success" v-if="successDisp">
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Successfully added employee!
                            </div>
                            <div class="alert alert-danger" v-if="failedDisp">
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> There was an error adding the employee, please revise...
                            </div>
                            <h4>First Name</h4>
                            <input type="text" placeholder="Enter in Employee's first name..." v-model="firstName">
                            <h4>Last Name</h4>
                            <input type="text" placeholder="Enter in Employee's last name..." v-model="lastName">

                            <button id="adding" class="btn btn-primary" @click="addEmp">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Employee
                            </button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
export default {

    data() {
        return {
            firstName: '',
            lastName: '',
            successDisp: false,
            failedDisp: false,
            check: false,
        }
    },

    methods: {

        mounted() {
            //reset when page is refreshed/loaded
            this.successDisp = false;
            this.failedDisp = false;
        },

        addEmp() {

            axios.post('/employee', {
                firstName: this.firstName,
                lastName: this.lastName,
                isAdmin: false,
              })
              .then(function (response) {
                console.log(response);
                this.successDisp = true;
                this.failedDisp = false;
                this.clearInputs();
            }.bind(this))
              .catch(function (error) {
                console.log(error);
                this.successDisp = false;
                this.failedDisp = true;
            }.bind(this));

        },

        clearInputs() {
            this.firstName = '';
            this.lastName = '';
        }

    }

}
</script>

<style lang="css">

    #addPanel {
        display: grid;
    }

    #addPanel input {
        flex: 1 auto;
        margin-bottom: 10px;
    }

    #adding {
        margin-top: 25px;
    }

    ::-webkit-input-placeholder {
        font-style: italic;
        color: #A7A7A7;
    }

    ::-moz-placeholder {
        font-style: italic;
        color: #A7A7A7;
    }

    :-ms-input-placeholder {
        font-style: italic;
        color: #A7A7A7;
    }

    input:-moz-placeholder {
        font-style: italic;
        color: #A7A7A7;
    }

</style>
