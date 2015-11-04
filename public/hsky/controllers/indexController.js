var hsky = angular.module('hsky', ['sticky', 'duScroll', 'angular-momentum-scroll', 'sticky']);

hsky.controller('MainController', ['$scope', '$document', function($scope, $document){
	/*sticky*/
	$scope.disableSticking = false;

	$scope.start_search = function(){
		$scope.bodyclass="searchmode";
		$scope.searchclass = "showsearch";
	}

	$scope.close_search = function(){
		$scope.bodyclass = "";
		$scope.searchclass = "closesearch";
	};

	$scope.results = [
		{
			href:'',
			imgs:"http://newhskyblog.me:8080/hsky/1.jpg",
			alt:'aa',
			title:'So, I’ve cooked this pizza this morning',
			date:'6 Sep, 2015',
			content:"Don’t go to bed, with no price on your head. No, no, don’t do it. Fon’t do the crime, if… "
		},
		{
			href:'',
			imgs:"http://newhskyblog.me:8080/hsky/1.jpg",
			alt:'aa',
			title:'My First Day For My New Job',
			date:'6 Sep, 2015',
			content:"What you are about to see is real; the litigants on the screen are not actors. They are genuine citizens…"
		}
	];

	$scope.currX = 0;
	$scope.currY = 0;

	$scope.scroll_end = function(x, y){
		$document.scrollTo(0, y);
	}

	$scope.scroll_start = function(){
	}
}]);

hsky.controller('ScrollController', ['$scope', '$document', function($scope, $document){
	$scope.back_to_top = function(){
		$document.scrollTopAnimated(0, 1000);
	};
}]);