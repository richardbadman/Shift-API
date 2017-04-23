<template lang="html">

    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Add an Employee</h2>
                <div class="panel panel-default">
                    <div id="addPanel" class="panel-body">
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
        }
    },

    methods: {

        addEmp() {
            axios.post('/employee', {
                firstName: this.firstName,
                lastName: this.lastName,
                isAdmin: false,
              })
              .then(function (response) {
                console.log(response);
              })
              .catch(function (error) {
                console.log(error);
              });
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
