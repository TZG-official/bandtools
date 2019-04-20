var $$ = mdui.JQ;

$$('#like').on('click', function () {
  mdui.snackbar({
    message: '感谢你的支持！要不，捐赠一下？'
  });
});