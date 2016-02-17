function exeData(num, type) {
    loadData(num);
    loadpage();
}
function loadpage() {
    var myPageCount = parseInt($("#PageCount").val());
    var myPageSize = parseInt($("#PageSize").val());
    console.log(myPageCount +"ss"+ myPageSize);
    var countindex = myPageCount % myPageSize > 0 ? (myPageCount / myPageSize) + 1 : (myPageCount / myPageSize);
    $("#countindex").val(countindex);

    $.jqPaginator('#pagination', {
        totalPages: parseInt($("#countindex").val()),
        visiblePages: parseInt($("#visiblePages").val()),
        currentPage: 1,
        first: '<li class="first"><a href="javascript:;">首页</a></li>',
        prev: '<li class="prev"><a href="javascript:;"><i class="arrow arrow2"></i>上一页</a></li>',
        next: '<li class="next"><a href="javascript:;">下一页<i class="arrow arrow3"></i></a></li>',
        last: '<li class="last"><a href="javascript:;">末页</a></li>',
        page: '<li class="page"><a href="javascript:;">{{page}}</a></li>',
        onPageChange: function (num, type) {
            if (type == "change") {
                $pageCount = $('#visiblePages').val();
                //alert($pageCount);
                $.ajax({
                    type:'POST',
                    url:'mypage.php',
                    data:{'num':num,'pageCount':$pageCount},
                    success:function(data){
                        if(data!=null){
                            var strs ="";
                            var json = $.parseJSON(data);
                            $(json).each(function(i,val){
                                var tr='<tr>';
                                $.each(val,function(k,v){
                                    tr+='<td>'+v+'</td>';
                                });
                                 tr +='</tr>';
                                 strs +=tr;
                            });
                            $('#carinfo tbody').html(strs);
                        }
                    },
                })

               // exeData(num, type);
                //loadData(num);
                //location.href='index.php?pageCurrent='+num;
            }
        }
    });
}
$(function () {
    loadData(1);
    loadpage();
});