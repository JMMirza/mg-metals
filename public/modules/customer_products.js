$(document).ready(function () {
    var route = $("#ajaxRoute").val();
    console.log(route);
    $("#customer-products-data-table").DataTable({
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
                data: "customer_id",
                name: "customer_id",
            },
            {
                data: "customer.name",
                name: "customer.name",
            },
            {
                data: "purchase_price",
                name: "purchase_price",
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
                data: "created_at",
                name: "created_at",
                width: "15%",
            },
        ],
    });
});
