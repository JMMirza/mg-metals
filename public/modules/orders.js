$(document).ready(function () {
    var route = $("#ajaxRoute").val();
    console.log(route);
    $("#customer-orders-data-table").DataTable({
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
            // {
            //     data: "customer_id",
            //     name: "customer_id",
            // },
            {
                data: "customer.full_name",
                name: "customer.full_name",
            },
            {
                data: "spot_price",
                name: "spot_price",
            },
            {
                data: "mark_up",
                name: "mark_up",
            },
            // {
            //     data: "product_id",
            //     name: "product_id",
            // },
            {
                data: "product.name",
                name: "product.name",
            },
            {
                data: "created_at",
                name: "created_at",
                width: "15%",
            },
        ],
    });
});
