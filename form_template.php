<?php $title = "Create Survey" ?>
<div id="createNew" class="container ">

	<form action="newSurvey" method="post">
		<textarea id="title" name="title" rows="1" class="expand col-10" placeholder="Survey Title" required></textarea>
		<textarea name="description" rows="1" class="expand col-10" placeholder="Description of Survey" required></textarea>
		<div class="date-picker">
			<h4>Duration</h4>
			<div class="d-flex form-inliner">
				<input class="col-4" type="text" class="" name="startDate" placeholder="start date" onfocus="(this.type='date')" onblur="(this.type='text')" required>
				<h4>to</h4>
				<input class="col-4" type="text" class="" name="endDate" placeholder="end date" onfocus="(this.type='date')" onblur="(this.type='text')" required>
			</div>
		</div>
		<div>
			<h4>Questions</h4>
			<ul id="createNewQuestionList">
				<li class="row questiongroup">
					<h5>1</h5>
					<textarea name="question[]" rows="1" class="expand col-8" placeholder="Question" required></textarea>
					<button type="button" class="mdr-btn mdr-red" id="deleteField">DELETE</button>
				</li>
			</ul>
			<button type="button" class="mdr-btn mdr-blue" id="addNewField">ADD</button>
			<button type="submit" name"submit" class="mdr-btn mdr-green" id="addNewField">SAVE</button>

		</div>
	</form>
</div>

<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<!-- <script src="js/jquery-3.2.1.min.js"></script> -->

<script type="text/javascript" src="js/jquery.textarea-expander.js"></script>
<script>
	var i = 2;
	$('#deleteField').live('click', function () {
		if (i > 2) {
			$('.row').remove();

			i--;
			console.log(i);
		};

		var h5 = document.querySelectorAll("#createNewQuestionList h5");
		// $(".head h3").html("your new header");
		for (var k = 0; k < h5.length; ++k) {
			h5[k].innerText = k + 1;
		}

		// var list = document.querySelectorAll("#createNewQuestionList textarea");
		// for (var k = 0; k < list.length; ++k) {
		// 	var newName = "question"+(k + 1);
		// 	list[k].setAttribute('name', newName);

		// }
	});


	var $ = function (selector) {
		return document.querySelector(selector);
	}

	// $('#deleteField').onclick = function () {
	// 	var li = this.parentElement;
	// 	li.remove();

	// };

	$('#addNewField').onclick = function () {
		console.log(i);
		var html = document.createElement('li');
		html.setAttribute("class", "row questiongroup");
		html.innerHTML = '<h5>' + i + '</h5><textarea name="question[]' +
			'" rows="1" class="expand col-8" placeholder="Question "' +
			' style="height: 34px; overflow: hidden; padding-top: 0px; padding-bottom: 0px;" required></textarea>';
		html.innerHTML += ' <button type="button" class="mdr-btn mdr-red" id="deleteField">DELETE</button>';
		// Append it and attach the event (via onclick)
		$('#createNewQuestionList').appendChild(html);
		// li.onclick = dynamicEvent;
		i++;
	};
</script>
</body>

</html>