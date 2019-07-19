<style>

</style>

<template>
    <div id="home">
        <span v-show="cafesLoadStatus ==1">加载中</span>
        <span v-show="cafesLoadStatus==2">加载成功</span>
        <span v-show="cafesLoadStatus==3">加载失败</span>
    </div>
</template>

<script>
    export default {
        created(){
            this.$store.dispatch('loadCafes');
        },

        computed:{
            /*
            获取加载状态
             */
            cafesLoadStatus(){
                return this.$store.getters.getCafesLoadStatus;
            },

            /*
            获取所有咖啡店数据
             */
            cafes(){
                return this.$store.getters.getCafes;
            }
        }
    }
</script>