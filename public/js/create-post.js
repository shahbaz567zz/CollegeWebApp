//alert('world');
$(document).ready(function(){
    $('#tabResBtn').click(function(){
        console.log('responsive btn clicked');
        rawTable = tinymce.activeEditor.selection.getContent();
        console.log(rawTable);
        // var txtAreaData = $('#postTextArea').text();
        $('#resTableDiv').html(rawTable);
        var tableData = $('#resTableDiv table').wrap('<table>');
        $('#resTableDiv').html(tableData); 
        $('#resTableDiv table').removeAttr('style').removeAttr('border');
        $('#resTableDiv table').addClass('table table-bordered table-hover table-striped');
        tableData = $('#resTableDiv table').wrap('<div>').parent().parent().html();
        $('#resTableDiv').html(tableData); 
        //$('#resTableDiv table tr:first').wrap('<head>');
        $('#resTableDiv table thead tr').children().contents().unwrap().wrap('<th>');
        $('#resTableDiv table tbody tr').children().contents().unwrap().wrap('<td>');
        $('#resTableDiv div').addClass('table-responsive');
        
        tinymce.activeEditor.selection.setContent($('#resTableDiv').html());
        
        console.log($('#resTableDiv').html());
        
    });
});