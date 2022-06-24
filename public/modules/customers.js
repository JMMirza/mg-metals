$(document).ready(function () {
    var route = $("#ajaxRoute").val();
    console.log(route);
    $("#customers-data-table").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,

        scrollX: true,
        language: {
            search: "",
            searchPlaceholder: "Search...",
        },
        ajax: route,
        columns: [
            {
                data: "full_name",
                name: "full_name",
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
