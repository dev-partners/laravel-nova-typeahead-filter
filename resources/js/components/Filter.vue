<template>
    <div>
        <h3 class="text-sm uppercase tracking-wide text-80 bg-30 p-3">{{ filter.name }}</h3>

        <div class="p-2">
            <v-select
                    v-model="selected"
                    label="name"
                    :options="filter.options"
                    :value="value"
                    :dusk="filter.name + '-filter-select'"
                    @input="handleChange"
                    @change="handleChange"></v-select>
        </div>
    </div>
</template>

<script>
    import vSelect from 'vue-select';

    export default {
        components: {
            'v-select': vSelect
        },
        props: {
            resourceName: {
                type: String,
                required: true,
            },
            filterKey: {
                type: String,
                required: true,
            },
        },

        data() {
            return {
                selected: null,
            }
        },

        methods: {
            handleChange(event) {

                this.$store.commit(`${this.resourceName}/updateFilterState`, {
                    filterClass: this.filterKey,
                    value: event.value,
                })

                this.$emit('change')
            },
        },

        computed: {
            filter() {
                return this.$store.getters[`${this.resourceName}/getFilter`](this.filterKey)
            },

            value() {
                return this.filter.currentValue
            },
        },
    }
</script>
