$(document).ready(function () {
    var route = $("#ajaxRoute").val();
    console.log(route);
    $("#customers-data-table").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, "All"],
        ],
        scrollX: true,
        language: {
            search: "",
            searchPlaceholder: "Search...",
        },
        ajax: route,
        columns: [
            {
                data: "first_name",
                name: "first_name",
            },
            {
                data: "last_name",
                name: "last_name",
            },
            {
                data: "gender",
                name: "gender",
            },
            {
                data: "phone_number",
                name: "phone_number",
                width: "15%",
            },
            {
                data: "passport_no",
                name: "passport_no",
                width: "15%",
            },
            {
                data: "nationality",
                name: "nationality",
                width: "15%",
            },
            {
                data: "created_at",
                name: "created_at",
                width: "15%",
            },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false,
                width: "5%",
                sClass: "text-center",
            },
        ],
    });
});
