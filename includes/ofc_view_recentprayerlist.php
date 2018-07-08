<script type="text/javascript">
var jQ8 = jQuery.noConflict();
jQ8(document).ready(function() {
    jQ8('#recentprayertable').DataTable({
//			"processing": true,
//			"serverSide": true,
        "ajax": "ofc_getrecentprayer.php",
//			"bJQueryUI": true,
//			"sScrollY": "600px",
//			"bPaginate": true,
//			"aaSorting": [[ 1, "asc" ]],
//			"ordering": true,
			"order": [[ 3, 'desc' ]],
//			"iDisplayLength": 100,
//			"bLengthChange": false,
//			"bFilter": true,
//			"bSort": true,
//			"bInfo": false,
			"bAutoWidth": true,
//			"sWrapper": "25px",
//			"orderClasses": false,
                        "responsive": true,
			"columnDefs": [
			{
                        className: "prayerupdate",
                        responsivePriority: "3",
                        "targets": [ 0 ] 
                        },
			{
        		className: "fullname", 
                        responsivePriority: "2",
                        "visible": false,
        		"targets": [ 1 ] 
                        },
			{
        		className: "glance", 
                        responsivePriority: "1",
        		"targets": [ 2 ] 
                        },
                        {
                        className: "prayerid", 
                        "visible": false,
                        "targets": [ 3 ] 
                        },
                        {
                        className: "prayer_text", 
                        "visible": false,
                        "targets": [ 4 ] 
                        }

                    ]

    });
});
</script>

