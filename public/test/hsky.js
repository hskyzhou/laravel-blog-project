(function(angualr){
	var hsky = angular.module('hsky', ['sticky']);

	hsky.controller('MainContainer', ['$scope', function($scope){
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
				imgs:"http://newhskyblog.me:8080/test/1.jpg",
				alt:'aa',
				title:'So, I’ve cooked this pizza this morning',
				date:'6 Sep, 2015',
				content:"Don’t go to bed, with no price on your head. No, no, don’t do it. Fon’t do the crime, if… "
			},
			{
				href:'',
				imgs:"http://newhskyblog.me:8080/test/1.jpg",
				alt:'aa',
				title:'My First Day For My New Job',
				date:'6 Sep, 2015',
				content:"What you are about to see is real; the litigants on the screen are not actors. They are genuine citizens…"
			}
		];

	}]);
})(window.angular);