<template>
   <div>
        <router-view></router-view>
   </div>
</template>



<script>

import {mapState} from 'vuex'


export default {
    components: {

    },
    computed: {
        ...mapState(['user'])
    }
}
</script>
