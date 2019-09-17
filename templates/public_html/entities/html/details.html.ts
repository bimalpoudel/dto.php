<div class="w3-container w3-teal entity-action">
	<h2><a class="disabled" href="#"><i class="fas fa-book-open"></i> Details</a> | <a class="enabled" href="#" ui-sref="#__CLASS_NAME__.List({})"><i class="fas fa-list"></i> List</a></h2>
</div>

<div class="details">
	#__DETAILS_FIELDS__
	
	<div>
		<!-- Flag -->
		<span class="w3-btn w3-purple" ng-click="#__CLASS_NAME__.Flag(#__CLASS_NAME__.record)">
			<i class="fa fa-flag" aria-hidden="true"></i>
			Flag
		</span>

		<!-- Edit -->
		<a class="w3-btn w3-purple" href="#" ui-sref="#__CLASS_NAME__.Edit({'#__PRIMARY_KEY__': #__CLASS_NAME__.record.#__PRIMARY_KEY__})">
			<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
			Edit
		</a>

		<!-- Delete -->
		<a class="w3-btn w3-red" href="#" ng-click="#__CLASS_NAME__.Delete(#__CLASS_NAME__.record)">
			<i class="fa fa-trash-o" aria-hidden="true"></i>
			Delete
		</a>
	</div>
</div>

<div ui-view=""></div>
