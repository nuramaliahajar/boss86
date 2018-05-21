<script>
export default {
    props: ['columns'],
    data() {
        return {
            query: '',
            sort: 'created_at',
            orders: 'desc'
        }
    },
    methods: {
        setSort(value, sort) {
            this.sort = value
            if (this.orders == 'asc') {
                this.orders = 'desc'
            } else if (this.orders == 'desc') {
                this.orders = 'asc'
            }

            if (sort) {
                this.$emit('sorting', this.sort)
                this.$emit('orders', this.orders)
            }
        }
    }
}
</script>

<template>
    <div class="row">
        <div class="col-md-3 offset-md-9" style="padding-bottom: 10px">
            <div class="input-group input-group-default">
                <input type="text" class="form-control" @keyup.enter="$emit('query', query)" v-model="query" placeholder="Cari...">
                <span class="input-group-addon" @click.prevent="$emit('query', query)">
                    <i class="fa fa-search"></i>
                </span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box-dt-table table-responsive">
                <table class="table table-hover table-bordered width-full">
                    <thead>
                        <tr>
                            <th v-for="col in columns" 
                                :key="col.field"
                                :style="[ col.sort ? {'cursor': 'pointer'}:{'cursor': 'text'} ]"
                                @click.prevent="setSort(col.field, col.sort)"
                                >
                                {{ col.title }}
                                <span :class="{ 'icofont icofont-expand-alt': col.sort }"></span>
                            </th>
                        </tr>
                    </thead>
                    <slot name="data"></slot>
                    <slot name="footer"></slot>
                </table>
            </div>
        </div>
    </div>
</template>
