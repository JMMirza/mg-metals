$(document).ready(function () {
    var route = $("#ajaxRoute").val();
    console.log(route);
    $("#products-commission-data-table").DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        scrollX: true,
        "order": [[ 0, "desc" ]],
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
                data: "tier_type",
                name: "tier_type",
            },
            {
                data: "product_id",
                name: "product_id",
            },
            {
                data: "product.name",
                name: "product.name",
            },
            {
                data: "product_price",
                name: "product_price",
            },
            {
                data: "product_mark_up",
                name: "product_mark_up",
            },
            {
                data: "tier_commission_percentage",
                name: "tier_commission_percentage",
            },
             {
                data: "tier_commission",
                name: "tier_commission",
            },
            {
                data: "created_at",
                name: "created_at",
                width: "15%",
            },
        ],
    });
});
