<template>
    <div class="container">
        <h1 class="text-center">List of items</h1>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Count</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(item, index) in items">
                                <td>{{ item.name }}</td>
                                <td>{{ item.count }}</td>
                                <td><button v-on:click="removeItem(index)" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span></button></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="form-inline">
                    <div class="form-group col-md-12" v-if="errors.length">
                        <b>Please, fix the errors below:</b>
                        <ul>
                            <li v-for="error in errors">{{ error }}</li>
                        </ul>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input v-model="name" type="text" class="form-control" id="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="count">Count</label>
                        <input v-model="count" type="number" class="form-control" id="count" placeholder="Enter count">
                    </div>
                    <button v-on:click="addItem" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span></button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {

        data: function () {
            return {
                items: [],
                errors: [],
                name: null,
                count: null,
            }
        },

        methods: {

            getItems: function () {
                let app = this;

                fetch('/items')
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (data) {
                        app.items = data;
                    })
                    .catch(function (error) {
                        console.log(error.message);
                    });
            },

            removeItem: function (index) {
                this.items.splice(index, 1);
            },

            addItem: function () {
                this.errors = [];

                if (this.name && this.count) {

                    if (this.isDuplicate(this.name)) {
                        this.errors.push("Name " + this.name + " is already in use!");

                        return false;
                    }

                    this.items.push({name: this.name, count: this.count});
                    this.name = null;
                    this.count = null;

                    return true;
                }

                if (!this.name) {
                    this.errors.push('Name field can not be blank!');

                    return false;
                }
                if (!this.age) {
                    this.errors.push('Count field can not be blank!');

                    return false;
                }
            },

            isDuplicate: function (name) {
                let duplicate = false;

                this.items.forEach(function (item) {
                    if (item.name === name) {
                        duplicate = true;
                        return;
                    }
                });

                return duplicate;
            }
        },

        created() {
            this.getItems();
        },

    }
</script>
