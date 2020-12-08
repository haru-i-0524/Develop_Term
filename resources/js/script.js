 (function($, window) {
 $(function() {
    // フォームカウント
    var frm_cnt = 0;

    // clone object
    $(document).on('click', 'span.add', function() {
        var original = $('#form_block\\[' + frm_cnt + '\\]');
        var originCnt = frm_cnt;
    

        frm_cnt++;

        original
            .clone()
            .hide()
        .insertAfter(original)
        .attr('id', 'form_block[' + frm_cnt + ']') // クローンのid属性を変更。
        .find("input[type='file']")
        .end() // 一度適用する
        .find('input, text').each(function(idx, obj) {
            $(obj).attr({
                id: $(obj).attr('id').replace(/\[[0-9]\]+$/, '[' + frm_cnt + ']'),
                name: $(obj).attr('name').replace(/\[[0-9]\]+$/, '[' + frm_cnt + ']')
            });
            $(obj).val('');
        });

        // clone取得
        var clone = $('#form_block\\[' + frm_cnt + '\\]');
        clone.children('span.close').show();
        clone.slideDown('slow');

        // close object
        $(document).on('click', 'span.close', function() {
            var removeObj = $(this).parent();
            removeObj.fadeOut('fast', function() {
                removeObj.remove();
                // 番号振り直し
                frm_cnt = 0;
                $(".form-block[id^='form_block']").each(function(index, formObj) {
                    if ($(formObj).attr('id') != 'form_block[0]') {
                        frm_cnt++;
                        $(formObj)
                        .attr('id', 'form_block[' + frm_cnt + ']') // id属性を変更。
                        .find('input, text').each(function(idx, obj) {
                            $(obj).attr({
                                id: $(obj).attr('id').replace(/\[[0-9]\]+$/, '[' + frm_cnt + ']'),
                                name: $(obj).attr('name').replace(/\[[0-9]\]+$/, '[' + frm_cnt + ']')
                            });
                        });
                    }
                });
            
            });
        });
    });
});
})(jQuery, window);