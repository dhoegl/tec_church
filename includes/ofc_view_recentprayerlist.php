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
			"order": [[ 0, 'desc' ]],
//			"iDisplayLength": 100,
//			"bLengthChange": false,
//			"bFilter": true,
//			"bSort": true,
//			"bInfo": false,
//			"bAutoWidth": true,
//			"sWrapper": "25px",
//			"orderClasses": false,
			"columnDefs": [
			{
//                        className: "prayer_update",
                        className: "prayerupdate",
                        "targets": [ 0 ] 
                        },
			{
//        		className: "prayer_who",
        		className: "fullname",
        		"targets": [ 2 ] 
                        },
			{
//        		className: "prayer_title",
        		className: "glance",
        		"targets": [ 3 ] 
                        }
                    ]

    });
});
</script>

