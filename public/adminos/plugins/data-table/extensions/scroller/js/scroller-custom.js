$(document).ready(function() {
    $('#basic-scroller').DataTable({
        ajax: "../data1.txt",
        deferRender: true,
        scrollY: 200,
        scrollCollapse: true,
        scroller: true
    });
    $('#state-scroller').DataTable({
        ajax: "../data2.txt",
        deferRender: true,
        scrollY: 200,
        scrollCollapse: true,
        scroller: true,
        stateSave: true
    });
    $('#api-scroller').DataTable({
        ajax: "../data3.txt",
        deferRender: true,
        scrollY: 200,
        scrollCollapse: true,
        scroller: true,
        initComplete: function() {
            this.api().row(1000).scrollTo();
        }
    });
});
