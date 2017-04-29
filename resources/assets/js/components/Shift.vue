<template lang="html">
    <div class="container">

      <div class="col-md-12">

          <h2>Add a Shift</h2>

          <div class="col-md-7">

              <div class="panel panel-default">
                  <div id="addPanel" class="panel-body">
                      <div class="alert alert-success" v-if="successDisp">
                          <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Successfully added Shift!
                      </div>
                      <div class="alert alert-danger" v-if="failedDisp">
                          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> There was an error adding the shift, please revise...
                      </div>

                      <table>
                          <thead>
                              <tr>
                                  <td class="col-md-3"></td>
                                  <td class="col-md-3"></td>
                              </tr>
                          </thead>

                          <tbody>
                              <tr>
                                  <td><h4>Start Date</h4></td>
                                  <td><h4>End Date</h4></td>
                              </tr>

                              <tr>
                                  <td><input type="date" v-model="shiftStart"></td>
                                  <td><input type="date" v-model="shiftEnd"></td>
                              </tr>

                              <tr>
                                  <td><h4>Start Time</h4></td>
                                  <td><h4>End Time</h4></td>
                              </tr>

                              <tr>
                                  <td><input type="time" v-model="startTime"></td>
                                  <td><input type="time" v-model="endTime"></td>
                              </tr>
                          </tbody>
                      </table>

                      <h4>Employee ID</h4>
                      <input type="text" placeholder="Enter in Employee ID..." v-model="empID">

                      <button id="adding" class="btn btn-primary" @click="addEmp">
                          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Shift
                      </button>

                  </div>
              </div>

          </div>

          <div class="col-md-5">

              <table class="table table-hover panel panel-default">
                  <thead class="panel-heading">
                      <tr>
                          <th class="col-sm-2">Employee ID</th>
                          <th class="col-sm-3">First Name</th>
                          <th class="col-sm-3">Last Name</th>
                      </tr>
                  </thead>
                  <tbody class="panel-body">
                      <tr v-for="emp in list">
                          <td> {{ emp.empID }} </td>
                          <td> {{ emp.firstName }} </td>
                          <td> {{ emp.lastName }} </td>
                      </tr>
                  </tbody>
              </table>

          </div>

      </div>

    </div>
</template>

<script>
export default {

    data: function() {
        return {

            successDisp: false,
            failedDisp: false,

            shiftStart: '',
            shiftEnd: '',
            startTime: '',
            endTime: '',
            empID: '',

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
        // this.successDisp = false;
        // this.failedDisp = false;
    },

    methods: {
        getEmployees() {

            axios.get('/employee').then( response => {
                this.list = response.data
            });
        },

        addEmp() {

            axios.post('/shift', {
                shiftStart: this.shiftStart,
                shiftEnd: this.shiftEnd,
                startTime: this.startTime,
                endTime: this.endTime,
                empID: this.empID,
              })
              .then(function (response) {
                console.log(response);
                this.successDisp = true;
                this.failedDisp = false;
                this.clearInputs();
            }.bind(this))
              .catch(function (error) {
                console.log('error');
                console.log(error);
                this.successDisp = false;
                this.failedDisp = true;
            }.bind(this));

        },

        clearInputs() {
            this.shiftStart = '';
            this.shiftEnd = '';
            this.startTime = '';
            this.endTime = '';
            this.empID = '';
        }

    }
}
</script>

<style lang="css">
    #addPanel {
        display: grid;
    }

    #addPanel input {
        /*flex: 1 auto;*/
        /*width: 40%;*/
        margin-bottom: 10px;
    }

    #adding {
        margin-top: 25px;
    }

    .input-section {
        width: 40%;
        /*position: absolute;*/
    }

    #bottom {

    }

    #righty {
        margin-left: 50%;
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
