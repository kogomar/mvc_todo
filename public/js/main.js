/* Projects scripts start*/
$(document).ready(function() {
    //show add block

    $("#show_add_pro").on("click", function () {
        if($('.add_project').css('display','none')){
        $(".add_project").show();
            $("#pro_update").hide();

        }
    });
    $("#pro_cancel").on("click", function () {
    $('.add_project').hide();
    });



    $("#pro_send").on("click", function () {
        let pcolor = $('#pro_color').val();
        let pname= $('#pro_name').val();
        let user = $('#puser').val();

        $.ajax({
            method: "POST",
            url: "/",
            data: { action: "add", param: "project", color:pcolor, name:pname, puser: user}
        })
            .done(function( msg ) {
               // alert( "Data Saved: " + msg );
                location.reload();
            });
    });

    $('ul[data-hint]').on({
        mouseenter: function(){
            let hint_id = $(this).data('hint');
            let hint_li = '#hint-'+hint_id;
            $(hint_li ).show();
        },
        mouseleave: function(){
            let hint_id = $(this).data('hint');
            let hint_li = '#hint-'+hint_id;
            $(hint_li ).hide();
        },
    });

    $("#pro_update").on("click", function () {
        let pcolor = $('#pro_color').val();
        let pname= $('#pro_name').val();
        let id  = $('#pro_id').val();
        $.ajax({
            method: "POST",
            url: "/",
            data: { action: "edit", param: "project", color:pcolor, name:pname, id:id }
        })
            .done(function( msg ) {
                //alert( "Data Saved: " + msg );
                location.reload();
            });
    });


});

function deletePro(id) {
    $.ajax({
        method: "POST",
        url: "/",
        data: { action: "delete", param: "project", id:id }
    })
        .done(function( msg ) {
            let arr = msg.split("<!", 2);
            if (arr[0] === 'Delete false! You have tasks in progress' ) {
                alert(arr[0]);
            }
        });
    location.reload();
}
function clickEditPro(id, name, color) {
   $('#pro_id').val(id);
    $('#pro_name').val(name);
    $('#pro_color').val(color);

    if($('.add_project').css('display','none')){
        $(".add_project").show();
        $("#pro_send").hide();
    }
}


/* Projects scripts end*/



/* Tasks scripts start*/



$(document).ready(function() {

    $("#show_add_task").on("click", function () {
        $('#preview').show();
        $('#update_task').hide();
        $('#task_status_p').hide()

    });
    $("#close_modal").on("click", function () {
        $('#preview').hide();
    });



    $("#send_task").on("click", function () {
        let taskText = $('#task_text').val();
        let user = $('#username').val();
        let priority = $('#task_priority').val();
        let projects_id = $('#task_project').val();
        let project_id  = projects_id.split('|');
        let date  = $('#task_day').val();

        $.ajax({
            method: "POST",
            url: "/",
            data: { action: "add", param: "task", tname:taskText, user:user, projects_id:project_id[1], priority:priority, status: 'In progress', date:date }
        })
            .done(function( msg ) {
                //alert( "Data Saved: " + msg );
            });
        location.reload();
    });

    $('ul[data-oldhint]').on({
        mouseenter: function(){
            let hint_id = $(this).data('oldhint');
            let hint_li = '#oldhint-'+hint_id;
            $(hint_li ).show();
        },
        mouseleave: function(){
            let hint_id = $(this).data('oldhint');
            let hint_li = '#oldhint-'+hint_id;
            $(hint_li ).hide();
        },
    });


    $('ul[data-taskhint]').on({
        mouseenter: function(){
            let hint_id = $(this).data('taskhint');
            let hint_li = '#taskhint-'+hint_id;
            $(hint_li ).show();
        },
        mouseleave: function(){
            let hint_id = $(this).data('taskhint');
            let hint_li = '#taskhint-'+hint_id;
            $(hint_li ).hide();
        },
    });



    $("#update_task").on("click", function () {
        let id = $('#edit_id').val();
        let user = $('#username').val();
        let tname = $('#task_text').val();
        let priority = $('#task_priority').val();
        let projects_id = $('#task_project').val();
        let project_id = projects_id.split('|');
        let date = $('#task_day').val();
        $.ajax({
            method: "POST",
            url: "/",
            data: {
                action: "edit",
                param: "task",
                id: id,
                tname: tname,
                projects_id: project_id[1],
                priority: priority,
                end_time: date
            }
        })
            .done(function (msg) {
               // alert("Data Saved: " + msg);
            });
        location.reload();
});


});





function updateTask(id, tname, e_time, pname, priority) {
    let prior;
    switch (priority) {
        case '1':
            prior = 'High';
            break;
        case '2':
            prior = 'Medium';
            break;
        case '3':
            prior= 'Low';
            break;
    }
    $('#preview').show();
    $('#task_status_p').hide();
    $("#send_task").hide();
    $('#update_task').show();

    $('#edit_id').val(id);
    $('#task_text').val(tname);
    $('#task_priority').val(prior);

}

function deleteTask(id) {
    $.ajax({
        method: "POST",
        url: "/",
        data: { action: "delete", param: "task", id:id }
    })
        .done(function( msg ) {
            //alert( "Data Saved: " + msg );
            location.reload();
        });
}


function doneTask(id) {
    $.ajax({
        method: "POST",
        url: "/",
        data: { action: "done", param: "task", id:id }
    })
        .done(function( msg ) {
           // alert( "Data Saved: " + msg );
            location.reload();
        });

}


/* Tasks scripts end*/