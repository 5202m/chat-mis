<div id="toolbar">
    <button id="button" class="btn btn-secondary">展开</button>
    <button id="button2" class="btn btn-secondary">收起</button>
</div>
<table
        id="table"
        data-toggle="table"
        data-toolbar="#toolbar"
        data-height="460"
        data-detail-view="true"
        data-detail-formatter="detailFormatter"
        data-url="dict/0/list">
    <thead>
    <tr>
        <th data-field="id">字典编码</th>
        <th data-field="name_cn">字典名称</th>
        <th data-field="status">状态</th>
    </tr>
    </thead>
</table>
<script>
    var $table = $('#table')
    var $button = $('#button')
    var $button2 = $('#button2')
    function mounted() {
        $button.click(function () {
            $table.bootstrapTable('expandRow', 1)
        })
        $button2.click(function () {
            $table.bootstrapTable('collapseRow', 1)
        })
    }
    function detailFormatter(index, row) {
        var html = []
        $.each(row, function (key, value) {
            html.push('<p><b>' + key + ':</b> ' + value + '</p>')
        })
        return html.join('')
    }
</script>