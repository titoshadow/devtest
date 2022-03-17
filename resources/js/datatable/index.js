// noinspection JSVoidFunctionReturnValueUsed

import * as $ from 'jquery';
import 'datatables';

export default (function () {
    $('#table').DataTable({
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
            url: "/api",
            type: 'GET',
        },
        columns: [
            {
                data: 'Title',
                name: 'Title',
                orderable: false
            },
            {
                data: 'Link',
                name: 'Link',
                orderable: false,
                render: function(data){
                    if(data){
                        return '<td><span class="icon-holder"><a target="_blank" href="' + data + '" class="fa-solid fa-arrow-up-right-from-square c-blue-500"></a></span></td>';
                    } else {
                        return '<td><span class="icon-holder"><i class="fas fa-times c-red-500"></i></span></td>';
                    }
                }
            },
            {
                data: 'Address',
                name: 'Address',
                orderable: false
            },
            {
                data: 'City',
                name: 'City',
                orderable: false
            },
            {
                data: 'Image',
                name: 'Image',
                orderable: false,
                searchable: false,
                render: function(data){
                    if(data){
                        return '<td><span class="icon-holder"><a target="_blank" href="' + data + '" class="fa-solid fa-image c-blue-500"></a></span></td>';
                    } else {
                        return '<td><span class="icon-holder"><i class="fas fa-times c-red-500"></i></span></td>';

                    }
                }
            }
        ]
    });
}());
