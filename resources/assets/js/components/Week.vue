<template lang="html">
    <div class="container">

        <div class="col-md-12 col-md-offset-1">

        <div class="col-md-2">

            <table class="table table-hover panel panel-default">
                <thead class="panel-heading">
                    <tr>
                        <th class="col-sm-3">Monday</th>
                    </tr>
                </thead>
                <tbody class="panel-body">
                    <tr v-for="shift in shifts_1">
                        <td>
                            {{ shift.employee.firstName }}
                            {{ shift.employee.lastName }} <br>
                            {{ shift.startTime }} ~
                            {{ shift.endTime }}
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

        <div class="col-md-2">

            <table class="table table-hover panel panel-default">
                <thead class="panel-heading">
                    <tr>
                        <th class="col-sm-3">Tuesday</th>
                    </tr>
                </thead>
                <tbody class="panel-body">
                    <tr v-for="shift in shifts_2">
                        <td>
                            {{ shift.employee.firstName }}
                            {{ shift.employee.lastName }} <br>
                            {{ shift.startTime }} ~
                            {{ shift.endTime }}
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

        <div class="col-md-2">

            <table class="table table-hover panel panel-default">
                <thead class="panel-heading">
                    <tr>
                        <th class="col-sm-3">Wednesday</th>
                    </tr>
                </thead>
                <tbody class="panel-body">
                    <tr v-for="shift in shifts_3">
                        <td>
                            {{ shift.employee.firstName }}
                            {{ shift.employee.lastName }} <br>
                            {{ shift.startTime }} ~
                            {{ shift.endTime }}
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

        <div class="col-md-2">

            <table class="table table-hover panel panel-default">
                <thead class="panel-heading">
                    <tr>
                        <th class="col-sm-3">Thursday</th>
                    </tr>
                </thead>
                <tbody class="panel-body">
                    <tr v-for="shift in shifts_4">
                        <td>
                            {{ shift.employee.firstName }}
                            {{ shift.employee.lastName }} <br>
                            {{ shift.startTime }} ~
                            {{ shift.endTime }}
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

        <div class="col-md-2">

            <table class="table table-hover panel panel-default">
                <thead class="panel-heading">
                    <tr>
                        <th class="col-sm-3">Friday</th>
                    </tr>
                </thead>
                <tbody class="panel-body">
                    <tr v-for="shift in shifts_5">
                        <td>
                            {{ shift.employee.firstName }}
                            {{ shift.employee.lastName }} <br>
                            {{ shift.startTime }} ~
                            {{ shift.endTime }}
                        </td>
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
            edit: false,
            dates: {},
            shifts_1: {},
            shifts_2: {},
            shifts_3: {},
            shifts_4: {},
            shifts_5: {},
        };
    },

    mounted() {
        axios.get('/date').then( response => {
            this.dates = response.data;
            this.getWeek();
        });
    },

    methods: {
        getWeek() {
            axios.get('/weekly/' + this.dates['monday']).then( response => {
                this.shifts_1 = response.data;
            });
            axios.get('/weekly/' + this.dates['tuesday']).then( response => {
                this.shifts_2 = response.data;
            });
            axios.get('/weekly/' + this.dates['wednesday']).then( response => {
                this.shifts_3 = response.data;
            });
            axios.get('/weekly/' + this.dates['thursday']).then( response => {
                this.shifts_4 = response.data;
            });
            axios.get('/weekly/' + this.dates['friday']).then( response => {
                this.shifts_5 = response.data;
            });
        }

    }
}
</script>

<style lang="css">
</style>
