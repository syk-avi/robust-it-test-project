var getUrl = window.location;
var baseUrl = getUrl .protocol + "//" + getUrl.host;
tinymce.init({
    selector: '.editor',
    theme: 'modern',
    plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern responsivefilemanager'
    ],
    toolbar1: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
    toolbar2: 'print preview media | forecolor backcolor emoticons | responsivefilemanager',
    fontsize_formats: "8pt 9pt 10pt 11pt 12pt 14pt 18pt 24pt 30pt 36pt 48pt 60pt 72pt 96pt",
    content_style: "body { font-size: 14pt; }",
    external_filemanager_path:baseUrl+"/lib/filemanager/",
    filemanager_title:"Filemanager" ,
    external_plugins: { "filemanager" : "../filemanager/plugin.min.js"},
    filemanager_access_key:"lB2PK8fl735R7xM849MA50UHFJXpID38" ,
    image_advtab: true
});