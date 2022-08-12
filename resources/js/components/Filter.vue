<template>
    <FilterContainer>
        <h3 class="text-sm uppercase tracking-wide text-80 bg-30 p-3">{{ filter.name }}</h3>

        <template #filter>
            <v-select
                v-model="value"
                label="label"
                :options="filter.options"
                :value="value"
                :dusk="filter.label + '-filter-select'"
                @change="value = $event"></v-select>

        </template>
    </FilterContainer>
</template>

<script>
import debounce from 'lodash/debounce'
import VueSelect from 'vue-select';

export default {
    emits: ['change'],

    components: {
        'v-select': VueSelect,
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
        lens: String,
    },

    data: () => ({
        value: null,
        debouncedHandleChange: null,
    }),

    created() {
        this.debouncedHandleChange = debounce(() => this.handleChange(), 500)

        this.setCurrentFilterValue()
    },

    mounted() {
        Nova.$on('filter-reset', this.setCurrentFilterValue)
    },

    beforeUnmount() {
        Nova.$off('filter-reset', this.setCurrentFilterValue)
    },

    watch: {
        value() {
            this.debouncedHandleChange()
        },
    },

    methods: {
        setCurrentFilterValue() {
            this.value = this.filter.currentValue
        },

        handleChange() {
            this.$store.commit(`${this.resourceName}/updateFilterState`, {
                filterClass: this.filterKey,
                value: this.value,
            })

            this.$emit('change')
        },
    },

    computed: {
        filter() {
            return this.$store.getters[`${this.resourceName}/getFilter`](
                this.filterKey
            )
        },
    },
}
</script>
