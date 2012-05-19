$(document).ready(function(){
    $('#tags').tagsInput();

    $(".meta-name").live("click",function(){
        var name = $("#name").val();
        if(name == "")
            alert("Change Meta Name");
        else{
            $.ajax( {
                url: '/yiiseo/seo/addmetaname',
                type: 'POST',
                data: {name : name},
                success: function (msg) {
                    $("#load-meta-name").append(msg);
                }
            });
        }
    });

    $(".deleteblock").live("click",function(){
        var ptr = confirm('Вы действительно хотите удалить элемент?');
        if(ptr){
            var id = $(this).data("id");
            console.log(id);
            var $this = $(this);
            if(id == null)
            {
                $(this).parent().fadeOut();
            }
            else{
                $.ajax( {
                    url: '/yiiseo/seo/deletemetaname',
                    type: 'POST',
                    data: {id : id},
                    success: function (msg) {
                        $this.parent().fadeOut(500,function(){
                            $this.parent().remove();
                        });
                    }
                });
            }

        }
        return false;
    });


    $(".meta-property").live("click",function(){
        var count = $(this).data("count");
        var $this = $(this);
        console.log(count);
        $.ajax( {
            url: '/yiiseo/seo/addmetaproperty',
            type: 'POST',
            data: {count : count},
            success: function (msg) {
                $("#load-meta-property").append(msg);
                $this.data("count",++count);
            }
        });
    });


    $(".deleteproperty").live("click",function(){
        var ptr = confirm('Вы действительно хотите удалить элемент?');
        if(ptr){
            var id = $(this).data("id");
            console.log(id);
            var $this = $(this);
            if(id == null)
            {
                $(this).parent().fadeOut();
            }
            else{
                $.ajax( {
                    url: '/yiiseo/seo/deletemetaproperty',
                    type: 'POST',
                    data: {id : id},
                    success: function (msg) {
                        $this.parent().fadeOut(500,function(){
                            $this.parent().remove();
                        });
                    }
                });
            }

        }
        return false;
    });
});
