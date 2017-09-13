<script type="text/javascript">
var jQ8 = jQuery.noConflict();
jQ8(document).ready(function() {
    jQ8('#activeprayertable').DataTable({
//			"processing": true,
//			"serverSide": true,
        "ajax": "ofc_getactiveprayer.php",
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
                        "responsive": true,
			"columnDefs": [ 
			{
            "targets": -2,
            "data": null,
            "defaultContent": "<button class='my_popup_open button_flat_green_small'>Details</button>"
			},
			{
        		className: "indexcol",
        		"targets": [ 0 ] 
        	},
			{
           		className: "prayer_update",
                        "responsivePriority": [ 3 ],
           		"targets": [ 1 ] 
           	},
			{
        		className: "prayer_who",
                        "responsivePriority": [ 2 ],
        		"targets": [ 2 ] 
        	},
			{
        		className: "type",
        		"targets": [ 3 ] 
        	},
			{
        		className: "prayer_answer",
        		"targets": [ 4 ] 
        	},
			{
        		className: "prayer_title",
                        "responsivePriority": [ 1 ],
        		"targets": [ 5 ] 
        	},
			{
        		className: "detailscolumn",
                        "responsivePriority": [ 1 ],
        		"targets": [ 6 ] 
        	},
			{
        		className: "full_text", "visible": false,
        		"targets": [ 7 ] 
        	}
        ]

    });
});
</script>

