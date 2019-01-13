
$(document).ready(function() {
    $("#send_task").on("click", function () {
        let taskText = $('#task_text').val();
        let user = $('#username').val();
        let priority = $('#task_priority').val();
        let status = $('#task_status').val();
        let projects_id = $('#task_project').val();
        let project_id  = projects_id.split('|');
        let date  = $('#task_day').val();

        $.ajax({
            method: "POST",
            url: "/",
            data: { action: "add", param: "task", tname:taskText, user:user, projects_id:project_id[1], priority:priority, status:status, date:date }
        })
            .done(function( msg ) {
                alert( "Data Saved: " + msg );
            });
    });


    $("#pro_send").on("click", function () {
        let pcolor = $('#pro_color').val();
        let pname= $('#pro_name').val();
        let user = $('#puser').val();

        $.ajax({
            method: "POST",
            url: "/",
            data: { action: "add", param: "project", color:pcolor, name:pname, puser: user }
        })
            .done(function( msg ) {
                alert( "Data Saved: " + msg );


            });
    });
});
function deleteTask(id) {
    $.ajax({
        method: "POST",
        url: "/",
        data: { action: "delete", param: "task", id:id }
    })
        .done(function( msg ) {
            alert( "Data Saved: " + msg );
        });
}
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
}

function doneTask(id) {
    $.ajax({
        method: "POST",
        url: "/",
        data: { action: "done", param: "task", id:id }
    })
        .done(function( msg ) {
            alert( "Data Saved: " + msg );
        });

}
function updateTask(id) {
    let taskText = $('#task_text').val();
    let priority = $('#task_priority').val();
    let status = $('#task_status').val();
    let projects_id = $('#task_project').val();
    let project_id  = projects_id.split('|');
    $.ajax({
        method: "POST",
        url: "/",
        data: { action: "edit", param: "task", id:id, tname:taskText, projects_id:project_id[1], priority:priority, status:status}
    })
        .done(function( msg ) {
            alert( "Data Saved: " + msg );
        });

}