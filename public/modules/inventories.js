$(document).ready(function () {
    var route = $("#ajaxRoute").val();
    console.log(route);
    $("#inventories-data-table").DataTable({
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
                data: "id",
                name: "id",
            },
            {
                data: "product.name",
                name: "product.name",
            },
            {
                data: "order_id",
                name: "order_id",
                width: "15%",
            },
            {
                data: "units",
                name: "units",
                width: "15%",
            },
            {
                data: "product_price",
                name: "product_price",
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
