<script type="text/javascript">
var jQ8 = jQuery.noConflict();
jQ8(document).ready(function() {
    jQ8('#unapprovedprayertable').DataTable({
//			"processing": true,
//			"serverSide": true,
        "ajax": "ofc_getunapprovedprayer.php",
//			"bJQueryUI": true,
//			"sScrollY": "300px",
//			"bPaginate": true,
//			"aaSorting": [[ 1, "asc" ]],
//			"ordering": true,
			"order": [[ 0, 'desc' ]],
//			"scrollY":        "200px",
//			"scrollCollapse": true,
//			"paging":         false,
//			"iDisplayLength": 100,
//       "bLengthChange": false,
//			"bFilter": true,
//			"bSort": true,
//			"bInfo": false,
//			"bAutoWidth": true,
//			"sWrapper": "25px",
//			"orderClasses": false,
            "responsive": true,
         "columnDefs": [ 
			{
            "targets": -4,
            "data": null,
            "responsivePriority": [ 2 ],
            "defaultContent": "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#ModalPrayerInfo'>View</button>"
			},
			{
            "targets": -3,
            "data": null,
            "responsivePriority": [ 2 ],
            "defaultContent": "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#ModalPrayerApprove'>Approve</button>"
			},
			{
            "targets": -2,
            "data": null,
            "responsivePriority": [ 2 ],
            "defaultContent": "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#ModalPrayerReject'>Reject</button>"
			},
			{
        		className: "indexcol",
        		"targets": [ 0 ] 
        	},
			{
       		className: "prayer_update",
       		"targets": [ 1 ] 
       	},
			{
        		className: "prayer_type",
        		"targets": [ 2 ] 
        	},
			{
        		className: "prayer_who",
        		"targets": [ 3 ] 
        	},
			{
        		className: "prayer_title",
                "responsivePriority": [ 2 ],
        		"targets": [ 4 ] 
        	},
			{
        		className: "prayer_view",
        		"targets": [ 5 ] 
        	},
			{
        		className: "prayer_approve",
        		"targets": [ 6 ] 
        	},
			{
       		className: "prayer_reject",
       		"targets": [ 7 ] 
       	},
			{
        		className: "full_text", "visible": false,
        		"targets": [ 8 ] 
        	}
        ]

    });
    console.log("Made it to View_UnapprovedPrayerlist");
});
</script>

