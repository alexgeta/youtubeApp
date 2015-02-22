/**
 *
 */

$(document).ready(function(){

    /*page index.php*/

    $("#addVideoButton").click(function(){
        var videoId = $("input[name=videoId]").val();
        if(videoId) {
            var url = "http://gdata.youtube.com/feeds/api/videos/"+videoId+"?v=2&alt=json";
            var request = new XMLHttpRequest();
            request.open("GET", url, false);
            request.send();
            if(request.status!=200){
                alert("Invalid Video ID");
                return;
            }
            $.getJSON(url,function(data){
                $("input[name=title]").val(data.entry.title.$t);
                $("input[name=views]").val(data.entry.yt$statistics.viewCount);
                $("input[name=likes]").val(data.entry.yt$rating.numLikes);
                $("input[name=dislikes]").val(data.entry.yt$rating.numDislikes);
                $("input[name=channel]").val(data.entry.author[0].name.$t);
                var addVideoForm = $("#addVideoForm");
                addVideoForm.attr("action","/add.php");
                addVideoForm.submit();
            });
        }else alert("Please input videoID!");
    });

    $("#deleteButton").click( function(){
        var atLeastOneIsChecked = $(".checkbox").is(":checked");
        if (atLeastOneIsChecked){
            var tableForm = $("#tableForm");
            tableForm.attr("action", "/delete.php");
            tableForm.submit();
        }else alert("Select at least one item!");
    });

    $('#editButton').click(function () {
        var checkedCount = $("[type='checkbox']:checked").length;
        if(checkedCount < 2 ) {
            self.name = "list";
            var tableForm = $("#tableForm");
            tableForm.submit(function() {
                window.open('', 'edit', 'width=400,height=300,top=200,left=450');
                this.target = 'edit';
                this.action = '/edit.php';
            });
            tableForm.submit();
        }else alert("Please select just one row to be edited");
    });

    $('#refreshButton').click(function(){
        location.href = '/';
    });

    setTimeout(function(){
        $(".exist").fadeOut('slow');
    },3000);

    /*page edit.php*/

    $("#addButton").click(function(){
        addOrUpdate();
    });

    $("#updateButton").click(function(){
        addOrUpdate();
    });

    $("#cancelButton").click(function(){
        opener.$("#refreshButton").click();
        self.close();
    });

    function addOrUpdate(){
        var editForm = $("#editForm");
        editForm.submit(function(){
            this.target = opener.name;
            this.action = "/update.php";
            self.close();
        });
        editForm.submit();
    }

});

