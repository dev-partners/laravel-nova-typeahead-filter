import Filter from './components/Filter.vue';

Nova.booting((Vue, store) => {
    Vue.component('typeahead-filter', Filter)
})
