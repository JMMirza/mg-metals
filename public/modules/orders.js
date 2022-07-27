$(document).ready(function () {
    var route = $("#ajaxRoute").val();
    console.log(route);
    $("#customer-orders-data-table").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        scrollX: true,
        scrollCollapse: true,
        fixedColumns: {
            right: 1,
        },
        language: {
            search: "",
            searchPlaceholder: "Search...",
        },
        ajax: route,
        columns: [
            {
                data: "customer_id",
                name: "customer_id",
            },
            {
                data: "customer.full_name",
                name: "customer.full_name",
                defaultContent: '<span>N / A</span>'
            },
            {
                data: "customer.user.email",
                name: "customer.user.email",
                defaultContent: '<span>N / A</span>'
            },
            {
                data: "customer.user.customer_type",
                name: "customer.user.customer_type",
                defaultContent: '<span>N / A</span>'
            },
            {
                data: "delivery_method",
                name: "delivery_method",
                defaultContent: '<span>N / A</span>'
            },
            {
                data: "total_quantity",
                name: "total_quantity",
                defaultContent: '<span>N / A</span>'
            },
            {
                data: "total_order_price",
                name: "total_order_price",
                defaultContent: '<span>N / A</span>'
            },
            {
                data: "shipping_address",
                name: "shipping_address",
                defaultContent: '<span>N / A</span>'
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
