//$('#table_list_subject').dataTable( {
//		"aaSorting": [[ 2, "asc" ]],
//		"oLanguage": {
//			"sProcessing":   "กำลังดำเนินการ...",
//			"sLengthMenu":   "แสดง_MENU_ แถว",
//			"sZeroRecords":  "ไม่พบข้อมูล",
//			"sInfo":         "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
//			"sInfoEmpty":    "แสดง 0 ถึง 0 จาก 0 รายการ",
//			"sInfoFiltered": "",
//			"sInfoPostFix":  "",
//			"sSearch":       "ค้นหา:",
//			"sUrl":          "",
//			"oPaginate": {
//				"sFirst":    "เิริ่มต้น",
//				"sPrevious": "ก่อนหน้า",
//				"sNext":     "ถัดไป",
//				"sLast":     "สุดท้าย"
//			}
//		},
//		"bScrollCollapse": true,
//		"sScrollY": "310px",
//		"bPaginate": false,
//		"aoColumns": [
//			{ "bSearchable": false },
//			{ "sType": "date-eu", "bSearchable": false },
//			null,
//			{ "sType": "num-html", "bSearchable": false }
//		]
//	} );

	jQuery.extend( jQuery.fn.dataTableExt.oSort, {
		"date-eu-pre": function ( date ) {
			var date = date.replace(" ", "");

			if (date.indexOf('.') > 0) {
				/*date a, format dd.mn.(yyyy) ; (year is optional)*/
				var eu_date = date.split('.');
			} else {
				/*date a, format dd/mn/(yyyy) ; (year is optional)*/
				var eu_date = date.split('/');
			}

			/*year (optional)*/
			if (eu_date[2]) {
				var year = eu_date[2];
			} else {
				var year = 0;
			}

			/*month*/
			var month = eu_date[1];
			if (month.length == 1) {
				month = 0+month;
			}

			/*day*/
			var day = eu_date[0];
			if (day.length == 1) {
				day = 0+day;
			}

			return (year + month + day) * 1;
		},

		"date-eu-asc": function ( a, b ) {
			return ((a < b) ? -1 : ((a > b) ? 1 : 0));
		},

		"date-eu-desc": function ( a, b ) {
			return ((a < b) ? 1 : ((a > b) ? -1 : 0));
		}
	} );

	jQuery.extend( jQuery.fn.dataTableExt.oSort, {
		"num-html-pre": function ( a ) {
			var x = a.replace( /<.*?>/g, "" );
			return parseFloat( x );
		},

		"num-html-asc": function ( a, b ) {
			return ((a < b) ? -1 : ((a > b) ? 1 : 0));
		},

		"num-html-desc": function ( a, b ) {
			return ((a < b) ? 1 : ((a > b) ? -1 : 0));
		}
	}
);

//$('#table_list_name').dataTable( {
//		"aaSorting": [[ 3, "asc" ]],
//		"oLanguage": {
//			"sProcessing":   "กำลังดำเนินการ...",
//			"sLengthMenu":   "แสดง_MENU_ แถว",
//			"sZeroRecords":  "ไม่พบข้อมูล",
//			"sInfo":         "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
//			"sInfoEmpty":    "แสดง 0 ถึง 0 จาก 0 รายการ",
//			"sInfoFiltered": "",
//			"sInfoPostFix":  "",
//			"sSearch":       "ค้นหา:",
//			"sUrl":          "",
//			"oPaginate": {
//				"sFirst":    "เิริ่มต้น",
//				"sPrevious": "ก่อนหน้า",
//				"sNext":     "ถัดไป",
//				"sLast":     "สุดท้าย"
//			}
//		},
//		"bScrollCollapse": true,
//		"sScrollY": "310px",
//		"bPaginate": false
//	});

reloadDataTable();

function reloadDataTable() {
    $('#table_list_subject').dataTable( {
		"aaSorting": [[ 2, "asc" ]],
		"oLanguage": {
			"sProcessing":   "กำลังดำเนินการ...",
			"sLengthMenu":   "แสดง_MENU_ แถว",
			"sZeroRecords":  "ไม่พบข้อมูล",
			"sInfo":         "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
			"sInfoEmpty":    "แสดง 0 ถึง 0 จาก 0 รายการ",
			"sInfoFiltered": "",
			"sInfoPostFix":  "",
			"sSearch":       "ค้นหา:",
			"sUrl":          "",
			"oPaginate": {
				"sFirst":    "เิริ่มต้น",
				"sPrevious": "ก่อนหน้า",
				"sNext":     "ถัดไป",
				"sLast":     "สุดท้าย"
			}
		},
		"bScrollCollapse": true,
		"sScrollY": "310px",
		"bPaginate": false,
		"aoColumns": [
			{ "bSearchable": false },
			{ "sType": "date-eu", "bSearchable": false },
			null,
			{ "sType": "num-html", "bSearchable": false }
		]
	} );

        $('#table_list_name').dataTable( {
		"aaSorting": [[ 3, "asc" ]],
		"oLanguage": {
			"sProcessing":   "กำลังดำเนินการ...",
			"sLengthMenu":   "แสดง_MENU_ แถว",
			"sZeroRecords":  "ไม่พบข้อมูล",
			"sInfo":         "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
			"sInfoEmpty":    "แสดง 0 ถึง 0 จาก 0 รายการ",
			"sInfoFiltered": "",
			"sInfoPostFix":  "",
			"sSearch":       "ค้นหา:",
			"sUrl":          "",
			"oPaginate": {
				"sFirst":    "เิริ่มต้น",
				"sPrevious": "ก่อนหน้า",
				"sNext":     "ถัดไป",
				"sLast":     "สุดท้าย"
			}
		},
		"bScrollCollapse": true,
		"sScrollY": "310px",
		"bPaginate": false
	});
}