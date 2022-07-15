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
            },
            {
                data: "customer.user.email",
                name: "customer.user.email",
            },
            {
                data: "customer.user.customer_type",
                name: "customer.user.customer_type",
            },
            {
                data: "product_id",
                name: "product_id",
            },
            {
                data: "product.sku",
                name: "product.sku",
            },
            {
                data: "product.name",
                name: "product.name",
            },
             {
                data: "delivery_method",
                name: "delivery_method",
            },
            {
                data: "spot_price",
                name: "spot_price",
            },
            {
                data: "mark_up",
                name: "mark_up",
            },
            {
                data: "quantity",
                name: "quantity",
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
