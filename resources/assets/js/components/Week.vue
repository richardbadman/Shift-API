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
                    <tr>
                        <td>
                            Test
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
                    <tr>
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
                    <tr>
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
                    <tr>
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
                    <tr>
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
            list: [],
            employees: {
                empID: '',
                firstName: '',
                lastName: '',
            }
        };
    },

    methods: {
        
    }
}
</script>

<style lang="css">
</style>
