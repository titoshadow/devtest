import * as $ from 'jquery';
import 'datatables';

export default (function () {
    let table = $('#table').DataTable({
        language: {
            processing: "<i class='fa fa-refresh fa-spin' style='margin-left: 30%'></i><small> Loading ...</small>",
            emptyTable: "No data available :("
        },
        processing: true,
        // stateSave: true,
        responsive: true,
        serverSide: true,
        deferRender: true,
        pagingType: 'numbers',
        order: [],
        ajax: {
            url: "/",
            type: 'GET',
            beforeSend: function () {
                $('#reloadButton').addClass("disabled");
            },
            complete: function () {
                $('#reloadButton').removeClass("disabled");
            }
        },
        columns: [
            {
                data: 'Title',
                name: 'Title',
                orderable: true
            },
            {
                data: 'Link',
                name: 'Link',
                orderable: true
            },
            {
                data: 'Address',
                name: 'Address',
                orderable: true
            },
            {
                data: 'City',
                name: 'City',
                orderable: true
            },
            {
                data: 'Image',
                name: 'Image',
                orderable: false,
                searchable: false
            }
        ]
    });
}());
