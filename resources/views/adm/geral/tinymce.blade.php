<script src="{{ url('tinymce/tinymce.js') }}"></script>
<script>
  var editor_config = {
    path_absolute : "/",
    selector: '{{ $selector }}',

    toolbar: "insertfile undo redo | bold italic | link",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = '{{ url('laravel-filemanager') }}?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };
$(document).ready(function(){
  tinymce.init(editor_config);
 });

</script>