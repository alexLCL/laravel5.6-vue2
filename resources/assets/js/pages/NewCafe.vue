<style>

</style>

<template>
    <div class="page">
        <form>
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div class="large-12 medium-12 small-12 cell">
                        <label>名称
                            <input type="text" placeholder="咖啡店名" v-model="name">
                        </label>
                        <span class="validation" v-show="!validations.name.is_valid">{{ validations.name.text }}</span>
                    </div>
                    <div class="large-12 medium-12 small-12 cell">
                        <label>地址
                            <input type="text" placeholder="地址" v-model="address">
                        </label>
                        <span class="validation" v-show="!validations.address.is_valid">{{ validations.address.text }}</span>
                    </div>
                    <div class="large-12 medium-12 small-12 cell">
                        <label>城市
                            <input type="text" placeholder="城市" v-model="city">
                        </label>
                        <span class="validation" v-show="!validations.city.is_valid">{{ validations.city.text }}</span>
                    </div>
                    <div class="large-12 medium-12 small-12 cell">
                        <label>省份
                            <input type="text" placeholder="省份" v-model="state">
                        </label>
                        <span class="validation" v-show="!validations.state.is_valid">{{ validations.state.text }}</span>
                    </div>
                    <div class="large-12 medium-12 small-12 cell">
                        <label>邮编
                            <input type="text" placeholder="邮编" v-model="zip">
                        </label>
                        <span class="validation" v-show="!validations.zip.is_valid">{{ validations.zip.text }}</span>
                    </div>
                    <div class="large-12 medium-12 small-12 cell">
                        <a class="button" v-on:click="submitNewCafe()">提交</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: '',
                address: '',
                city: '',
                state: '',
                zip: '',

                validations:{
                    name:{
                        is_valid:true,
                        text:''
                    },
                    address:{
                        is_valid:true,
                        text:''
                    },
                    city:{
                        is_valid:true,
                        text:''
                    },
                    state:{
                        is_valid:true,
                        text:''
                    },
                    zip:{
                        is_valid:true,
                        text:''
                    }
                }
            }
        },
        methods: {
            submitNewCafe: function () {
                if(this.validateNewCafe()){
                    this.$store.dispatch('addCafe', {
                        name: this.name,
                        address: this.address,
                        city: this.city,
                        state: this.state,
                        zip: this.zip
                    });
                }

            },
            validateNewCafe:function () {
                let validNewCafeForm = true;

                if(this.name.trim()===''){
                    validNewCafeForm =false;
                    this.validations.name.is_valid=false;
                    this.validations.name.text = '请输入咖啡店名字';
                }else{
                    this.validations.name.is_valid = true;
                    this.validations.name.text=''
                }

                if(this.address.trim()===''){
                    validNewCafeForm = false;
                    this.validations.address.is_valid=false;
                    this.validations.address.text='请输入咖啡店地址';
                }else{
                    this.validations.address.is_valid=true;
                    this.validations.text='';
                }

                if(this.city.trim()===''){
                    validNewCafeForm=false;
                    this.validations.city.is_valid=false;
                    this.validations.city.text='请输入城市';
                }else{
                    this.validations.city.is_valid=true;
                    this.validations.city.text='';
                }

                if(this.state.trim()===''){
                    validNewCafeForm=false;
                    this.validations.state.is_valid=false;
                    this.validations.state.text='请输入省份';
                }else{
                    this.validations.state.is_valid=true;
                    this.validations.state.text='';
                }

                if(this.zip.trim()===''){
                    validNewCafeForm=false;
                    this.validations.zip.is_valid=true;
                    this.validations.zip.text='请输入邮编';
                }else{
                    this.validations.zip.is_valid=true;
                    this.validations.zip.text='';
                }

                return validNewCafeForm;
            }
        }
    }


</script>