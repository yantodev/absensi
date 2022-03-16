/**
 * @Author : yantodev
 * mailto: ekocahyanto007@gmail.com
 * link : http://yantodev.github.io/
 */

$(document).ajaxComplete(showEditor());
function showEditor() {
    console.log("cek");
    var ckeditor = CKEDITOR.replace('keterangan', {
    height: '100px'
    });
    CKEDITOR.disableautoInline = true;
    CKEDITOR.Inline('editable');
}
