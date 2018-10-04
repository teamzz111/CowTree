// Dashboard 1 Morris-chart
$( function () {
	"use strict";


	// Extra chart
	Morris.Area( {
		element: 'extra-area-chart',
		data: [ {
				period: '2001',
				macho: 0,
				hembra: 12
        }, {
				period: '2002',
				macho: 10,
				hembra: 60,

        }, {
				period: '2003',
				macho: 120,
				hembra: 10,
        }, {
				period: '2004',
				macho: 0,
				hembra: 0
        }, {
				period: '2005',
				macho: 0,
				hembra: 0
        }, {
				period: '2006',
				macho: 160,
				hembra: 75,
        }, {
				period: '2007',
				macho: 10,
				hembra: 120,
        }


        ],
		lineColors: [ '#26DAD2', '#fc6180', '#62d1f3', '#ffb64d', '#4680ff' ],
		xkey: 'period',
		ykeys: [ 'macho', 'hembra'],
		labels: [ 'Machos', 'Hembras'],
		pointSize: 0,
		lineWidth: 0,
		resize: true,
		fillOpacity: 0.8,
		behaveLikeLine: true,
		gridLineColor: '#e0e0e0',
		hideHover: 'auto'

	} );



} );
