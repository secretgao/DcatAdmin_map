<iframe id="map" src="/admin/custom/map" width="100%" height="500" style="border:none"></iframe>
<script>
    /**
     * 设置坐标点
     */
    function setCoordinate(value) {
        var $coordinate = $('.field_location');
        $coordinate.val(value);
    }

    /**
     * 设置坐标区域
     * @param value
     */
    function setCoordinateArea(value) {
        var $coordinate = $('.field_address');
        $coordinate.val(value);
    }

    /**
     * 获取坐标
     */
    function getCoordinate() {
        var $coordinate = $('.field_location');
        var value = $coordinate.val();
        if (value == '') {
            var str = '42.094146111,121.849365';
            return str.split(',');
        }
        return value.split(',');
    }
</script>
