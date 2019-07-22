<template>
    <div id="allmap"></div>


</template>

<script>
    import {ROAST_CONFIG} from "../../config";

    export default {
        props: {
            'latitude': {  // 经度
                type: Number,
                default: function () {
                    return 104.05293751
                }
            },
            'longitude': {  // 纬度
                type: Number,
                default: function () {
                    return 30.55295155
                }
            },
            'zoom': {   // 缩放级别
                type: Number,
                default: function () {
                    return 5
                }
            }
        },
        data() {
            return {
                markers:[],
                infoWindows:[]
            }
        },
        mounted(){
            this.map = new BMap.Map('allmap');
            this.map.centerAndZoom(new BMap.Point('成都'),this.zoom);

            var marker = new BMap.Marker(this.latitude, this.longitude);  // 创建标注

            var top_left_control = new BMap.ScaleControl({ anchor: BMAP_ANCHOR_TOP_LEFT }); // 左上角，添加比例尺
            var top_left_navigation = new BMap.NavigationControl();  //左上角，添加默认缩放平移控件
            this.map.addControl(top_left_control);
            this.map.addControl(top_left_navigation);
            this.map.clearOverlays();
            this.buildMarkers();

        },
        computed:{
            cafes(){
                return this.$store.getters.getCafes;
            }

        },
        methods:{
            buildMarkers(){
                var image = ROAST_CONFIG.APP_URL + '/storage/img/coffee-marker.png';
                var icon = new BMap.Icon(image,new BMap.Size(19,33));

                for (var i =0; i<this.cafes.length; i++){
                    var new_point = new BMap.Point(parseFloat(this.cafes[i].longitude),parseFloat(this.cafes[i].latitude));
                    var marker = new BMap.Marker(new_point,{icon:icon});  // 创建标注
                    this.map.addOverlay(marker);              // 将标注添加到地图中
                    this.map.panTo(new_point);
                    marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画

                    var opts = {
                        width : 200,     // 信息窗口宽度
                        height: 100,     // 信息窗口高度
                        title : this.cafes[i].name , // 信息窗口标题
                        enableMessage:false//设置允许信息窗发送短息
                    }
                    var infoWindow = new BMap.InfoWindow("地址："+this.cafes[i].state+this.cafes[i].city+this.cafes[i].address, opts);  // 创建信息窗口对象
                    marker.addEventListener("click", function(){
                        this.map.openInfoWindow(infoWindow,new_point); //开启信息窗口
                    });
                }

            }
        },
        watch:{
            cafes(){
                this.buildMarkers();
            }
        }
    }
</script>

<style type="text/css">
    body, html {width: 100%;height: 100%;margin:0;font-family:"微软雅黑";}
    #allmap{width:100%;height:500px;}
    #r-result{width:100%;margin-top:5px;}
    p{margin:5px; font-size:14px;}
</style>