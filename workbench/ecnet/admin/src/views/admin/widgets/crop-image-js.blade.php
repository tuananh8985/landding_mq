    <script src="/packages/ecnet/admin/assets/js/jquery.form.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/packages/ecnet/admin/assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/packages/ecnet/admin/assets/js/jquery.Jcrop.min.js"></script>
<script src="{{URL::to('/')}}/packages/ecnet/admin/assets/js/jquery.form.js"></script>

<script type="text/javascript">
var jcrop_val;
var displayWith = $('#dummy_image').width();
var displayHeight = $('#dummy_image').height();

var options = {
    uploadProgress:function(event, position, total, percentComplete){
        $("#upload_btn").css('display','none');
        $("#proccess").css('display','');
        $("#proccess_bar").css('width',percentComplete + '%');
    },
    success : function(result){
        if($('#crop').val()=='yes'){
            jcrop_val.destroy();
        }
        $("#proccess").css('display','none');
        $('#done_icon').css('display','');
        $('#image').val(result);
        $('#current_image').val(result);
        $('#jcrop_target').height(displayHeight);
        $('#jcrop_target').attr('src',"{{URL::to('/')."/"}}"+result);
        $('#uncrop_button').css('display','none');
     }

};
var form = $('#upload_image').ajaxForm();
// hàm này sẽ gọi ra khi crop ảnh
function config_crop(coords)
  {
    $('#cx').val(coords.x);
    $('#cy').val(coords.y);
    $('#cw').val(coords.w);
    $('#ch').val(coords.h);
    $('#fixed_width').val({{$img_option['w']}});
  }

$('#crop_button').click(function(){
     $('#jcrop_target').Jcrop({
            setSelect: [0,0,{{$img_option['w']}},{{$img_option['h']}}],
            onSelect:    config_crop,
            aspectRatio: {{$img_option['w']}} / {{$img_option['h']}}
            },function(){
                jcrop_val = this;
            });
    $('#uncrop_button').css('display','');
    $('#crop').val('yes');
});
$('#uncrop_button').click(function(){
    if($('#crop').val()=='yes'){
        jcrop_val.destroy();
    }
    $('#crop').val('no');

});

$('#upload_btn').click(function(){
    $('#fixed_width').val($("#crop_div").width());
     form.ajaxSubmit(options);
});

$("#image_input").change(function(){
    $("#upload_btn").css('display','');
});

</script>