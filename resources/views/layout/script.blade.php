<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
{{--<script src="{{ asset('js/jquery.slim.min.js')  }}"></script>--}}
<script src="{{ asset('js/popper.min.js')  }}"></script>
<script src="{{ asset('js/bootstrap.min.js')  }}"></script>
<script src="https://cdn.bootcss.com/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"></script>--}}
{{--    <script src="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/showdown/2.1.0/showdown.min.js"></script>--}}
{{--showdown-table.min.js--}}
<script>
    /**
     * https://www.cnblogs.com/qq364735538/p/13026554.html
     * @param text
     * @param icon
     * @param hideAfter
     */
    function showMsg(text, icon, hideAfter) {
        if (heading == undefined) {
            var heading = "提示";
        }
        $.toast({
            text: text,//消息提示框的内容。
            heading: heading,//消息提示框的标题。
            icon: icon,//消息提示框的图标样式。
            showHideTransition: 'fade',//消息提示框的动画效果。可取值：plain，fade，slide。
            allowToastClose: false,//是否显示关闭按钮。(true 显示，false 不显示)
            hideAfter: hideAfter,//设置为false则消息提示框不自动关闭.设置为一个数值则在指定的毫秒之后自动关闭消息提框
            stack: 1,//消息栈。同时允许的提示框数量
            position: 'top-center',//消息提示框的位置：bottom-left, bottom-right,bottom-center,top-left,top-right,top-center,mid-center。
            textAlign: 'left',//文本对齐：left, right, center。
            loader: false,//是否显示加载条
            //bgColor: '#FF1356',//背景颜色。
            //textColor: '#eee',//文字颜色。
            loaderBg: '#ffffff',//加载条的背景颜色。

            beforeShow: function(){
                // alert('The toast is about to appear');
            },

            afterShown: function () {
                // alert('Toast has appeared.');
            },

            beforeHide: function () {
                // alert('Toast is about to hide.');
            },

            afterHidden: function () {
                // alert('Toast has been hidden.');
            }

            /*toast事件
            beforeShow 会在toast即将出现之前触发
            afterShown 会在toast出现后触发
            beforeHide 会在toast藏起来之前触发
            afterHidden 会在toast藏起来后被触发
            */
        });
    }
</script>
@yield('script')
